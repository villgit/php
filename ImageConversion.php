<?php
/**
 * Created by PhpStorm.
 * User: vill.labrador
 * Date: 30/10/2018
 * Time: 11:09 AM
 */

class ImageConversion {

    public function hexToString($hex){
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2){
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }

    public function hexToImage($hex_raw){
        $hex = preg_replace('/0x/', '', $hex_raw);

        $data=$this->hexToString($hex);
        $base64=base64_encode($data);

        $f = finfo_open();
        $mime_type = finfo_buffer($f, base64_decode($base64), FILEINFO_MIME_TYPE);

        return '<img src="data:'.$mime_type.';base64,'.$base64.'" width="100" height="100"/>';
    }

    public function base64ToHex($base64String){
        $hexdata = bin2hex($base64String);
        return $this->hexToImage($hexdata);
    }

    public function imageToBase64(){
        $file = 'sample.png';
        $type = pathinfo($file, PATHINFO_EXTENSION);
        $data = file_get_contents($file);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    }

}