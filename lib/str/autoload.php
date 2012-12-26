<?php
namespace loader {

  /**
   * All the autoloading is done here
   * 
   */
  
  def('str\Object', __DIR__."/object.php");
  def('str\ObjectMethods', __DIR__."/object_methods.php");
}
?>