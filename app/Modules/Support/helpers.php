<?php

if (! function_exists('is_rtl')) {
    /**
     * The Current dir
     *
     * @param string $locale
     */
    function is_rtl()
    {
        return LaravelLocalization::getCurrentLocaleDirection();
    }
}

if (! function_exists('check_dir')) {
    /**
     * The Check dir by lang
     *
     * @param string $locale
     */
    function check_dir($lang)
    {
      switch ($lang) {
          case 'ar':
          return 'rtl';
          default:
          return 'ltr';
      }
    }
}


if (! function_exists('locale')) {
    /**
     * The Current locale
     *
     * @param string $locale
     */
    function locale()
    {
        return app()->getLocale();
    }
}

function path_without_domain($path)
{
    $url = $path;
    $parts = explode("/",$url);
    array_shift($parts);
    array_shift($parts);
    array_shift($parts);
    $newurl = implode("/",$parts);

    return $newurl;
}

if (! function_exists('int_to_array')) {
    /**
     * convert a comma separated string of numbers to an array
     *
     * @param string $integers
     */
    function int_to_array($integers)
    {
        return array_map("intval", explode(",", $integers));
    }
}

if (! function_exists('get_path')) {
    /**
     * @param $path
     * @return mixed
     */
    function get_path($path)
    {
        return parse_url($path, PHP_URL_PATH);
    }
}

if (! function_exists('slugfy')) {
    /**
     * The Current dir
     *
     * @param string $locale
     */
     function slugfy($string, $separator = '-')
     {
         $url = trim($string);
         $url = strtolower($url);
         $url = preg_replace('|[^a-z-A-Z\p{Arabic}0-9 _]|iu', '', $url);
         $url = preg_replace('/\s+/', ' ', $url);
         $url = str_replace(' ', $separator, $url);

         return $url;
     }
}

if (!function_exists('array_not_empty')) {

    function array_not_empty($arr){
      if(is_array($arr)){
          foreach ($arr as $key => $value) {
              if(!empty($value) || $value != NULL || $value != ""){
                  return true;
              }
          }
          return false;
      }
    }
}
