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
    <html lang="tr">
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
                <a id="language" href="iletisim-en.php">English|Turkish</a>
                <figure><img id="logo" src="images/logo.jpeg" alt="CalisthenicsWarriorLogo" ></figure>
                
            
            </header>
            <nav>
                
                <ul>
                    <li><a href="index.html">Anasayfa</a></li>
                    <li><a href="Hareketler.html">Calisthenics Seviyeler ve Hareketler</a></li>
                    <li><a href="hakkimda.html">Hakkımda</a></li>
                    <li><a id="here" href="iletisim.php">İletişim</a></li>
                </ul>
    
            </nav>
            <section id="iletisim">
                <article>
                    <div id="iletisimd">
                            
                        
                            <div id="iletisimbilgi">
                                <h1>İletişim Bilgileri</h1>
                                <div id="iletisimbilgileri"><h3>Email:</h3>
                                    <p>calisthenicswarrior.es@gmail.com</p>
                                </div>
                                <div id="iletisimbilgileri">
                                    <h3>İnstagram:</h3>
                                    <p><a href="https://www.instagram.com/calisthenicswarrior.es/" target="_blank">calisthenicswarrior.es</a>
                                        || <a href="https://www.instagram.com/eraysariikaya/" target="_blank">eraysariikaya</a>
                                    </p>
                                </div>
                                <div id="iletisimbilgileri"><h3>Youtube:</h3>
                                    <p><a href="https://www.youtube.com/channel/UCUVOfdJCFied1hIrW8aVkvQ" target="_blank">CalisthenicsWarrior</a></p>
                                </div>
                                <div id="iletisimbilgileri"><h3>Adres:</h3>
                                    <p>Türkiye/Ankara | Turkey/Ankara</p>
                                </div>
                            </div>
                           
                            <aside>
                                
                                <form action="iletisim.php" method="post">
                                    <h1>Bana Ulaşın</h1>
                                    <table id="iletisimform">
                                        <tr>
                                            <td class="formb"><label for="adsoyad">Ad-Soyad:</label></td>
                                            <td><input type="text" id="adsoyad" name="adsoyad" placeholder="Adınız ve Soyadınız..." autofocus required></td>
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="telefon">Telefon:</label></td>
                                            <td><input type="tel" id="telefon" name="telefon" pattern="[0-9]{11}" placeholder="05xxxxxxxxx" required></td>
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="email">Email:</label></td>
                                            <td><input type="email" id="email" name="email" placeholder="Emailiniz..." required></td>
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="level">Seviyeniz:</label></td>
                                            <td><select id="level" name="level">
                                                <option value="Seviye1">Başlangıç</option>
                                                <option value="Seviye2">Orta</option>
                                                <option value="Seviye3">İleri</option>
                                                
                                                </select>
                                            </td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td class="formb"><label for="ileti">İleti:</label></td>
                                            <td><textarea name="ileti" id="ileti" cols="30" rows="10" placeholder="Yorum, düşünce ve iletileriniz..." required></textarea></td>
                                        </tr>
                                        
                                    </table>
                                    <div class="buttons">
                                        <ul>
                                            <li><input type="reset" value="Temizle"></li>
                                            <li><input type="submit" name="submit" value="Gönder"></li>
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
                    <h3 id="footer1h3">Calisthenics Warrior Hakkında</h3>
                    <p class="footerp">
                        Merhaba! Ben Calisthenics Warrior kurucusu Eray Sarıkaya.<br>
                        Ben Bilgisayar Mühendislği öğrencisiyim. Spora karşı olan ilgim sonucunda
                        çeşitli spor dallarını denedim ve sporla hayatımı bir bütün haline getirdim.
                        Araştırmalar yaparak kendimi geliştirmeye ve bilinçlendirmeye çalıştım, hala 
                        daha çalışıyorum.
    
    
                    </p>
                    <p class="footerp">
                        Bu sitenin amacı kendim gibi insanlar bularak tanışmak ve karşılıklı bilinçlenmek
                        ve hatta birbirimize ilham olmak.
                    </p>
                </div>
                <div id="footer2">
                    <h3>Etiketler</h3>
                    <ul>
                        <li><a href="index.html#whatcal">Calisthenics Nedir?</a></li>
                        <li><a href="index.html#whycal">Neden Calisthenics?</a></li>
                        <li><a href="hakkimda.html#benkimim">Ben kimim?</a></li>
                        <li><a href="Hareketler.html#hareketler">Seviyeler ve Hareketler</a> </li>
                    </ul>
                </div>
                <div id="footer3">
                    <h3 >İletişim</h3>
                    <table>
                        <tr><td class="backg">Email:</td><td class="backg1">calisthenicswarrior.es@gmail.com</td></tr>
                        <tr><td class="backg">Youtube:</td><td class="backg1"><a href="https://www.youtube.com/channel/UCUVOfdJCFied1hIrW8aVkvQ" target="_blank">
                        CalisthenicsWarrior
                        </a></td></tr>
                        <tr><td class="backg">Instagram:</td><td class="backg1"><a href="https://www.instagram.com/calisthenicswarrior.es/" target="_blank">calisthenicswarrior.es</a></td></tr>
                    </table>
                    
                </div>
                <div id="rights">
                    <p>Copyrights 2021 © Eray Sarıkaya - Tüm Hakları Saklıdır.</p>
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

    