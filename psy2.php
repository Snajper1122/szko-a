<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>

    <aside>
        <img src="Avatar.png" alt="Użytkownik forum">
    <!-- skrypt 1 -->
        <?php
            $p = mysqli_connect("localhost","root","","forumpsy");

            $z = mysqli_query($p,"SELECT konta.nick, konta.postow, pytania.pytanie FROM konta, pytania
            WHERE konta.id = pytania.konta_id AND pytania.id = 1");

            mysqli_close($p);

            while ($ne = mysqli_fetch_row($z)) {
                echo "<h4> Użytkownik: $ne[0]</h4> <p> $ne[1] postów na forum</p> <p>$ne[2]</p>";
            }
        ?>
        <video src="video.mp4" controls type="video/mp4" loop id="film"></video>
    </aside>

    <main>
        <form action="psy.php" method="post">
            <textarea name="wpis" cols="40" rows="4" id="tekst"></textarea> <br>
            <input type="submit" name="przycisk" value="Dodaj odpowiedź">
        </form>
        <h2>Odpowiedzi na pytanie</h2>

    <!-- skrypt 2 -->
        <?php
            @$wpis = $_POST['wpis']; 

            $p = mysqli_connect("localhost","root","","forumpsy");
            if(!empty($wpis)){
            $z = mysqli_query($p,"INSERT INTO odpowiedzi(id, Pytania_id, konta_id, odpowiedz) 
            VALUES (null, 1, 5, '$wpis')");
            }
            else{
               echo "Pusto";
            }
            mysqli_close($p);

            echo "$wpis";
            
        ?>

    <!-- skrypt 3 -->
        <?php
            if(isset($_POST['wpis'])){
                
                    echo "<ol>";
                    $p2 = mysqli_connect("localhost","root","","forumpsy");

                    
                    $z2 = mysqli_query($p2,"SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi, konta
                    WHERE odpowiedzi.konta_id = konta.id AND odpowiedzi.Pytania_id = 1");
                    

                    mysqli_close($p2);

                    while ($ne2 = mysqli_fetch_row($z2)) {
                        echo "<li> $ne2[1] $ne2[2] <hr> </li>";
                    }
                    echo "</ol>";

            }
            
            
        ?>
    </main>

    <footer>
        Autor: xxxxxxxxxx <a href="http://mojestrony.pl/" target="blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>
