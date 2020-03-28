<?php

namespace Modules\Setting\Services;
use Config;
/**
 * Class CatalogueGetService
 * @package Modules\Setting\Services
 */
class CatalogueGetService {

    /**
     * @param array $data
     * @return array|null
     */
    public function list(array $data) : ?array {
        $catalogue = [];
        foreach ($data['filters'] as $var){
            $catalogue[$var] = Config::get("catalogue.$var");
        }
        return $catalogue;
    }
}
