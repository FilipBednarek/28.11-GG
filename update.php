<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz PHP</title>
</head>
<body>
    <fieldset>
        <legend>Formularz</legend>
        <form action="update.php" method="post">
            <label>Imie<input type="text" name="imie" /></label><br />
            <label>Nazwisko<input type="text" name="nazwisko" /></label><br />
            <label>PESEL<input type="number" name="pesel" maxlength="" /></label><br />
            <input type="submit" value="Zmień" />
        </form>
    </fieldset>
    <?php
    if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['pesel']) && $_POST['pesel'] > 0 && $_POST['pesel'] <100000000000){
       
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $pesel = $_POST['pesel'];

        $conn = mysqli_connect('localhost', 'root', '', 'zadanie');
        if($conn){
        $sql = "UPDATE `klienci` SET `imie`='$imie',`pesel`='$pesel' WHERE `nazwisko` = '$nazwisko';";
        $wynik = mysqli_query($conn, $sql);
        }else{
            echo "<script>alert('Brak połączenia z bazą danych !!!!')</script>";
        }
        mysqli_close($conn);
    }
    ?>
</body>
</html>