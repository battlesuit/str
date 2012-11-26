<?php
namespace str;

/**
 * This object contains methods used by str\Object
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage str
 */
class ObjectMethods {

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
   * @param string $str
   * @return string
   */
  function pascalize($str) {
    return str_replace(' ', '', ucwords(preg_replace('/(_|-)+/', ' ', $str)));
  }
  
  /**
   * Turns a string into a human readable form
   *
   * Example:
   *  "i_need_some_water" => "I need some water"
   *  "gameSetAndMatch" => "Game set and match"
   *
   * @access public
   * @param string $str
   * @return string
   */
  function humanize($str) {
    return ucfirst(strtolower(preg_replace('/(\p{Ll})(?|(?:_|\\\|\s)*(\p{Lu})|(?:_|\\\|\s)+(\p{Ll}))/', '$1 $2', str_replace('-', ' ', $str))));
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
   * @param string $str
   * @return string
   */
  function camelize($str) {
    return lcfirst($this->pascalize($str));
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
   * @param string $str
   * @return string
   */
  function lowerscore($str) {
    return strtolower(preg_replace('/(\p{Ll})(?|(?:\s|\\\)*(\p{Lu})|(?:\s|\\\)+(\p{Ll}))/', '$1_$2', str_replace('-', '_', $str)));
  }
  
  /**
   * Strips the namespace and returns an the unqualified class name
   *
   * Example:
   *  "ns\to\my\ClassName" => "ClassName" 
   *
   * @access public
   * @param string $qualified_name
   * @return string Unqualified name
   */
  function unqualify($qualified_name) {
    if(($last_backslash_pos = strrpos($qualified_name, '\\')) !== false) {
      $qualified_name = substr($qualified_name, $last_backslash_pos+1);
    }
    
    return $qualified_name;
  }
}
?>