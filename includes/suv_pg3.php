<!-- 
Identification : suv_pg3.php
Author : Wonjin Song
Purpose : This file is for page 3 of the survey. The participants will be asked the satisfaction and the recommendation regarding to the products.     
  -->
<?php
function suv_pg3(){
	$satisfaction = array();
	$recommend = array();

	if (isset($_SESSION['satisfaction'])){
		$satisfaction = $_SESSION['satisfaction'];
	} else if (isset($_POST['satisfaction'])){
		$satisfaction = $_POST['satisfaction']; }

	if (isset($_SESSION['recommend'])) {
		$recommend = $_SESSION['recommend'];
	} else if (isset($_POST['recommend'])){
		$recommend = $_POST['recommend'];
	}
?>

	<h3>PAGE 3</h3>
	<h4> Question 3. How happy are you with this device on a scale from 1 (not satisfied) to 5 (very satisfied)? </h4>
	<form method="POST">
	 <?php foreach($_SESSION['purchases'] as $key => $value){?>	
	<table>
	   	<tr>		
		<td><?= $value?></td>
		</tr>
		<tr>
		<td >
		<?php 
            if(isset($satisfaction[$value]) && $satisfaction[$value]=="1"){
        ?>
			
            <input type="radio" name="satisfaction[<?= $value?>]" id="<?=$value?>1" value="1" checked>
			    <label for="<?=$value?>1"> 1 (not satisfied) </label>
		<?php }else{?>
			<input type="radio" name="satisfaction[<?= $value?>]" id="<?=$value?>1" value="1">
			    <label for="<?=$value?>1"> 1 (not satisfied) </label>
		<?php } ?>

		<?php 
            if(isset($satisfaction[$value]) && $satisfaction[$value]=="2"){
        ?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>2" value="2" checked>
			    <label for="<?=$value?>2"> 2 </label>
		<?php }else{?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>2" value="2" >
			    <label for="<?=$value?>2"> 2 </label>
		<?php } ?>

		<?php 
            if(isset($satisfaction[$value]) && $satisfaction[$value]=="3"){
        ?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>3" value="3" checked>
			    <label for="<?=$value?>3"> 3 </label>
		<?php }else{?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>3" value="3">
			    <label for="<?=$value?>3"> 3 </label>
		<?php } ?>

		<?php 
            if(isset($satisfaction[$value]) && $satisfaction[$value]=="4"){
        ?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>4" value="4" checked>
			    <label for="<?=$value?>4"> 4 </label>
		<?php }else{?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>4" value="4">
			    <label for="<?=$value?>4"> 4 </label>
		<?php } ?>

		<?php 
            if(isset($satisfaction[$value]) && $satisfaction[$value]=="5"){
        ?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>5" value="5" checked>
			    <label for="<?=$value?>5"> 5 (very satisfied) </label>
		<?php }else{?>
			<input type="radio" name="satisfaction[<?=$value?>]" id="<?=$value?>5" value="5" >
			    <label for="<?=$value?>5"> 5 (very satisfied)</label>
		<?php } ?>
            </td>
		</tr>
	</table>
	<?php } ?>
	<h4> Question 4. How happy are you with this device on a scale from 1 (not satisfied) to 5 (very satisfied)? </h4>
	<?php foreach($_SESSION['purchases'] as $key => $value){?>
	<table>
	    	<tr>		
		<td><?=$value?></td>
		</tr>
		<tr>
		<td>
		<select id="<?=$value?>" class="drp" name="recommend[<?=$value?>]" size="1">
		<?php if(!empty($recommend[$value]) && $recommend[$value]=="Choice"){?>
						<option selected="selected" value="Choose">Choose type</option>
		<?php } else { ?>
						<option value="Choose">Choose type</option>
		<?php }
			if(!empty($recommend[$value]) && $recommend[$value]=="Yes"){ ?>
						<option selected="selected" value="Yes">Yes</option>
		<?php } else { ?>
						<option value="Yes">Yes</option>
		<?php }
			if(!empty($recommend[$value]) && $recommend[$value]=="Maybe"){?>
						<option selected="selected" value="Maybe">Maybe</option>
		<?php } else { ?>
						<option value="Maybe">Maybe</option>
		<?php }
			if(!empty($recommend[$value]) && $recommend[$value]=="No"){?>
						<option selected="selected" value="No">No</option>
		<?php } else { ?>
						<option value="No">No</option>
		<?php } ?>
		</select></td>
		</tr>
	</table>
	    <?php } ?>
	<table>
		<tr>
			<td><input type="submit" name="sv_p3_back" class = "button" value="Previous"></td>
			<td><input type="submit" name="sv_p3_next" class = "button" value="Next"></td>
		</tr>
    </table>
	</form>
<?php } ?>

<?php
function validatePg3(){
	$err_msgs = array();
	
	if (isset($_POST['sv_p3_next']) || isset($_POST['sv_p3_back'])){
		if (!isset($_POST['satisfaction'])){
			$err_msgs[] = "One option must be selected";
		}else {
			$satisfaction = $_POST['satisfaction'];
		}
	
		if (!isset($_POST['recommend'])){
			$err_msgs[] = "The empty option cannot be selected";
		} else {
			$recommend = $_POST['recommend'];
			foreach($recommend as $value){
				if($value =="Choose"){
					$err_msgs[] = "Must be selected";
				}
			}
		}	
			
		if (count($err_msgs) == 0){
			$_POST['satisfaction'] = $satisfaction;
			$_POST['recommend'] = $recommend;
		}
	}
	return $err_msgs;
}
?>

<?php
function svPg3ToSession(){
	$_SESSION['satisfaction'] = $_POST['satisfaction'];
	$_SESSION['recommend'] = $_POST['recommend'];
}
?>
