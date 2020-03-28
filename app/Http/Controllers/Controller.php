<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Reply;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //TODO probably not everything is needed, but let's keep it for now
    /**
     * @param $response
     * @return JsonResponse
     */
    public function handleApiJsonResponse($response, $code = null) : JsonResponse {
        //return $this->handleJsonResponse(ApiReply::done($response, $code));
    }

    /**
     * @param $response
     * @param $message | null
     * @return JsonResponse
     * This is the one we will probably be using
     */
    public function handleAjaxJsonResponse($response, $message = null) : JsonResponse {
        return $this->handleJsonResponse(Reply::done($response, $message));
    }


    /**
     * @param $response
     * @return JsonResponse
     */
    public function handleJsonResponse($response) : JsonResponse {
        return response()->json($response->data, $response->code, $response->headers, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * @param $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
     */
    public function handleRedirectOrProxyResponse($response) {
        if($response->code === Response::HTTP_MOVED_PERMANENTLY || $response->code === Response::HTTP_FOUND) {
            return redirect($response->data['route'] ?? abort(Response::HTTP_BAD_REQUEST));
        }

        return response($response->data["message"], Response::HTTP_OK, $response->data["headers"]);
    }

    /**
     * @param $response
     * Useful if you need to redirect the user to another page and growl a message
     */
    public function handleFlashResponse($response) {
        if(!$response->code){
            $response->code = Response::HTTP_OK;
        }
        $flashArray = [
            'message' => $response->data['message'] ?? null,
            'level' => $response->code === Response::HTTP_OK ? 'success' : 'danger',
            'data' => $response->data,
            'duration' => 5000
        ];
        session()->flash("flash_message", $flashArray);
    }

    /**
     * Use when the request is successful
     *
     * @param array|\stdClass|string|null $data
     * @param string|null $message
     * @param int $code
     * @return JsonResponse
     */
    public function jsonSuccess($data = null, $message = null, $code = 200)
    {
        $responseData = [
            "status" => "success",
            "message" => $message,
            "data" => $data
        ];

        return response()->json($responseData, $code, [], JSON_PRETTY_PRINT);
    }

    /**
     * Use when the request is rejected due to invalid data or call conditions
     *
     * @param string $message
     * @param int $code
     * @param array|\stdClass|string|null $data
     * @return JsonResponse
     */
    public function jsonFail($message, $code = 400, $data = null)
    {
        $responseData = [
            "status" => "fail",
            "message" => $message,
            "data" => $data
        ];

        return response()->json($responseData, $code, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param Validator $validator
     * @return JsonResponse
     */
    public function jsonValidationFail(Validator $validator)
    {
        return $this->jsonFail($validator->errors()->first(), 422);
    }

    /**
     * @param $flashResponse
     * @return bool|JsonResponse
     * Usage: Use this if you need you return flash error responses but you return a view in the controller.
     */
    public function hasResponseError($flashResponse)
    {
        if(is_array($flashResponse) && isset($flashResponse["level"]) && $flashResponse["level"] != "success")
        {
            return true;
        }

        if($flashResponse instanceof ReplyService && $flashResponse->code !== Response::HTTP_OK) {
            return true;
        }

        return false;
    }
}
