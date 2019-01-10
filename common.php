<?php 
require_once "db.php";
function isLogged(){
	if(isset($_SESSION['userLogged'])){
		return true;
	}
	return false;
}
function logout(){
	session_destroy();
}

?>