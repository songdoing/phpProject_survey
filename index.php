<!--
Identification : Index.php
Author : Wonjin Song
Purpose : make the initial page          
-->

<?php
	session_start();
	if (!isset($_SESSION['mode'])){  
		$_SESSION['mode'] = "Display";
	}
	
	require_once("./includes/db_connection.php"); 
	require_once("./includes/suv_pg1.php");
	require_once("./includes/suv_pg2.php");
	require_once("./includes/suv_pg3.php");
	require_once("./includes/clear_session.php");
	require_once("./includes/display_error.php");
	require_once("./includes/suv_save.php");
	require_once("./includes/thankyou.php");
?>

<html lang="en">
<head>
    <title>Project1 Group 18</title>
	<link href="css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['sv_start']) && ($_POST['sv_start'] == "Start Survey")){
	$_SESSION['mode'] = "Add";
	$_SESSION['suv_part'] = 0;
}

if(($_SESSION['mode'] == "Add") && ($_SERVER['REQUEST_METHOD'] == "GET")){ 
	switch ($_SESSION['suv_part']) {	
		case 0:
		case 1:
			suv_pg1();
			break;
		case 2:
			suv_pg2();
			break;
		case 3:
			suv_pg3();
			break;
		default:
	}
} else if($_SESSION['mode'] == "Add"){ 
	switch ($_SESSION['suv_part']) {
		case 0:			
			echo "<h1> Survey </h1>\n";
			$_SESSION['suv_part'] = 1;
			suv_pg1();
			break;
		case 1:			
			echo "<h1> Survey </h1>\n";
			$err_msgs = validatePg1();
			if (count($err_msgs) > 0){
				displayErrors($err_msgs);
				suv_pg1();
			} else if ((isset($_POST['sv_p1_next'])) && ($_POST['sv_p1_next'] == "Next")){
				svPg1ToSession();
				$_SESSION['suv_part'] = 2;
				suv_pg2();
			} else if ((isset($_POST['sv_p1_back'])) && ($_POST['sv_p1_back'] == "Previous")){
				svPg1ToSession();
				$_SESSION['mode'] = "Display";
                		initialPageDisplay();
			}
			break;
		case 2:
			echo "<h1> Survey </h1>\n";
			$err_msgs = validatePg2();
			if (count($err_msgs) > 0){
				displayErrors($err_msgs);
				suv_pg2();
			} else if ((isset($_POST['sv_p2_next'])) && ($_POST['sv_p2_next'] == "Next")){
				svPg2ToSession();
				$_SESSION['suv_part'] = 3;
				suv_pg3();
			} else if ((isset($_POST['sv_p2_back'])) && ($_POST['sv_p2_back'] == "Previous")){
				svPg2ToSession();
				$_SESSION['suv_part'] = 1;
				suv_pg1();
			}
			break;
		case 3:
			echo "<h1> Survey </h1>\n";
			$err_msgs = validatePg3();
			if (count($err_msgs) > 0){
				displayErrors($err_msgs);
				suv_pg3();
			} else if ((isset($_POST['sv_p3_next'])) && ($_POST['sv_p3_next'] == "Next")){
						svPg3ToSession();
				$_SESSION['suv_part'] = 4;
				suv_sav();
			} else if ((isset($_POST['sv_p3_back'])) && ($_POST['sv_p3_back'] == "Previous")){
				svPg3ToSession();
				$_SESSION['suv_part'] = 2;
				suv_pg2();
			}
			break;
		case 4:
			echo "<h1> Survey </h1>\n";
			if ((isset($_POST['sv_p4_next'])) && ($_POST['sv_p4_next'] == "Save")){
				$db_conn = connectDB();
				savsuv($db_conn);
				$db_conn = NULL;
				$_SESSION['suv_part'] = 0;
				clear_session();
				$_SESSION['mode'] = "Display";
               			thankyou();
			} else if ((isset($_POST['sv_p4_back'])) && ($_POST['sv_p4_back'] == "Previous")){
				
				$_SESSION['suv_part'] = 3;
				suv_pg3();
			}
			break;
		default:
	}
} else if($_SESSION['mode'] == "Display"){ 
	initialPageDisplay();
} 
?>
	</body>
</html>

<?php
function initialPageDisplay() {
	$db_conn = connectDB();
?>	
    <h1> Welcome to the Customer Satisfaction Survey! </h1>
    <img src="./images/survey.png">
    <div class = "instruct">
        <p> Please answer the following questions to the best of your ability.</p>
        <p> To save your answers and move onto the next page, just Click <b>Next.</b></p>
        <p> To modify your answers and move to the previous page, just Click <b>Previous.</b></p>
        <p> Press the <b>Start Survey</b> button below to begin the survey.</p>    
    </div>    
    
    <div>
        <form method="POST">
           <table>
               <tr>
                   <td> <input type="submit" name="sv_start" class="button" value="Start Survey"> </td>
               </tr>
           </table>
        </form>
    </div>
    
<?php
}	
?>
