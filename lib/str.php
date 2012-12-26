<?php
/**
 * Initializes the str bundle
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage str
 */
namespace {
  require __DIR__."/str/functions.php";
  
  if(defined('loader\available')) require __DIR__."/str/autoload.php";
  else spl_autoload_register();
  
  # optional aliasing
  class_alias('str\Object', 'Str');
}
?>