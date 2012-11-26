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
   * To-string conversion is the same as calling read()
   *
   * @access public
   * @return string
   */
  function __toString() {
    return $this->read();
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
   */
  function reset() {
    $this->modified = $this->origin;
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
   */
  function write($str) {
    $this->__construct($str);
  }
  
  /**
   * Quickbuilder method
   * So you are able to do someting like Object::create('simon says')->lowerscore();
   * As of PHP 5.4 you can do it without it by doing (new Object('simon says'))->lowerscore();
   * 
   * @static
   * @access public
   * @param string $str
   * @return self
   */
  static function create($str) {
    return new self($str);
  }
  
  /**
   * Turns a whitespace or underscore-separated string into a pascalized
   * form. Its very similar to camelization, except the fact that the first
   * letter is always upcased
   *
   * Example:
   *  "give me some salt" => "GiveMeSomeSalt"
   *  "have_a_beer" => "HaveABeer"
   *
   * @access public
   * @return self
   */
  function pascalize($str = null) {
    $this->modified = str_replace(' ', '', ucwords(preg_replace('/(_|-)+/', ' ', $str ? $str : $this->modified)));
    return $this;
  }
  
  /**
   * Turns a string into a human readable form
   *
   * Example:
   *  "i_need_some_water" => "I need some water"
   *  "gameSetAndMatch" => "Game set and match"
   *
   * @access public
   * @return self
   */
  function humanize($str = null) {
    $this->modified = ucfirst(strtolower(preg_replace('/(\p{Ll})(?|(?:_|\\\|\s)*(\p{Lu})|(?:_|\\\|\s)+(\p{Ll}))/', '$1 $2', str_replace('-', ' ', $str ? $str : $this->modified))));
    return $this;
  }

  /**
   * Removing underscores, whitespaces and dashes from the string
   * Upcase all remaining words except the first
   *
   * Example:
   *  "CamelCasedWords" => "camelCasedWords"
   *  "Foo and bar" => "fooAndBar"
   *  "Drink_and_drive" => "drinkAndDrive"
   *
   * @access public
   * @return self
   */
  function camelize($str = null) {
    $str = new self($str ? $str : $this->modified);
    $this->modified = lcfirst($str->pascalize()->read());
    return $this;
  }
  
  /**
   * Turns a camelcased string into a snake cased one
   * Whitespaces and backslashses will be replaced by one _
   * Dashes are converted to underscores and its number presists
   *
   * Example:
   *  "PascalizedClassDefinition" => "pascalized_class_definition"
   *  "my\class\Path" => "my_class_path"
   *  "some-dashed--words" => "some_dashed__words"
   *  "whitespaced    string" => "whitespaced_string"
   * 
   * @access public
   * @return self
   */
  function lowerscore($str = null) {
    $this->modified = strtolower(preg_replace('/(\p{Ll})(?|(?:\s|\\\)*(\p{Lu})|(?:\s|\\\)+(\p{Ll}))/', '$1_$2', str_replace('-', '_', $str ? $str : $this->modified)));
    return $this;
  }
  
  /**
   * Strips the namespace and returns an the unqualified class name
   *
   * Example:
   *  "ns\to\my\ClassName" => "ClassName" 
   *
   * @access public
   * @return self
   */
  function unqualify($str = null) {
    $qualified_name = $str ? $str : $this->modified;
    if(($last_backslash_pos = strrpos($qualified_name, '\\')) !== false) {
      $this->modified = substr($qualified_name, $last_backslash_pos+1);
    } else $this->modified = $qualified_name;
    
    
    return $this;
  }
}
?>