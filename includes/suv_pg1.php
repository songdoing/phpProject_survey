<!--
Identification : suv_pg1.php
Author : Wonjin Song
Purpose : This file is for page 1 of the survey. The participants will be asked a full name, age and student type.          
-->
<?php
function suv_pg1(){
	$fname = "";
	$age = "";
	$studrp = "";

	if (isset($_SESSION['part_fullname'])){
		$fname = $_SESSION['part_fullname'];
	} else if (isset($_POST['part_fullname'])){
		$fname = $_POST['part_fullname']; }

	if (isset($_SESSION['part_age'])){
		$age = $_SESSION['part_age'];
	} else if (isset($_POST['part_age'])){
		$age = $_POST['part_age']; }

	if (isset($_SESSION['part_student'])){
		$studrp = $_SESSION['part_student'];
	} else if (isset($_POST['part_student'])){
		$stdrp1 = $_POST['part_student'];
		if (($stdrp1 == "") ||  ($stdrp1 == "Yes, Full Time")
			|| ($stdrp1 == "Yes, Part Time") || ($stdrp1 == "No") ){
			$studrp = $_POST['part_student']; } } 
?>
   
    <h3>PAGE 1</h3>
	<br>
	<form method="POST" >
	<table>
	
	<tr><td><label for="part_fullname">Full Name</label></td>
		<td><input type="text" name="part_fullname" id="part_fullname" size="50" maxlength="100" value="<?= $fname; ?>" class ="txt"></td>
	</tr>
	
	<tr><td><label for="part_age">Your Age</label></td>
		<td><input type="text" name="part_age" id="part_age" size="50" maxlength="100" value="<?= $age; ?>" class ="txt"></td>
	</tr>
	
	<tr><td><label for="part_student">Are you a student?</label></td>
		<td><select id="part_student" name="part_student" size="1" class="drp">
			<?php if ($studrp == ""){ ?> 
				<option selected="selected" value="Choice">Choose Type</option>
			<?php } else { ?> 
				<option  value="Choice">Choose Type</option> 
			<?php } 
				if ($studrp == "Yes, Full Time"){ ?> 
				<option selected="selected" value="Yes, Full Time">Yes, Full Time</option>
			<?php } else { ?> 
				<option  value="Yes, Full Time">Yes, Full Time</option> 
			<?php }
				if ($studrp == "Yes, Part Time"){ ?> 
				<option selected="selected" value="Yes, Part Time">Yes, Part Time</option> 
			<?php } else { ?> 
				<option  value="Yes, Part Time">Yes, Part Time</option> 
			<?php }
				if ($studrp == "No"){ ?> 
				<option selected="selected" value="No">No</option>
			<?php } else { ?> 
				<option value="No">No</option>
			<?php }?>
			</select> </td> 
	</tr>
	
	</table>
	<br><br>
	
	<table>
		<tr>
			<td><input type="submit" name="sv_p1_back" class = "button" value="Previous"></td>
			<td><input type="submit" name="sv_p1_next" class = "button" value="Next"></td>
		</tr>
	</table>
	</form>
<?php
}
?>

<?php
function validatePg1(){
	$err_msgs = array();
	
	if(isset($_POST['sv_p1_next'])){
		if(!isset($_POST['part_fullname'])){
			$err_msgs[] = "The name must not be empty";
		} else {
			$fname = trim($_POST['part_fullname']);
			if (strlen($fname) == 0){
				$err_msgs[] = "The name must not be empty";
			} else if (strlen($fname) > 50){
				$err_msgs[] = "The Name is nust be no longer than 50 characters in length.";
			}
		}
	
		if(!isset($_POST['part_age'])){
			$err_msgs[] = "The age must not be empty";
		} else {
			$age = trim($_POST['part_age']);
			if (strlen($age) == 0) {
				$err_msgs[] = "The age must not be empty";
			} else if(!is_numeric($age)) {
				$err_msgs[] = "The age must be numeric";
            } else if ((int) $age<1) {
				$err_msgs[] = "The age must be greater than 0";
			}
		}

		if (!isset($_POST['part_student'])){
			$err_msgs[] = "The type of student must be selected";
		} else {
			$studrp = trim($_POST['part_student']);
			if (!(($studrp == "Yes, Full Time") || ($studrp == "Yes, Part Time") || ($studrp == "No"))){
				$err_msgs[] = "The empty option cannot be selected";
			}
		}
		
		if (count($err_msgs) == 0){
			$_POST['part_fullname'] = $fname;
			$_POST['part_age'] = $age;
			$_POST['part_student'] = $studrp;
		}
	}
	return $err_msgs;
}
?>
<?php
function svPg1ToSession(){
	$_SESSION['part_fullname'] = $_POST['part_fullname'];
	$_SESSION['part_age'] = $_POST['part_age'];
	$_SESSION['part_student'] = $_POST['part_student'];
}
?>
