<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: logging.php');
		exit();
	}

    function connectdb()
	{  
		require_once "connect.php";
		$db = new mysqli($host, $db_user, $db_password, $db_name);  
		if (! $db)
		return false;
		$db->autocommit(TRUE);
		return $db;
	}
	
	$db = connectdb(); 

    $wypozyczenie_id = $_POST['wypozyczenie_id'];

    $datazw_id = $_SESSION['datazw_id'];

    echo $datazw_id;

	$res = $db->query("SELECT DATEADD(month,1,$datazw_id) FROM wypozyczenia NATURAL JOIN kopie NATURAL JOIN klienci NATURAL JOIN ksiazki WHERE wypozyczenie_id=$wypozyczenie_id");
    
?>