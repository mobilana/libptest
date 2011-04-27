<?php
//
//  libptest: bootstap testing
//  @author   Mobilana <dev@mobi-lana.com>
//  @license  FreeBSD

//
// Declares a testing plan, number of test to pass or pass rate
function tests($count, $rate=1.0)
{
   global $_PTEST;
   if (!isset($_PTEST))
     $_PTEST= new stdClass();
     
   $_PTEST->tests  = $count;  //number of tests to pass
   $_PTEST->rate   = $rate;   //desired pass rate
   $_PTEST->index  = 0;       //index of current test
   $_PTEST->passed = 0;       //number of passed tests
   $_PTEST->failed = 0;       //number of failed tests
   
   $stack = debug_backtrace();
   print "\n\nRun $count tests from " . $stack[0]['file'] . "\n";
}

//
// Shutdown handler
function ptest_exit()
{
   global $_PTEST;
   if (isset($_PTEST))
   {
      $rate = $_PTEST->passed / $_PTEST->index;
      print "#\n# passed: {$_PTEST->passed} failed: {$_PTEST->failed} rate: $rate\n";

      if ($_PTEST->tests == 0)
      {
         //number of test to pass is not defined, rate is estimated
         $r = ($_PTEST->rate <= $rate) ? 0 : 1;   
      } else {
         //number of test to pass is defined
         $r = ($_PTEST->tests <= $_PTEST->passed) ? 0 : 1;
      }
      exit($r);
   }   
}
register_shutdown_function('ptest_exit');

?>