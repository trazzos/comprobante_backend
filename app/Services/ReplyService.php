<?php
namespace App\Services;

use App\Mappers\ApiResponse;
use Illuminate\Http\Response;

/**
 * Class ReplyService
 * @package App\Services
 */
class ReplyService {
    /**
     * @var
     */
    public $code;
    /**
     * @var
     */
    public $data;
    /**
     * @var
     */
    public $headers = [];

    /**
     * @param array $data
     * @param null $message
     * @param boolean $flash
     * @return ReplyService
     */

    /**
     * @param mixed $data
     * @param string $message
     * @param integer $code
     * @return ApiResponse
     */
    public function done($data = null, string $message = null, int $code = null) : ApiResponse {
        $responseData = null;

        if(isset($data)) {
            $responseData['payload'] = $data;
        }

        if(isset($message)) {
            $responseData['message'] = $message;
        }

        return new ApiResponse($responseData, $code ?? Response::HTTP_OK, []);
    }

    /**
     * @param null $message
     * @param array $data
     * @param boolean $flash
     * @return ReplyService
     */
    public function fail($message = null, array $data = null, $flash = false) {
        if(!$this->code){
            $this->code = Response::HTTP_BAD_REQUEST;
        }

        $this->buildData($data, $message);

        if($flash) {
            $this->flash($this->data, $message);
        }

        return $this;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers){
        $this->headers = $headers;
    }

    /**
     * @param $code
     */
    public function setCode($code){
        $this->code = $code;
    }

    protected function buildData($data, $message) {
        $this->data = $data ?? [];
        $this->data = array_merge($this->data, ['message' => $message, 'code' => $this->code]);
    }

    /**
     * @param array $data
     * @param null $message
     */
    private function flash(array $data = null, $message = null) {
        $flashArray = [
            'message' => $message,
            'level' => $this->code === Response::HTTP_OK ? 'success' : 'danger',
            'data' => $data,
            'duration' => 5000
        ];
        session()->flash("flash_message", $flashArray);
    }
}
