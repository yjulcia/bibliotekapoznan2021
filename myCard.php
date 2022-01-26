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
	<title>Twoj Profil</title>
	<link rel="stylesheet" href="stylewww.css">
	<link href='https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap' rel='stylesheet' type='text/css'>
<style>
table, th, td {
  border: 3px solid white;
  border-collapse: collapse;
  text-align:center;
}
th, td {
  background-color: lightgray;
}
</style>

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
                   
				</ul>
			</div>
		</div>
		<div id="content">
			<div id="article">
				<div id="tekst"><div id=headertext>
					<?php
						echo "Witaj, ".$_SESSION['login'].'!';
						?>
						
					</div><br><br>Twoja karta biblioteczna<br>

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
						
						 $klient_id = $_SESSION['klient_id'];


						echo "<br><table style='width:100%'><tr><th><p><b>Imie</b></th>";  
						echo "<th><b>Nazwisko</b></th>";     
						echo "<th><b>E-mail</b></th>";
						echo "<th><b>Nr karty</b></th></tr>";
                              
                             
                              echo "<tr><td>".$_SESSION['imie']."</td>";
                               echo "<td>".$_SESSION['nazwisko']."</td>";
                               echo "<td>".$_SESSION['email']."</td>";
                              echo "<td>".$klient_id."</td></tr></table><br>";
		
                		?>
						<form action="logout.php" method="post">
						    <input type="submit" class="button" value="Wyloguj się"/>
					    </form> 
					<?php
						echo "<br><div id=headertext><b>Wypożyczone książki</b></div><br><br>";
						
                        $res = $db->query("SELECT tytul, datawyp, datazw, wypozyczenie_id,kopia_id FROM wypozyczenia NATURAL JOIN kopie NATURAL JOIN ksiazki WHERE klient_id=$klient_id");

                        while ($ro = mysqli_fetch_array($res,MYSQLI_BOTH))
                        {
                        echo "<p><b><img src='grafika/book.png' width='40' height='30' align='left'>&nbsp;"; 
                        echo $ro[0]; echo"</b><p>Data wypożyczenia: ";
                        echo $ro[1]; echo"<p>Data zwrotu: "; 
                        echo $ro[2]; echo"<p>ID wypożyczenia: ";
                        echo $ro[3];echo"<p> ";
                        }
                        


//przedluzanie - problem z dostepem

        echo "<div id=headertext> Przedłuż wypożyczenie</div><br><br><br>";

date_default_timezone_set('Europe/Warsaw');


 echo "<form action='' method='post'>Wybierz id wypożyczenia<br><br><select name=wypozyczenieid>";

                      $res3 = $db->query("SELECT wypozyczenie_id FROM wypozyczenia WHERE klient_id='$klient_id'");
                        while ($ro3 = mysqli_fetch_array($res3,MYSQLI_BOTH))
                        {
                            
                         echo "<option value='$ro3[0]'>$ro3[0]</option>";
                   
                        }
    echo " </select><input type='submit' class='button' name='przedluz' value='Przedłuż'><br><br></form>";



        $wypozyczenieid = $_POST['wypozyczenieid'];

         if(isset($_POST["przedluz"]))
        {
    
        $res2 = $db->query("SELECT datazw FROM wypozyczenia WHERE wypozyczenie_id='$wypozyczenieid'");
    

                        
                           
        while ($ro2 = mysqli_fetch_array($res2,MYSQLI_BOTH))
        {
 
                 $datazw=$ro2[0];

            $datazw2 = date('Y-m-d', strtotime($datazw.' + 30 days'));

                $res3 = $db->query("UPDATE wypozyczenia SET datazw = '$datazw2' where wypozyczenie_id=$wypozyczenieid");
               
               
               header('Location: myCard.php');
               

        }
         echo "<br><br> Przedłużono okres wypożyczenia o 30 dni dla wybranej książki. ";
  }
 
                        if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
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
				<div id="bottom_footer">Copyright by Olga M i Juia Ł</div>
				</div>
			</div>
	</div>
</body>
</html>