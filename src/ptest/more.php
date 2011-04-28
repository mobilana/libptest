<?php
//
//  libptest: PHP implementation of Test::More
//  @author   Mobilana <dev@mobi-lana.com>
//  @license  FreeBSD

function ok($test, $msg=null, $err=null)
{
	global $_PTEST;
   if (!isset($_PTEST))
   {
      ptest_msg_nok($msg, 'Tests are not planned.');   
      return;
   }
	$_PTEST->index++; 
	if ($test)
	{
	   $_PTEST->passed++;
	   ptest_msg_ok($msg);
	} else {
	   $_PTEST->failed++;
	   ptest_msg_nok($msg, $err);
	};
	return $test;
}

function is($got, $expected, $msg=null)
{
   return ok($got === $expected, $msg, "#      got: " . json_encode($got) . "\n# expected: " . json_encode($expected));
}

function isnt($got, $expected, $msg=null)
{
   return ok($got !== $expected, $msg, "#          got: " . json_encode($got) . "\n# not expected: " .json_encode($expected));
}

function like($test, $regex, $msg=null)
{
   ok(preg_match($regex, $test), $msg, "#        string: $test\n# doesn't match: $regex");
}

function unlike($test, $regex, $msg=null)
{
   ok(!preg_match($regex, $test), $msg, "#    string: $test\n# matches: $regex");
}

function cmp_ok($got, $op, $expected, $msg=null)
{
   ok(false, $msg, '# cmp_ok is not supported yet.');   
}

function can_ok($module, $methods, $msg=null)
{
   ok(false, $msg, '# can_ok is not supported yet.');   
}

function isa_ok($object,   $class, $object_name, $msg=null)
{
   ok(false, $msg, '# isa_ok is not supported yet.');   
}

function pass($msg)
{
   ok(true, $msg);
}

function fail($msg)
{
   ok(false, $msg);
}

?>
