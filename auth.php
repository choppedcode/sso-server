<?php
require(dirname(__FILE__).'/server.class.php');
$server=new Sso_Server();
$loggedin=0;
$hash=$_REQUEST['hash'];
if (isset($_COOKIE['cdsso'])) {
	$cookie=$_COOKIE['cdsso'];
	$account=$server->getAccount($hash,$cookie);
	if ($account===false) {
		$server->createAccount($hash,$cookie);
	} else {
		$loggedin=$account['loggedin'];
	}
} else {
	$cookie=md5(__FILE__.$hash.microtime()).date('YmdHis');
	$server->createAccount($hash,$cookie);
	setcookie('cdsso',$cookie, time()+3600*2);
}
$message=json_encode(array('cookie'=>$cookie,'loggedin'=>$loggedin));
?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
	if ( window.self !== window.top ) {
            window.onload = function(){
                parent.socket.postMessage('<?php echo $message;?>');
            };
            };
        </script>
</head>
<body>
</body>
</html>
