<?php
require_once 'libptest.php';

tests(0, 0.5);

// input object for is/isnttesting
$o1 = new stdClass();
$o1->a = 1;
$o1->b = 2;

$o2 = new stdClass();
$o2->a = 2;
$o2->b = 1;

$o3 = new stdClass();
$o3->a = 1;
$o3->b = 2;

ok(true, 'true - libptest:ok');
is(1, 1, 'true - libptest:is');
is(array(1,2,3), array(1,2,3), 'true - libptest:is for arrays');
is($o1, $o3, 'true - libptest:is for object');
isnt(1, 2, 'true - libptest:isnt');
isnt(array(1,2,3), array(3,2,1), 'true - libptest:isnt for arrays');
isnt($o1, $o2, 'true - libptest:isnt for object');
like('aaa', '/a+/', 'true - libptest:like');
unlike('aaa', '/b+/', 'true - libptest:unlike');


ok(false, 'false - libptest:ok');
is(1, 2, 'false - libptest:is');
is(array(1,2,3), array(1,2,1), 'false - libptest:is for arrays');
is($o1, $o2, 'false - libptest:is for object');
isnt(2, 2, 'false - libptest:isnt');
isnt(array(1,2,3), array(1,2,3), 'false - libptest:isnt for arrays');
isnt($o1, $o3, 'false - libptest:isnt for object');
like('aaa', '/b+/', 'false - libptest:like');
unlike('aaa', '/a+/', 'false - libptest:unlike');

?>
