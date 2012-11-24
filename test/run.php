<?php
namespace test_bench {
  require __DIR__.'/../init/test.php';
  
  class PackageTestBench extends Base {
    function initialize() {
      require 'str_test.php';
      
      $this->add_test(new \strTest());
    }
  }
  
  $bench = new PackageTestBench();
  $bench->run_and_present_as_text();
}
?>