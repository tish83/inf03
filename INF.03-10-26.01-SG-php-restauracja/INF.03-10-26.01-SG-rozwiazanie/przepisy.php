<?php
    $conn = new mysqli("localhost", "root", "", "przepisy");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog kulinarny</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <aside>
            <a href="przepisy.php?id=1">Sernik</a><br>
            <a href="przepisy.php?id=2">Sałatka</a><br>
            <a href="przepisy.php?id=3">Pankejki</a><br>
            <a href="przepisy.php?id=4">Nugetsy</a><br>
            <a href="przepisy.php?id=5">Łosoś</a><br>
            <a href="przepisy.php?id=6">Kociołek</a><br>
            <a href="przepisy.php?id=7">Jagnięcina</a><br>
            <a href="przepisy.php?id=8">Hamburgery</a><br>
            <a href="przepisy.php?id=9">Eklerki</a><br>
            <a href="przepisy.php?id=10">Churros</a><br>
            <p>Autor: </p>
        </aside>

        <main>
            <?php
                // Skrypt #1
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $query = "SELECT potrawy.nazwa, rodzaje.rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE potrawy.idPotrawy = $id;";
                    $result = $conn -> query($query);
                    $row = $result -> fetch_assoc();
                    echo "<h1>" . $row["rodzaj"] . "</h1>";
                }

                // Skrypt #2
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $query = "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $id;";
                    $result = $conn -> query($query);
                    $row = $result -> fetch_assoc();
                    echo "<h2>" . $row["nazwa"] . "</h2>";
                    if($row["trudnosc"] == 1) {
                        $trudnosc = "łatwe";
                    }
                    else if($row["trudnosc"] == 2) {
                        $trudnosc = "średnie";
                    }
                    else if($row["trudnosc"] == 3) {
                        $trudnosc = "trudne";
                    }
                    echo "<p>Trudność: ".$trudnosc.", Kalorie: ".$row["kalorie"]."</p>";
                }
            ?>
            <img src="separator.png" alt="przepis">
            <?php
                // Skrypt #3
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $query = "SELECT potrawy.nazwa, alergeny.alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = $id;";
                    $result = $conn -> query($query);
                    echo "<p>Alergeny: ";
                    while($row = $result -> fetch_assoc()) {
                        echo $row["alergen"]." ";
                    }
                    echo "</p>";
                }
            ?>
            <h2>Składniki</h2>
            <ul>
                <li>Lorem 1 kg</li>
                <li>Ipsum 2 szt.</li>
                <li>Dolor 200 g</li>
                <li>Sit amet (szczypta)</li>
            </ul>
            <?php
                // Skrypt #4
                echo "<p>xyz</p>";
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $query = "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id;";
                    $result = $conn -> query($query);
                    $row = $result -> fetch_assoc();
                    $plik = $row["plik"];
                    echo "<p>".$row["przepis"]."</p>";
                }
            ?>
        </main>

        <section style="background-image: url('<?php echo $plik; ?>');">
            <h1>Blog Kulinarny</h1>
        </section>
    </body>
</html>

<?php
    $conn -> close();
?>