<?php
    namespace Utils;


    
    class JsonUtils{
        public static function saveData($data, $filename){
            file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        }
        public static function loadData($filename){
            return json_decode(file_get_contents($filename), true);
        }
    }


?>