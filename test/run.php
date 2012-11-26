<?php
namespace test_bench {
  require __DIR__.'/../init/test.php';
  error_reporting(-1);
  
  class PackageTestBench extends Base {
    function initialize() {
      require 'str/object_test.php';
      
      $this->add_test(new \str\ObjectTest());
    }
  }
  
  $bench = new PackageTestBench();
  $bench->run_and_present_as_text();
}
?>