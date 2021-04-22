<?php


namespace App\Traits;


trait responsTrait{


    public function returnSuccessMsg( $smg = "", $errorNumber = '1'){

        return response( [
            'errorNumber' => $errorNumber,
            'smg' => $smg,
        ],200);

    }

    public function returnData($msg = "", $key, $value){

        return response([
            'errorNumber' => '0',
            'msg' => $msg,
            $key => $value,
        ],200);

    }

    public function returnError( $errorNumber, $msg){

        return response([

            'errorNumber' => $errorNumber,
            'msg' => $msg,

        ],404);

    }



}
