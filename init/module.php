<?php
namespace bs {
  $LIB_DIR = dirname(__DIR__)."/lib";
  
  autoload('str\Base', $LIB_DIR."/str/base.php");
  require_once $LIB_DIR."/str/functions.php";
  
  class_alias('str\Base', 'Str');
}
?>