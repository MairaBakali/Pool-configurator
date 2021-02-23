<?php

namespace App\Helpers;

class HelperFunctions
{
    public static function createResponse($data, $success = true,$message = "No record found!")
    {
        $response = [];
        if (count($data) > 0) {
            $response['success'] = $success;
            $response['data'] = $data;
            $response['message'] = "";
        } else {
            $response['success'] = false;
            $response['data'] = [];
            $response['message'] = $message;
        }
        return $response;
    }
}
