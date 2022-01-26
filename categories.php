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
                    
                        <div id="headertext">Kategorie</div>
                        <br><br><br>
                        Znajdź interesującą Cię kategorię <br><br>
                        <div id="menu_box">
                        
                        <ul>
                       
                       
                       <?php
                       
                       //kids
                        echo "<li class='dropdown'>
                                <a href='javascript:void(0)' class='dropbtn' name='dzieci'>Dzieci</a>
                                <div class='dropdown-content'>";
                                   
                        $res=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='dzieci'");
                        $kat=array();
                         $i=0;
                        while ($ro = mysqli_fetch_array($res,MYSQLI_BOTH))
                        {   
                            array_push($kat,$ro[0]); 
                                
                              
                                 echo "<a href='categories.php?kkat=$i'>$ro[0]</a>"; 
                                $i++;
                        }
                        
                         echo  "</div></li><div id=tekst>";
                          

                            function showBooks($kat,$db) 
                            {
                           
                             $wybranakat = $_GET['kkat'];
                             $ile = count($kat);
                            
                        
                                for($i = 0 ; $i < $ile ; $i++)
                                {
                                 
                                 $kaat=$kat[$wybranakat];
                                 echo "<br><div id=headertext>Lista książek</div>";
                                 echo "<br><br>Dzieci > $kaat<br>";
                                 $ress=$db->query("SELECT tytul, autor FROM ksiazki natural join kategorie natural join grupa natural join autorzy where grupa='dzieci' && kategoria='$kaat'");
                                    while ($data = $ress->fetch_assoc() )
                                    {
                                        echo '<br><b>'.$data['tytul'].' |</b> '.'<i>'.$data['autor'].'</i><br>';
                           
                                    }
                    		            break;
                            }   }



                                    if (isset($_GET['kkat'])) 
                                    {
                                        showBooks($kat,$db);
                                    }
                            echo "</div>";

                               
        //teen
                    echo "<li class='dropdown'>
                    <a href='javascript:void(0)' class='dropbtn' name='mlodziez'>Młodzież</a>
                    <div class='dropdown-content'>";
                                
                        
                         $res2=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='mlodziez'");
                         $kat2=array();
                           $i=0;  
                            while ($ro2 = mysqli_fetch_array($res2,MYSQLI_BOTH))
                            {   
                                 array_push($kat2,$ro2[0]); 
                                
                                
                                    echo "<a href='categories.php?kkat2=$i'>$ro2[0]</a>   ";
                                             $i++;      
                                             
                            }   
                    echo  "</div></li><div id=tekst>";
                            
              
                        function showBooksT($kat2,$db)
                        {
                        
                        $wybranakat2 = $_GET['kkat2'];

                        $ile2 = count($kat2);
                        
                            for($i = 0 ; $i < $ile2 ; $i++)
                            {   $kaat2=$kat2[$wybranakat2];
                                echo "<br><div id=headertext>Lista książek</div>";
                                 echo "<br><br>Młodzież > $kaat2<br>";
                               
                                $ress2=$db->query("SELECT tytul, autor FROM ksiazki natural join kategorie natural join grupa natural join autorzy where grupa='mlodziez' && kategoria='$kaat2'");
                                    while ($data = $ress2->fetch_assoc())
                                    {
                                    echo '<br><b>'.$data['tytul'].' |</b> '.'<i>'.$data['autor'].'</i><br>';                       
                                    }
                    		        break;
                        }   }

                            if (isset($_GET['kkat2'])) 
                            {
                            showBooksT($kat2,$db);
                            }
                       
                    echo "</div>";

                               
         //adult 
                echo "<li class='dropdown'>
                <a href='javascript:void(0)' class='dropbtn' name='dorosli'>Dorośli</a>
                <div class='dropdown-content'>";
                                
                     $res3=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='dorosli'");
                     $kat3=array();
                        $i=0;
                         while ($ro3 = mysqli_fetch_array($res3,MYSQLI_BOTH))
                        {   
                             array_push($kat3,$ro3[0]);               
                           
                            echo "<a href='categories.php?kkat3=$i'>$ro3[0]</a>   ";
                                       $i++;           
                            
                        }
                        echo  "</div></li><div id=tekst>";
                            
              
                        function showBooksA($kat3,$db) 
                        {
                        $wybranakat3=$_GET['kkat3'];
                           
                        $ile3 = count($kat3);   
                        
                            for($i = 0 ; $i < $ile3 ; $i++)
                            {
                                
                                $kaat3=$kat3[$wybranakat3];
                                  echo "<br><div id=headertext>Lista książek</div>";
                                 echo "<br><br>Dorośli > $kaat3<br>";
                                $ress3=$db->query("SELECT tytul, autor FROM ksiazki natural join kategorie natural join grupa natural join autorzy where grupa='dorosli' && kategoria='$kaat3'");
                                    while ($data = $ress3->fetch_assoc() )
                                    {
                                        echo '<br><b>'.$data['tytul'].' |</b> '.'<i>'.$data['autor'].'</i><br>';
                           
                                    }
                    		        break;
                                
                            }  
                        }

                                    if (isset($_GET['kkat3'])) 
                                    {
                                    showBooksA($kat3,$db);
                                    }
                       
                        echo "</div>";


                      /*  echo "<li class='dropdown'>
                            <a href='javascript:void(0)' class='dropbtn' name='dorosli'>Dorośli</a>
                                <div class='dropdown-content'>";
                                   
                                $res3=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='dorosli'");
                         while ($ro3 = mysqli_fetch_array($res3))
                             {    echo "<a href=''>$ro3[0]</a>";
                                                           
                            }
                                   
                            
                              echo  "</div>
                        </li>"; */
                        
                        ?>
                   
                   
                    </ul> 
                   </div>
                   
                        
                 
                    <?php	 
                        error_reporting(E_ALL ^ E_NOTICE); 
                        

                       /*
                        if ( isset($_POST['kid']) ) 
                        { 
                        $res=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='dzieci'");
                         while ($ro = mysqli_fetch_array($res))
                             {    echo $ro[0]; echo"<br>";
                                                           
                            }

                        }
                          if ( isset($_POST['teen']) ) 
                        { 
                          $res2=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='młodzież'");
                         while ($ro2 = mysqli_fetch_array($res2))
                             {    echo $ro2[0]; echo"<br>";
                                                           
                            }
                        }
                          if ( isset($_POST['adult']) ) 
                        { 
                          $res3=$db->query("SELECT DISTINCT kategoria FROM kategorie natural join ksiazki natural join grupa where grupa='dorosli'");
                         while ($ro3 = mysqli_fetch_array($res3))
                             {    echo $ro3[0]; echo"<br>";
                                                           
                            }
                        }
*/

                       /* $search = $_POST['search'];
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
                        }*/
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