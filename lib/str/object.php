<?php
namespace str;

/**
 * Global string object
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage str
 */
class Object {
  protected $origin;
  protected $modified;
  
  function __construct($str = '') {
    $this->origin = $this->modified = $str;
  }
  
  function __toString() {
    return $this->read();
  }
  
  function origin() {
    return $this->origin;
  }
  
  function reset() {
    $this->modified = $this->origin;
  }
  
  function read() {
    return $this->modified;
  }
  
  function write($str) {
    $this->__construct($str);
  }
  
  static function create($str) {
    return new self($str);
  }
  
  /**
   * Turns a whitespace or underscore-separated string into a pascalized
   * form. Its very similar to camelization, except the fact that the first
   * letter is always upcased
   *
   * Example
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
   * Example
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
   * Example
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
   * Example
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