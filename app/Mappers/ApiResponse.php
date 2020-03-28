<?php
namespace App\Mappers;

/**
 * Class ApiResponse
 * @package App\Mappers
 */
class ApiResponse {
    /**
     * @var mixed
     */
    public $data = null;
    /**
     * @var integer
     */
    public $code = null;
    /**
     * @var array
     */
    public $headers = null;

    /**
     * ApiResponse constructor.
     * @param mixed $data
     * @param integer $code
     * @param array $headers
     */
    public function __construct($data, int $code, array $headers) {
        $this->data = $data;
        $this->code = $code;
        $this->headers = $headers;
    }
}
