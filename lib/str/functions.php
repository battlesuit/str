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
   * Returns the object methods instance
   *
   * @return ObjectMethods
   */
  function object_methods() {
    return Object::instance_methods();
  }
  
  /**
   * Uses Object::pascalize() instance method
   *
   * @param string $str
   * @return string
   */
  function pascalize($str) {
    return object_methods()->pascalize($str);
  }
  
  /**
   * Uses Object::camelize() instance method
   *
   * @param string $str
   * @return string
   */  
  function camelize($str) {
    return object_methods()->camelize($str);
  }
  
  /**
   * Uses Object::humanize() instance method
   *
   * @param string $str
   * @return string
   */    
  function humanize($str) {
    return object_methods()->humanize($str);
  }
  
  /**
   * Uses Object::lowerscore() instance method
   *
   * @param string $str
   * @return string
   */    
  function lowerscore($str) {
    return object_methods()->lowerscore($str);
  }
  
  /**
   * Uses Object::unqualify() instance method
   *
   * @param string $str
   * @return string
   */    
  function unqualify($str) {
    return object_methods()->unqualify($str);
  }
}
?>