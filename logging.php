<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: myCard.php');
		exit();
	}
	if (isset($_SESSION['test']))
	{
		echo "test";
	}
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
							<a href="logging.php">Zarejestruj się/ Zaloguj się</a>
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
					<li><a href="search.php">Wyszukaj</a></li>
					<li><a href="contact.html">Kontakt</a></li>
                    <li><a href="categories.php">Kategorie</a></li>
				</ul>
			</div>
		</div>
		<div id="content">
			<div id="article">
				<div id="tekst">
					<div id="headertext">  Logowanie <br></div>
					<div id="godz">
				<br><br>
						<form action="logIn.php" method="post">
							Login <br /> <input type="text" name="login" /> <br />
							Hasło <br /> <input type="password" name="haslo" /> <br /><br />
							<input type="submit" class="button" value="Zaloguj się" /><br><br>
						</form>
						<?php
							if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
						?>
					</div>
					<div id="info"><br><br>
						<form action="registration.php">
							<p>Rejestracja - załóż darmowe konto!</p>
							<input type="submit" class="button" value="Zarejestruj się" /><br>
						</form>
					</div>
				</div>
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