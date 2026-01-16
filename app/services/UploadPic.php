<?php

namespace services;
class UploadPic
{

    public static function validate($image)
    {
        if (!isset($image) || $image["error"] != 0) {
            return false;
        }
        return true;
    }



    public static function uploadPicture($image)
    {
        if (self::validate($image)){

            $src = $image["tmp_name"]; //actual temp path
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $extension;
            $newSrc = __DIR__ . "/../uploads/" . $newFileName;
            if (!is_dir(APPROOT."/uploads")) {
                throw new \Exception("uploads folder missing: " . (__DIR__ . "/../uploads"));
            }
            if (!is_writable(APPROOT."/uploads")) {
                throw new \Exception("uploads folder NOT writable: " . (APPROOT."/uploads"));
            }
            if (!is_uploaded_file($src)) {
                throw new \Exception("temp file is not an uploaded file: " . $src);
            }

            if (!move_uploaded_file($src, $newSrc)) {
                throw new \Exception("move image error");
            }
            return $newFileName;
        }

    }
}
