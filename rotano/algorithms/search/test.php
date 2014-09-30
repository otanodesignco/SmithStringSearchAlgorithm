<?php

include('smith.php');

use Rotano\Algorithms\Search\Smith;

$smith = new Smith( 'GCATCGCAGAGAGTATACAGTACG', 'GCAGAGAG' );
$smith->Search();

?>