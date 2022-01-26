<?php

	session_start();
	
//	if (!isset($_SESSION['zalogowany']))
//	{
//		header('Location: logging.php');
//		exit();
//	}
	
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
				    error_reporting(E_ALL ^ E_NOTICE); 
				
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
                    
                    echo "<div id='headertext'>";
                    
                    for($i = 0 ; $i < count($_SESSION['ksiazka_id']) ; $i++)
                    {
                        if(isset($_POST[$_SESSION['ksiazka_id'][$i]]))
                        {
                        	$ksiazka_id=$_SESSION['ksiazka_id'][$i];
                        
                        	$res=$db->query("SELECT tytul FROM ksiazki natural join autorzy WHERE ksiazka_id=$ksiazka_id"); 
                            
                            while ($data = $res->fetch_assoc() )
                            {
                                echo $data['tytul'];
                            }
                    		break;
		                }
                    } echo "</div><br><br><br><br>";
                ?>
                <div id="godz">
                    <div class="bookcover"></div>
                </div>	 
            <div id='info'>
                <?php      		 
                    for($i = 0 ; $i < count($_SESSION['ksiazka_id']) ; $i++)
                    {
                        if(isset($_POST[$_SESSION['ksiazka_id'][$i]]))
                        {
                            $ksiazka_id=$_SESSION['ksiazka_id'][$i];
                            
                            $res2=$db->query("SELECT autor, ilosc, kategoria, kopia_id, grupa FROM ksiazki natural join autorzy natural join kopie natural join kategorie natural join grupa
                            WHERE ksiazka_id=$ksiazka_id"); 
                                
                            while ($data2 = $res2->fetch_assoc())
                            {
                                echo "<b>Autor</b><br>";
                                echo $data2['autor'];
                                echo "<br><br>";
                                echo "<b>Kategoria</b><br>";
                                echo $data2['kategoria'];
                                echo "<br><br>";
                                echo "<b>Grupa wiekowa</b><br>";
                               
                               $grupa=$data2['grupa'];
                               
                               
                              if($grupa=='mlodziez')
                               {
                                   echo "Młodzież";
                               }
                               if($grupa=='dorosli')
                               {
                                   echo "Dorośli";
                               }
                               if($grupa=='dzieci')
                               {
                                   echo "Dzieci";
                               }
                               
                               
                                echo "<br><br>";  echo "<b>Dostępność</b><br>";
                                $ilosc = $data2['ilosc'];
                                    
                                if($ilosc>0)
                                {
                                    echo "Dostępne";
                                } else{
                                    echo "Brak";
                                }

                                echo "<br><br>";
                                $kopiaid = $data2['kopia_id'];
                                echo "<br>"; 

                                if($ilosc=='0')
                                {
                                    echo "Nie można zarezerwować książki - brak na stanie!<br><br>";
                                    echo "<input type='submit' value=Zarezerwuj name=buttondis class='buttondisabled' disabled><br><br>";

                                }else{
                                    //echo "<form method='post' action='confirm.php'><input type='submit' value=Rezerwuj name=$kopiaid class='button'><br><br>";
                                    echo "<form action='confirm.php' method='post'><button type='submit' value='$kopiaid' class='button' name='kopiaid'>Zarezerwuj</button>";
                                    echo "</form>";
                                }
                            } break;
                        }
                    }
                ?>
			</div>
				<div style="clear: both;"></div>
			</div></div>
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