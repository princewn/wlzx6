<?php
function isAdministrator(){
	if(isset( $_SESSION['username'] )&&( $_SESSION['username']=="wn")){
		return true;
	}
	else{
		return false;
	}

}
function visitForbidden(){
	print "<script>window.history.go(-1);</script>";
}
function ifVisitForbidden(){
	if(!isAdministrator()){
		visitForbidden();
	}
}
?>