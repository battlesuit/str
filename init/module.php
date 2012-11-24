<?php
namespace bs {
  $LIB_DIR = dirname(__DIR__)."/lib";
  
  autoload('str\Object', $LIB_DIR."/str/object.php");
  require_once $LIB_DIR."/str/functions.php";
  
  class_alias('str\Object', 'Str');
}
?>