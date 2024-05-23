<?php


use Illuminate\Support\Facades\Config;
use Jenssegers\Date\Date;

if (!function_exists('dateFormat')) {
    function dateFormat($date): string
    {
        Date::setLocale('ar');

        return !is_numeric($date)
            ? Jenssegers\Date\Date::parse($date)->format('l j F Y ')
            : '---';
    }
}




if(!function_exists('create_slug'))
{
    function create_slug($slug,$time = null){
        // Remove spaces from the beginning and from the end of the string
       $string = trim($slug);
       // Lower case everything
       // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: https://www.php.net/manual/en/function.mb-strtolower.php
       $string = mb_strtolower($string, "UTF-8");;

       // Make alphanumeric (removes all other characters)
       // this makes the string safe especially when used as a part of a URL
       // this keeps latin characters and arabic charactrs as well
       $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

       // Remove multiple dashes or whitespaces
       $string = preg_replace("/[\s-]+/", " ", $string);

       // Convert whitespaces and underscore to the given separator
       $string = preg_replace("/[\s_]/", '-', $string);
       return $string.'-'.time();
    }
}



if (!function_exists('dateFormat')) {
    function dateFormat($date): string
    {
        return !is_numeric($date)
            ? Jenssegers\Date\Date::parse($date)->format('j F Y')
            : '---';
    }
}


if(!function_exists('get_default_lang'))
{
	function get_default_lang(){
		return   Config::get('app.locale');
	}

}
if (!function_exists('lang')) {
	function lang() {
		 return  session('lang')?:app()->getLocale();
	}
}

if (!function_exists('direction')) {
	function direction() {
		if (session()->has('lang')) {
			if (session('lang') == 'ar') {
				return 'rtl';
			} else {
				return 'ltr';
			}
		} else {
			return 'ltr';
		}
	}
}


if (!function_exists('imageCache')) {
	function imageCache($path, $template = 'thumbnail')
    {
        return url('/images/cache/' . $template . '/' . $path);
	}
}
if (!function_exists('uploadOne')) {

  function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
