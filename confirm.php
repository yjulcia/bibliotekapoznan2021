<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
	
		header('Location: logging.php');
		exit();
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Katalog</title>
	<link rel="stylesheet" href="stylewww.css">
	<script src="search.js"></script>
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
							<a href="logging.php">Moja karta biblioteczna</a>
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
				<div id='headertext'>Stan rezerwacji</div>
				<?php
                    
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
                    $kopiaid=$_POST['kopiaid'];			
				
                    $klientid=$_SESSION['klient_id'];
                
                    echo"<br><br>";
        

                  date_default_timezone_set('Europe/Warsaw');
                            $date = date('Y-m-d');
                            $retdate = date('Y-m-d', strtotime($date.' + 30 days'));


                    if (isset($kopiaid)) 
                    {
                             

                        $res = $db->query("INSERT INTO wypozyczenia (wypozyczenie_id, klient_id, kopia_id, datawyp, datazw) VALUES (null, '$klientid', '$kopiaid', '$date', '$retdate')");
                     //usuwanie ksiazki po zarezrwowaniu
                     $ress = $db->query("UPDATE kopie set ilosc=(ilosc-1) where kopia_id='$kopiaid'");

                        echo "<br><br>Rezerwacja potwierdzona!<br><br>";
                                
                        echo "Dodano książkę: ";
                        $res2 = $db->query("SELECT tytul from ksiazki natural join kopie where kopia_id='$kopiaid'");
                            
                        while ($data = $res2->fetch_assoc())
                        {
                            echo $data['tytul'];
                        }
                        echo "<br> do Twojej karty bibliotecznej. Prosimy o odbiór na miejscu w bibliotece.";
                    }
				?>
				</div>
				    <div style="clear: both;"></div>
			</div>
		</div>
			<div style="clear: both;"></div>
			<div id="footer">
				<div id="top_footer">
    				<div id="aside_footer">Kontakt +48 666 444 555</div>
    				<div id="aside_footer">E-mail biblioteka.poznan@gmail.com</div>
    				<div id="aside_footer">Adres ul.Taczaka 6 Poznań 60-778</div>
    				<div id="bottom_footer">Copyright by Olga M and Julia Ł</div>
				</div>
			</div>
	</div>
</body>
</html>