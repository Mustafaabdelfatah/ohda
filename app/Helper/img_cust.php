<?php
namespace App\Helper;

use File;

class Img_cust
{
    public static function save($img, $old = null, $path = '')
    {
        $ext = $img->getClientOriginalExtension();
        $fileName = $path . '/' . rand(111111, 999999) . '_' . $img->getClientOriginalName();
        $img->move(public_path($path), $fileName);
        if ($old != null && File::exists(public_path($old))) {
            File::delete(public_path($old));
        }
        return $fileName;
    }
}