<?php

/**
 *  store|change|remove  image trait
 */
trait ImageTrait
{
    protected function save($img, $old = null, $path = '')
    {
        $ext = $img->getClientOriginalExtension();
        $fileName = time() . '_' . $img->getClientOriginalName();
        $img->move(public_path($path), $fileName);
        if ($old != null && File::exists(public_path($old))) {
            File::delete(public_path($old));
        }
        return $fileName;
    }

}
