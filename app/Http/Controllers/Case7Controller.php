<?php

namespace App\Http\Controllers;

class Case7Controller extends Controller{
    public function getDataFilter(){
        $file_path = realpath(__DIR__ . '/data.json');
        $json = json_decode(file_get_contents($file_path), true);
        $data=[];
        if(isset($json['data']['response']['billdetails'])){
            $dataFilter = $json['data']['response']['billdetails'];
            $key = 0;
            foreach ($dataFilter as $value) {
                $newStr = preg_replace('~[\\\\/DENOM : <>|]~', ' ', $value['body'][0]);
                if($newStr >= 100000){
                    array_push($data, intval(str_replace(' ','', $newStr)));
                }
            }
        }
        dd($data);
    }
}
