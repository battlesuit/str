<?php
namespace str {
  function pascalize($str) {
    return Object::new_one($str)->pascalize()->read();
  }
  
  function camelize($str) {
    return Object::new_one($str)->camelize()->read();
  }
  
  function humanize($str) {
    return Object::new_one($str)->humanize()->read();
  }
  
  function lowerscore($str) {
    return Object::new_one($str)->lowerscore()->read();
  }
  
  function unqualify($str) {
    return Object::new_one($str)->unqualify()->read();
  }
}
?>