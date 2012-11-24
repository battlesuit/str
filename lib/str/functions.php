<?php
namespace str {
  function pascalize($str) {
    $str = new Base($str);
    return $str->pascalize()->read();
  }
  
  function camelize($str) {
    $str = new Base($str);
    return $str->camelize()->read();
  }
  
  function humanize($str) {
    $str = new Base($str);
    return $str->humanize()->read();
  }
  
  function lowerscore($str) {
    $str = new Base($str);
    return $str->lowerscore()->read();
  }
  
  function unqualify($str) {
    $str = new Base($str);
    return $str->unqualify()->read();
  }
}
?>