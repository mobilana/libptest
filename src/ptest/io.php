<?php
//
//  libptest: terminal I/O
//  @author   Mobilana <dev@mobi-lana.com>
//  @license  FreeBSD

function ptest_msg_ok($msg)
{
   global $_PTEST;
	if (isset($msg))
      print "ok {$_PTEST->index} - $msg\n";
   else   
      print "ok {$_PTEST->index}\n";
   
}

//
// outputs nok message
function ptest_msg_nok($msg, $reason=null)
{
   global $_PTEST;
   $stack = debug_backtrace();
   if (isset($msg))
      print "not ok {$_PTEST->index} - $msg\n";
   else   
      print "not ok {$_PTEST->index}\n";
   if (isset($reason))
      print "$reason\n";
   print "# failed in " . $stack[1]['file'] . ' at ' . $stack[1]['line'] . "\n";
}


?>