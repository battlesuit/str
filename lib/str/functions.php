<?php
namespace str {
  function pascalize($str) {
    return Object::create($str)->pascalize()->read();
  }
  
  function camelize($str) {
    return Object::create($str)->camelize()->read();
  }
  
  function humanize($str) {
    return Object::create($str)->humanize()->read();
  }
  
  function lowerscore($str) {
    return Object::create($str)->lowerscore()->read();
  }
  
  function unqualify($str) {
    return Object::create($str)->unqualify()->read();
  }
}
?>