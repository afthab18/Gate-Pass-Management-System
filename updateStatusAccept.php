<?php

require_once("DBConnection.php");
session_start();

if(!isset($_SESSION["sess_user"])){
	header("Location: index.php");
  }
else{

	$eid = $_GET['eid'];
	$descr = $_GET['descr'];
	if($_GET['user']){
		$add_to_db = mysqli_query($conn,"UPDATE leaves SET status='Approved by parent' WHERE eid='".$eid."' AND descr='".$descr."'");

				if($add_to_db){	
					echo 'Saved!!';
					header("Location: guardian.php");
				}
				else{
					echo "Query Error : " . "UPDATE leaves SET status='Accepted' WHERE eid='".$eid."' AND descr='".$descr."'" . "<br>" . mysqli_error($conn);
				}
	}
	else{

		$add_to_db = mysqli_query($conn,"UPDATE leaves SET status='Accepted' WHERE eid='".$eid."' AND descr='".$descr."'");

		if($add_to_db){	
			echo 'Saved!!';
			header("Location: admin.php");
		}
		else{
			echo "Query Error : " . "UPDATE leaves SET status='Accepted' WHERE eid='".$eid."' AND descr='".$descr."'" . "<br>" . mysqli_error($conn);
		}
	}
	}

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>