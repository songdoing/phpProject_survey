<!--
Identification : suv_pg2.php
Author : Wonjin Song
Purpose : This file is for page 2 of the survey. The participants will be asked what he or she have purchased and how to purchase the products.        
-->
<?php
function suv_pg2(){
	$howPurchased = "";
	$purchases = array();

	if (isset($_SESSION['howPurchased'])){
		$howPurchased = $_SESSION['howPurchased'];
	} else if (isset($_POST['howPurchased'])){
		$howPurchased = $_POST['howPurchased']; 
	}

	if (isset($_SESSION['purchases'])){
		$purchases = $_SESSION['purchases'];
	} else if (isset($_POST['purchases'])){
		$purchases = $_POST['purchases']; 
    }
	 
?>
	<h3>PAGE 2</h3>
	<h4> Question 1. How did you complete your purchase? </h4>
	<form method="POST">
	<table>
	    
		<tr>
		<td>
        <input type="radio" id="Online" name="howPurchased" value="Online" 
		    <?php 
               if(isset($_SESSION['howPurchased'])) { 
                   if($_SESSION['howPurchased'] === "Online") {
                       echo 'checked'; 
                   } 
               }
            ?>
        > <label for="Online">Online</label>     
		</td>
        <td>
        <input type="radio" id="ByPhone" name="howPurchased" value="By Phone" 
	        <?php 
               if(isset($_SESSION['howPurchased'])) { 
                   if($_SESSION['howPurchased'] === "By Phone") {
                       echo 'checked'; 
                   } 
               }
            ?>
        > <label for="ByPhone">By Phone</label>
        </td>
	    <td>
	    <input type="radio" id="MobileApp" name="howPurchased" value="Mobile App" 
	        <?php 
               if(isset($_SESSION['howPurchased'])) { 
                    if($_SESSION['howPurchased'] === "Mobile App") {
                        echo 'checked'; 
                    } 
               }
            ?>
        > <label for="MobileApp">Mobile App</label>
	    </td>
	    <td>
	    <input type="radio" id="InStore" name="howPurchased" value="In Store" 
	        <?php 
               if(isset($_SESSION['howPurchased'])) { 
                   if($_SESSION['howPurchased'] === "In store") {
                       echo 'checked'; 
                   } 
               }
            ?>
        > <label for="InStore">In Store</label>     
	    </td>
	    <td>
        <input type="radio" id="ByMail" name="howPurchased" value="By Mail" 
	        <?php 
               if(isset($_SESSION['howPurchased'])) { 
                   if($_SESSION['howPurchased'] === "By Mail") {
                       echo 'checked'; 
                   } 
               }
            ?>
        > <label for="ByMail">By Mail</label>
	    </td>     
        </tr>
        
    </table>
    <h4>Question 2. Which of the following did you purchase? </h4>
			
	<table>
		<tr>
		<td>
        <input type="checkbox" id="HomePhone" name="purchases[]" value="Home Phone" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "Homephone") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        ><label for="HomePhone"> Home Phone</label>
		</td>
		<td>
        <input type="checkbox" id="MobilePhone" name="purchases[]" value="Mobile Phone" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "MobilePhone") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="MobilePhone">Mobile Phone</label>
		</td>
		<td>
        <input type="checkbox" id="SmartTv" name="purchases[]" value="Smart Tv" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "SmartTv") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="SmartTv">Smart Tv</label>
		</td>
		<td>
        <input type="checkbox" id="Laptop" name="purchases[]" value="Laptop" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "Laptop") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="Laptop">Laptop</label>
		</td>
		<td>
        <input type="checkbox" id="Desktop" name="purchases[]" value="Desktop Computer" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "Desktop") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="Desktop">Desktop Computer</label>
		</td>
		<td>
        <input type="checkbox" id="Tablet" name="purchases[]" value="Tablet" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "Tablet") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="Tablet">Tablet</label>
		</td>
		<td>
        <input type="checkbox" id="HomeTheater" name="purchases[]" value="Home Theater" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "HomeTheater") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="HomeTheater">Home Theater</label>
		</td>
		<td>
        <input type="checkbox" id="MP3" name="purchases[]" value="MP3 Player" 
            <?php 
               if(isset($_SESSION['purchases'])){
                   for($i=0; $i < count($_SESSION['purchases']); $i++){
                       if($_SESSION['purchases'][$i] === "MP3") {
                           echo 'checked';
                       }
                   }
               } 
            ?>
        > <label for="MP3">MP3 Player</label>
		</td>
        </tr>
		
        </table>
			
		<br><br>
	
	    <table>
		    <tr>
			<td><input type="submit" name="sv_p2_back" class = "button" value="Previous"></td>
			<td><input type="submit" name="sv_p2_next" class = "button" value="Next"></td>
		    </tr>
        </table>
	</form>
<?php } ?>

<?php
function validatePg2(){
	$err_msgs = array();
	
	if(isset($_POST['sv_p2_next']) || isset($_POST['sv_p2_back'])){
		if (!isset($_POST['howPurchased'])){
			$err_msgs[] = "Question 1! One must be selected ";
		} else {
			$howPurchased = $_POST['howPurchased'];
		}
		
		if(!isset($_POST['purchases'])){
			$err_msgs[] = "Question 2! At least one option must be selected";
		} else {
			$purchases = $_POST['purchases'];
		}
		
		if (count($err_msgs) == 0){
			$_POST['howPurchased'] = $howPurchased;
			$_POST['purchases'] = $purchases;
		}
	}
	return $err_msgs;
}
?>

<?php
function svPg2ToSession(){
	$_SESSION['howPurchased'] = $_POST['howPurchased'];
	$_SESSION['purchases'] = $_POST['purchases'];
}
?>
