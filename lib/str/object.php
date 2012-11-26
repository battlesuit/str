<?php
namespace str;

/**
 * Global string object
 *
 * Example:
 *  $str = new str\Object('hello world');
 *  $str->pascalize();
 *  echo "$str"; # displays "HelloWorld"
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage str
 */
class Object {
  
  /**
   * Holds the original unmodified string
   *
   * @access protected
   * @var string
   */
  protected $origin;
  
  /**
   * The modified string
   * Modifications can be made by methods like camelize, humanize...
   * 
   * @access protected
   * @var string
   */
  protected $modified;
  
  /**
   * Instance construction
   * Sets origin and modified values
   *
   * @access public
   * @param string $str
   */
  function __construct($str = '') {
    $this->origin = $this->modified = (string)$str;
  }
  
  /**
   * Calling a single instance method
   *
   * @access public
   * @param string $method
   * @param array $arguments
   * @return Object
   */
  function __call($method, array $arguments) {
    $instance_methods = static::instance_methods();
    
    if(method_exists($instance_methods, $method)) {
      if(!isset($arguments[0])) $arguments[0] = $this->modified;
      $this->modified = call_user_func_array(array($instance_methods, $method), $arguments);
    }
    
    return $this;
  }
  
  /**
   * To-string conversion is the same as calling read()
   *
   * @access public
   * @return string
   */
  function __toString() {
    return $this->read();
  }
  
  /**
   * Returns an object containing all instance methods
   * Its also possible to override the default object
   *
   * @static
   * @access public
   * @param ObjectMethods $methods
   * @return ObjectMethods
   */
  static function instance_methods(ObjectMethods $methods = null) {
    static $instance;
    if(!isset($instance)) $instance = new ObjectMethods();
    elseif(isset($methods)) $instance = $methods;
    return $instance;
  }
  
  /**
   * Returns the original string value without modifications
   *
   * @access public
   * @return string
   */
  function origin() {
    return $this->origin;
  }
  
  /**
   * Resetting the string to its original
   * Overrides the modified value with the original one
   *
   * @access public
   * @return Object
   */
  function reset() {
    $this->modified = $this->origin;
    return $this;
  }
  
  /**
   * Returns the actual modified value
   *
   * @access public
   * @return string
   */
  function read() {
    return $this->modified;
  }
  
  /**
   * Same as __construct()
   * This method replaces the current string with a complete new one
   * So origin and modified values are overridden
   * 
   * @access public
   * @param string $str
   * @return Object
   */
  function write($str = '') {
    $this->__construct($str);
    return $this;
  }
  
  /**
   * Quickbuilder method
   * So you are able to do someting like Object::create('simon says')->lowerscore();
   * As of PHP 5.4 you can do it without it by doing (new Object('simon says'))->lowerscore();
   * 
   * @static
   * @access public
   * @param string $str
   * @return Object
   */
  static function create($str) {
    return new static($str);
  }
}
?>