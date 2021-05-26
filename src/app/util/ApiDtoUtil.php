<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 24/05/2021 - 06:22
 */

namespace app\util;


use app\model\ApiDto;

class ApiDtoUtil{

    public function convertToArray(ApiDto $result): array {
        return $apiDto = [
            'code' => $result->getCode(),
            'message' => $result->getMessage(),
            'details' => $result->getDetails(),
            'protocol' => $result->getProtocol(),
            'timestamp' => $result->getTimestamp()
        ];
    }

}
