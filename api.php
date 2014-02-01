<?php
ini_set('error_reporting','E_ALL');
ini_set('display_errors',1);

require(dirname(__FILE__).'/server.class.php');
$server=new Sso_Server();
$hash=md5($_REQUEST['key']);
$cookie=$_REQUEST['cookie'];
$action=$_REQUEST['action'];
$results=array();

switch ($action) {
	case 'login': //a user logs in
		$email=isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
		$account=$server->updateAccount($hash,$cookie,1,$email);
		break;
	case 'logout': //a user logs out
		$email=isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
		$account=$server->updateAccount($hash,$cookie,0,$email);
		break;
	case 'loggedin': //check if user is logged in
		$account=$server->getAccount($hash,$cookie);
		if ($account===false) $results['loggedin']=false;
		else {
			$results['loggedin']=$account['loggedin'];
			$results['email']=$account['email'];
		}
		break;
}

$results['status']='success';
$results['request']=$_REQUEST;
echo json_encode($results);
