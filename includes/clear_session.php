<!--
Identification : clear_session.php
Author : Wonjin Song
Purpose : This file is for deleting all sessions after completing the survey, using 'unset'.          
-->
<?php
function clear_session(){
	if (isset($_SESSION['part_fullname'])){
        unset($_SESSION['part_fullname']);
	}
	if (isset($_SESSION['part_age'])){
        unset($_SESSION['part_age']);
	}
	if (isset($_SESSION['part_student'])){
		unset($_SESSION['part_student']);
	}	
	if (isset($_SESSION['howPurchased'])){
        unset($_SESSION['howPurchased']);
	}
	if (isset($_SESSION['purchases'])){
        unset($_SESSION['purchases']);
	}
	if (isset($_SESSION['satisfaction'])){
        unset($_SESSION['satisfaction']);
	}
	if (isset($_SESSION['recommend'])){
        unset($_SESSION['recommend']);
	}
}
?>
