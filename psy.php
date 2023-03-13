<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
<h1>Forum miłośników psów</h1>
</header>
<aside>
<img src="Avatar.png" alt="Użytkownik forum">
<?php
$p = mysqli_connect("localhost","root","","forumpsy");
$k = mysqli_query($p,"SELECT konta.nick, postow, pytania.pytanie FROM konta, pytania WHERE pytania.id = 1 and konta.id = pytania.konta_id");
mysqli_close($p);
while ($ne = mysqli_fetch_row($k)){
echo 
"<h4>Użytkownik: $ne[0]</h4> <p> $ne[1] postów na forum </p> <p> $ne[2] </p>";
}
?>
<video src="video.mp4" controls loop></video>
</aside>
<main>
<form action="" method ="post">
<textarea name="wpis" cols="40" rows="4"></textarea><br>
<input type="submit" value="Dodaj odpowiedź">
</form>

<?php
@$wpis = $_POST['wpis'];
    $p = mysqli_connect("localhost","root","","forumpsy");
    $k = mysqli_query($p,"INSERT INTO odpowiedzi (id, Pytania_id, konta_id, odpowiedz) VALUES (null,1,5,'$wpis')");
    mysqli_close($p);
?>
<h2>Odpowiedzi na pytania</h2>
<ol>
<?php
@$wpis = $_POST['wpis'];
$p = mysqli_connect("localhost","root","","forumpsy");
$k = mysqli_query($p,"SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi, konta WHERE odpowiedzi.Pytania_id=1 AND odpowiedzi.konta_id=konta.id");
mysqli_close($p);
while($ne = mysqli_fetch_row($k)){
    echo "<li>
    $ne[1]
    <b><i>$ne[2]</i></b>
    <hr></li>";
}

?>
</ol>
</main>
<footer>
Autor: 00000000000 <a href=" http://mojestrony.pl/">Zobacz nasze realizacje</a>
</footer>
</body>
</html>