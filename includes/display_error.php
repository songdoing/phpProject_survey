<!--
Identification : display_error.php
Author : Wonjin Song
Purpose : To display error massages          
-->
<?php
function displayErrors($errs){
	echo "<div>\n";
	echo "<h3> This form contains the following errors.</h3>\n";
	echo "<ul>\n";
	foreach ($errs as $err){
		echo "<li style='font-style:italic; color:purple;'>".$err."</li>\n";
	}
	echo "</ul>\n";
	echo "</div>\n";
}
?>
