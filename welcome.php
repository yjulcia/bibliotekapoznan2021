<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: logging.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
	
	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
	if (isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
	if (isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
	if (isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
	if (isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Zarejestruj się/Zaloguj się</title>
	<link rel="stylesheet" href="stylewww.css">
	<link href='https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<div id="heder"></div>
			<div id="menu_top">
				<ul>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn">Moja Biblioteka</a>
						<div class="dropdown-content">
							<a href="myCard.php">Moja karta biblioteczna</a>
							<a href="logging.html">Zarejestruj się/ Zaloguj się</a>
						</div>
					</li>
					<li><a href="search.php">Wyszukaj</a></li>
                    	<li><a href="categories.php">Kategorie</a></li> 
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn">Dla Ciebie</a>
						<div class="dropdown-content">
							<a href="adult.html">Dorośli</a>
							<a href="teens.html">Młodzież</a>
							<a href="kids.html">Dzieci</a>
						</div>
					</li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn">O nas</a>
						<div class="dropdown-content">
							<a href="faqs.html">FAQS</a>
							<a href="contact.html">Kontakt</a>
						</div>
					</li>
					<li>
    					<label class="dropdown">
    						<input type="button" <input type="submit"  class="button" value="Tryb nocny" onclick="themeChange()">
    						<span class="slider round" ></span>
    					</label>
    					<script src="darkModeScript.js"></script>
					</li>
				</ul>
				<div style="clear: both;"></div>
			</div>
		<div id="aside">
			<div id="menu_box">
				<h2>Menu</h2>
				<ul>
					<li><a href="index.html">Strona główna</a></li> 
					<li><a href="search.html">Wyszukaj</a></li>
					<li><a href="contact.html">Kontakt</a></li>
                    <li><a href="categories.php">Kategorie</a></li>
				</ul>
			</div>
		</div>
		<div id="content">
			<div id="article">
				<div id="tekst">
					Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!<br /><br />
					<a href="logging.php">Zaloguj się na swoje konto!</a>
					<br /><br />
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
			<div style="clear: both;"></div>
			<div id="footer">
				<div id="top_footer">
    				<div id="aside_footer">Kontakt +48 666 444 555</div>
    				<div id="aside_footer">Mail biblioteka.poznan@gmail.com</div>
    				<div id="aside_footer">Adres ul.Taczaka 6 Poznań 60-778</div>
    				<div id="bottom_footer">Copyright by Olga M and Julia Ł</div>
				</div>
			</div>
	</div>
</body>
</html>