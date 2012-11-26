<?php
/**
 * Battlesuit module intializer
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage str
 */
namespace bs {
  $LIB_DIR = dirname(__DIR__)."/lib";
  
  # autoloadings
  autoload('str\Object', $LIB_DIR."/str/object.php");
  
  # requirements
  require_once $LIB_DIR."/str/functions.php";
  
  # optional aliasing
  class_alias('str\Object', 'Str');
}
?>