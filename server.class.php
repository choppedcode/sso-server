<?php
require(dirname(__FILE__).'/config.php');
ini_set('error_reporting',E_ALL);ini_set('display_errors',true);

class Sso_Server {
	function __construct() {
		global $conf;
		$this->pdo = new PDO('mysql:host='.$conf['db']['hostSpec'].';dbname='.$conf['db']['dbName'],$conf['db']['dbUser'],$conf['db']['dbPass']);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	
	function getAccount($hash,$cookie) {		
		$query='select * from connections where hash=? and cookie=?';
		$sth=$this->pdo->prepare($query);
		$sth->execute(array($hash,$cookie));
		if ($account=$sth->fetch()) {
			return $account;
		} else {
			return false;
		}
	}

	function createAccount($hash,$cookie) {		
		$query='insert into connections (hash,cookie,loggedin) values (?,?,0)';
		$sth=$this->pdo->prepare($query);
		$sth->execute(array($hash,$cookie));
	}

	function updateAccount($hash,$cookie,$loggedin,$email) {		
		$query='update connections set email=?, loggedin=? where hash=? and cookie=?';
		$sth=$this->pdo->prepare($query);
		$sth->execute(array($email,$loggedin,$hash,$cookie));
	}
	
}
