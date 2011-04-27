<?php
require_once 'libptest.php';

tests(0, 0.5);

ok(true, 'true - libptest:ok');
is(1, 1, 'true - libptest:is');
isnt(1, 2, 'true - libptest:isnt');
like('aaa', '/a+/', 'true - libptest:like');
unlike('aaa', '/b+/', 'true - libptest:unlike');


ok(false, 'false - libptest:ok');
is(1, 2, 'false - libptest:is');
isnt(2, 2, 'false - libptest:isnt');
like('aaa', '/b+/', 'false - libptest:like');
unlike('aaa', '/a+/', 'false - libptest:unlike');

?>