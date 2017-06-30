<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 30/06/2017
 * Time: 22:29
 */

require_once  '../../vendor/autoload.php';

$successMsg = '';
$errorMsg = '';

if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['clientEmail']))
    {
        $order= new  Hudutech\Entity\Order();

    }
}

?>