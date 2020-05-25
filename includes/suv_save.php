<!--
Identification : suv_save.php
Author : Wonjin Song
Purpose : This file is for the summary of the survey. The participants can check what he or she answered.          
-->
<?php
function suv_sav(){
?>
	<h3>Summary</h3>
	
	<form method="POST" >	
	<table border =1 >
	<tr><td style="font-weight:bold;background-color:lightblue;">Page 1</td></tr>
	<tr><td>Full Name</td><td><?=$_SESSION['part_fullname']; ?></td></tr> 
	<tr><td>Age</td><td><?=$_SESSION['part_age']; ?></td></tr>
	<tr><td>Is Student?</td><td><?=$_SESSION['part_student']; ?></td></tr>
	</table>
	<table border =1 >	
	<tr><td style="font-weight:bold;background-color:lightblue;">Page 2</td></tr>
	<tr><td>How to purchase?</td><td><?=$_SESSION['howPurchased']; ?></td></tr>
	<tr><td>Projucts purchased</td>
	<td>
	<?php 
		foreach($_SESSION['purchases'] as $value){
			echo "$value<br>"; 
		}	
	?>
	</td>
	</tr>
	</table>
	<table border =1 >
	<tr><td style="font-weight:bold;background-color:lightblue;">Page 3</td></tr>
	<tr><td>Satisfaction</td>
	<td>
	<?php 
		foreach($_SESSION['satisfaction'] as $key=>$value){
			echo "$key,\n$value<br>"; 
		}	
	?>
	</td>
	</tr>
	<tr><td>Recommend</td>
	<td>
	<?php 
		foreach($_SESSION['recommend'] as $key=>$value){
			echo "$key,\n$value<br>"; 
		}	
	?>
	</td>
	</tr>
	</table>
	<br>

    <table>
    <tr>
        <td><input type="submit" name="sv_p4_back" value="Previous"></td>
        <td><input type="submit" name="sv_p4_next" value="Save"></td>
    </tr>
    </table>
	</form>
<?php
}
?>


<?php
function savsuv($db_conn){
    $field_data = array();
	$qry_pt = "insert into participants set part_fullname=?, part_age=?, part_student=?";
	$studrp ="";
    if($_SESSION['part_student']=="Yes, Full Time"){
	$studrp = "F";
    }else if($_SESSION['part_student']=="Yes, Part Time"){
	$studrp = "P";
    }else if($_SESSION['part_student']=="No"){
	$studrp = "N";
    }

    if (isset($_SESSION['part_fullname'])){
        $field_data = array($_SESSION['part_fullname'],$_SESSION['part_age'],$studrp);
    }
    
    
    $stmt = $db_conn->prepare($qry_pt);
    if (!$stmt){
		echo "<p>Error in participants prepare: ".$dbc->errorCode()."</p>\n<p>Message ".implode($dbc->errorInfo())."</p>\n";
		exit(1);
	}
	$status = $stmt->execute($field_data);
	if (!$status){
		echo "<p>Error in participants execute: ".$stmt->errorCode()."</p>\n<p>Message ".implode($stmt->errorInfo())."</p>\n";
		exit(1);
	}
	$id = $db_conn->lastInsertId();
	unset($field_data);
    
    $field_data = array();
    if(isset($_SESSION['purchases'])){
        $qry_re = "insert into responses set resp_part_id=?, resp_product=?, resp_how_purchased=?, resp_satisfied=?, resp_recommend=?";
        $howPurchased = $_SESSION['howPurchased'];
        $purchases = $_SESSION['purchases'];    
        $satisfaction = $_SESSION['satisfaction'];
        $recommend = $_SESSION['recommend'];
        
        foreach($purchases as $value){
            $field_data = array($id, $value, $howPurchased, $satisfaction[$value], $recommend[$value]);
           
            $stmt = $db_conn->prepare($qry_re);
	       if (!$stmt){
		      echo "<p>Error in responses prepare: ".$dbc->errorCode()."</p>\n<p>Message ".implode($dbc->errorInfo())."</p>\n";
		      exit(1);
	       }
	       $status = $stmt->execute($field_data);
	       if (!$status){
		      echo "<p>Error in responses execute: ".$stmt->errorCode()."</p>\n<p>Message ".implode($stmt->errorInfo())."</p>\n";
		      exit(1);
	       }
            
        }
        
    }
    unset($field_data);    
}
?>
