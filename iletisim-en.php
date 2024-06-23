<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "CaliUsers";
    
    $connect = mysqli_connect($server, $username, $password, $database);

    if (!$connect) {
        die("Bağlantı Başarısız: " . mysqli_connect_error());
    }
 
           
    if(isset($_POST["submit"])){
        
        if(isset($_POST["adsoyad"], $_POST["telefon"], $_POST["email"], $_POST["level"], $_POST["ileti"])){
            $adsoyad = mysqli_real_escape_string($connect, $_POST['adsoyad']);
            $telefon = mysqli_real_escape_string($connect, $_POST["telefon"]);
            $email = mysqli_real_escape_string($connect, $_POST["email"]);
            $level = mysqli_real_escape_string($connect, $_POST["level"]);
            $ileti = mysqli_real_escape_string($connect, $_POST["ileti"]);
            
           
            $sql = "INSERT INTO caliform (adsoyad, telefon, email, level, ileti) 
            VALUES ('".$adsoyad."','".$telefon."','".$email."','".$level."','".$ileti."')";
           
            if(mysqli_query($connect, $sql)){
                
                echo "<script>alert('Bana ulaştığınız için teşekkür ederim..')</script>";
                
            }
            
        }
        
    }
    
    
    

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Eray Sarıkaya | Calisthenics Warrior</title>
            <meta charset="utf-8">
            <meta name="description" content="Calisthenics Warrior : Vücut ağırlığı egzersizleri temelinde Güç, Dayanıklılık,
             Esneklik, Hız, Beceri, Kas gelişimi ve Ruhsal Gelişim">
            <meta name="keywords" content="Calisthenics,Warrior,Eray,Sarıkaya,Street,Workout,
             BodyWeight,Fitness,Spor,Savaşçı,Gymnastics,Güç,Hız,Kuvvet,Kas,Dayanıklılık,Skills">
            <link rel="shortcut icon" href="images/favicon.ico">
            <link rel="stylesheet" href="style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head> 
        <body>
            <header>
                <a id="language" href="iletisim.php">English|Turkish</a>
                <figure><img id="logo" src="images/logo.jpeg" alt="CalisthenicsWarriorLogo" ></figure>
                
            
            </header>
            <nav>
            
                <ul>
                    <li><a href="index-en.html">Homepage</a></li>
                    <li><a href="Hareketler-en.html">Calisthenics Levels and Movements</a></li>
                    <li><a href="hakkimda-en.html">About Me</a></li>
                    <li><a id="here" href="iletisim-en.php">Communication</a></li>
                </ul>
    
            </nav>
            <section id="iletisim">
                <article>
                    <div id="iletisimd">
                            
                        
                            <div id="iletisimbilgi">
                                <h1>Contact information</h1>
                                <div id="iletisimbilgileri"><h3>Email:</h3>
                                    <p>calisthenicswarrior.es@gmail.com</p>
                                </div>
                                <div id="iletisimbilgileri">
                                    <h3>Instagram:</h3>
                                    <p><a href="https://www.instagram.com/calisthenicswarrior.es/" target="_blank">calisthenicswarrior.es</a>
                                        || <a href="https://www.instagram.com/eraysariikaya/" target="_blank">eraysariikaya</a>
                                    </p>
                                </div>
                                <div id="iletisimbilgileri"><h3>Youtube:</h3>
                                    <p><a href="https://www.youtube.com/channel/UCUVOfdJCFied1hIrW8aVkvQ" target="_blank">CalisthenicsWarrior</a></p>
                                </div>
                                <div id="iletisimbilgileri"><h3>Adress:</h3>
                                    <p>Türkiye/Ankara | Turkey/Ankara</p>
                                </div>
                            </div>
                           
                            <aside>
                                
                                <form action="iletisim.php" method="post">
                                    <h1>Contact Me</h1>
                                    <table id="iletisimform">
                                        <tr>
                                            <td class="formb"><label for="adsoyad">Name-Surname:</label></td>
                                            <td><input type="text" id="adsoyad" name="adsoyad" placeholder="Your name and surname..." autofocus required></td>
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="telefon">Telephone:</label></td>
                                            <td><input type="tel" id="telefon" name="telefon" pattern="[0-9]{11}" placeholder="05xxxxxxxxx" required></td>
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="email">Email:</label></td>
                                            <td><input type="email" id="email" name="email" placeholder="Your e-mail..." required></td>
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="level">Your Level:</label></td>
                                            <td><select id="level" name="level">
                                                <option value="Seviye1">Beginner</option>
                                                <option value="Seviye2">Intermediate</option>
                                                <option value="Seviye3">Advanced</option>
                                                
                                                </select>
                                            </td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="ileti">Message:</label></td>
                                            <td><textarea name="ileti" id="ileti" cols="30" rows="10" placeholder="Your comments, thoughts and messages..." required></textarea></td>
                                        </tr>
                                        
                                    </table>
                                    <div class="buttons">
                                        <ul>
                                            <li><input type="reset" value="Reset"></li>
                                            <li><input type="submit" name="submit" value="Submit"></li>
                                        </ul>
                                         
                                        
                                    </div>
                                   
                                    
                                </form>
                            </aside>
    
                    </div>
        
        
                </article>
            </section>
            <section id="iletisimykutu">
                <?php
                    $sql="SELECT adsoyad,level,ileti FROM caliform";
                    $result=mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                
                        while($row=mysqli_fetch_assoc($result)){
                            echo' 
                                <div class="yorumkutu">
                                    <p id="iletip"><i>'.$row["ileti"].'</i></p>
                                    <br>
                                    <br>
                                    <p><b>'.$row["adsoyad"].'</b></p><p><b>('.$row["level"].')</b></p>
                
                                </div>
                            
                            
                            ';
                        }
                
                    }

                ?>

            </section>
            <footer>
            <div id="footer1">
                <h3 id="footer1h3">About Calisthenics Warrior</h3>
                <p class="footerp">
                    Hello there! I am Eray Sarıkaya, founder of Calisthenics Warrior.
                    I am a Computer Engineering student. As a result of my interest in sports, I tried various sports branches and brought my life into a whole with sports.
                     I tried to improve myself and raise awareness by doing research, I am still working.

                    


                </p>
                <p class="footerp">
                    The purpose of this site is to find and meet people like myself, to gain
                     mutual awareness and even to inspire each other.
                </p>
            </div>
            <div id="footer2">
                <h3>Labels</h3>
                <ul>
                    <li><a href="index-en.html">What is Calisthenics?</a></li>
                    <li><a href="index-en.html#whycal">Why Calisthenics?</a></li>
                    <li><a href="hakkimda-en.html#benkimim">Who am I?</a></li>
                    <li><a href="Hareketler-en.html#hareketler">Levels and Movements</a> </li>
                </ul>
            </div>
            <div id="footer3">
                <h3 >Communication</h3>
                <table>
                    <tr><td class="backg">Email:</td><td class="backg1">calisthenicswarrior.es@gmail.com</td></tr>
                    <tr><td class="backg">Youtube:</td><td class="backg1"><a href="https://www.youtube.com/channel/UCUVOfdJCFied1hIrW8aVkvQ" target="_blank">
                    CalisthenicsWarrior
                    </a></td></tr>
                    <tr><td class="backg">Instagram:</td><td class="backg1"><a href="https://www.instagram.com/calisthenicswarrior.es/" target="_blank">calisthenicswarrior.es</a></td></tr>
                </table>
                
            </div>
            <div id="rights">
                <p>Copyrights 2021 © Eray Sarıkaya</p>
                <a href="https://www.instagram.com/calisthenicswarrior.es/" target="_blank">
                     <img src="images/logo-ig.png" alt="instagram icon" >
                </a>
                <a href="https://www.youtube.com/channel/UCUVOfdJCFied1hIrW8aVkvQ" target="_blank">
                    <img id="youtubelogoimg" src="images/3399900751530099628-128.png" alt="youtube icon">
                </a>
            </div>
            
        </footer>
    
        </body>
    </html>

    