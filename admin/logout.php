<?php 


if ($_GET['action'] == 'logout') {
	include_once('../lib/session.php');
	Session::destroy();
}


 ?>