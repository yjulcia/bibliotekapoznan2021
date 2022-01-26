<?php
	session_start();
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
                    ?>
                    
                    <div id="headertext">Wyszukiwarka książek</div>
                    <br><br><br>
                   Proszę wpisać interesujący Cię tytuł/autora/kategorię.<br>
                    
                    <form action="search.php" method="post">
						<br/> <input type="text" name="search"><br>
						<input type="submit" class="button" value="Szukaj" name="submit">
					</form><br><br>
                    <?php	 
                     
                       
                        error_reporting(E_ALL ^ E_NOTICE); 
                        $search = $_POST['search'];
                        if ( isset($_POST['submit']) ) 
                        { 
                        	$res=$db->query("SELECT tytul, autor, ksiazka_id, kategoria FROM ksiazki natural join autorzy natural join kategorie natural join grupa WHERE tytul LIKE '%".$search."%' or autor like '%".$search."%' or kategoria like '%".$search."%' or grupa like '%".$search."%'"); 
                           
                        	$_SESSION['ksiazka_id']=array();
                            while ($data = $res->fetch_assoc())
                            {
                                array_push($_SESSION['ksiazka_id'], $data['ksiazka_id']);
                                
    		                    echo $data['tytul'].' <b>|</b> '.'<i>'.$data['autor'].'</i>'.' <b>|</b> '.$data['kategoria'] .' <b>|</b>
    				            <form method="post" action="reservation.php"><input type="submit" class="button" name="'.$data['ksiazka_id'].'"  
    				            
    				           value="Rezerwuj"></form>'.'</br></br>'; echo "<br><br>";
                            }
                        }
                          unset($_SESSION['blad']);
	                ?>
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
    				<div id="bottom_footer">Copyright by Olga M i Julia Ł</div>
				</div>
			</div>
	</div>
</body>
</html>