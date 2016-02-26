<?php

require 'bootstrap.php';

use App\Wallet;

set_time_limit(3);

$wallet = new Wallet();
if (isset($argv)) {
    $wallet->set_action($argv[1]);
}
$wallet->run(); 

?>