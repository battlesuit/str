<?php
/**
 * Helper functions for quick-access string object methods
 *
 * Example:
 *  echo str\pascalize('hello world'); # displays "HelloWorld"
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage str
 */
namespace str {
  
  /**
   * Uses Object::pascalize() instance method
   *
   * @param string $str
   * @return string
   */
  function pascalize($str) {
    return Object::create($str)->pascalize()->read();
  }
  
  /**
   * Uses Object::camelize() instance method
   *
   * @param string $str
   * @return string
   */  
  function camelize($str) {
    return Object::create($str)->camelize()->read();
  }
  
  /**
   * Uses Object::humanize() instance method
   *
   * @param string $str
   * @return string
   */    
  function humanize($str) {
    return Object::create($str)->humanize()->read();
  }
  
  /**
   * Uses Object::lowerscore() instance method
   *
   * @param string $str
   * @return string
   */    
  function lowerscore($str) {
    return Object::create($str)->lowerscore()->read();
  }
  
  /**
   * Uses Object::unqualify() instance method
   *
   * @param string $str
   * @return string
   */    
  function unqualify($str) {
    return Object::create($str)->unqualify()->read();
  }
}
?>