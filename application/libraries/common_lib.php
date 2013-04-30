<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Common_lib{
    
    /*for url decoder*/
    public function urldecode_to_array ($url) {
      $ret_ar = array();
      
      if (($pos = strpos($url, '?')) !== false)         // parse only what is after the ?
        $url = substr($url, $pos + 1);
      if (substr($url, 0, 1) == '&')                    // if leading with an amp, skip it
        $url = substr($url, 1);

      $elems_ar = explode('&', $url);                   // get all variables
      for ($i = 0; $i < count($elems_ar); $i++) {
        list($key, $val) = explode('=', $elems_ar[$i]); // split variable name from value
        $ret_ar[urldecode($key)] = urldecode($val);     // store to indexed array
      }

      return $ret_ar;
    }
    
    
    




}