<?php


$url = "http://35.227.54.49:8069";
$db = "proyecto";
$username = "cris.ucands@gmail.com";
$password = "tequiero13";


require_once('ripcord.php');
$common = ripcord::client("$url/xmlrpc/2/common");
$common->version();
$uid = $common->authenticate($db, $username, $password, array());

$models = ripcord::client("$url/xmlrpc/2/object");
	$records = $models->execute_kw($db, $uid, $password,
    'account.invoice', 'search_read',
    array(array(array('state', '=', 'paid'))),
    array('fields'=>array('user_id', 'date_invoice', 'amount_total'), 'limit'=>5));
	
	echo json_encode ($records);
	
echo $uid;





?>