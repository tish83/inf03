<?php
    $conn = new mysqli("localhost", "root", "", "pogoda");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pogoda</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div id="header1">
            <img src="slonce.png" alt="Słonecznie">
        </div>

        <div id="header2">
            <h1>Pogoda w Europie</h1>
        </div>

        <main>
            <div id="lewy">
                <h2>Temperatury w lipcu</h2>
                <table>
                    <tr>
                        <th>Miasto</th>
                        <th>Kraj</th>
                        <th>Temperatura</th>
                        <th>Pogoda</th>
                    </tr>
                    <?php
                        // Skrypt #1
                        $query = "SELECT miejscowosc.nazwa, miejscowosc.kraj, pomiary.temperatura FROM miejscowosc JOIN pomiary ON miejscowosc.id = pomiary.id_miejscowosc WHERE pomiary.id_miesiac = 7;";
                        $result = $conn -> query($query);
                        while($row = $result -> fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>".$row["nazwa"]."</td>";
                                echo "<td>".$row["kraj"]."</td>";
                                echo "<td>".$row["temperatura"]."</td>";
                                if($row["temperatura"] > 30) {
                                    echo "<td><img src='slonce.png' alt='Słońce'></td>";
                                }
                                else if($row["temperatura"] < 26) {
                                    echo "<td><img src='deszcz.png' alt='Deszcz'></td>";
                                }
                                else {
                                    echo "<td><img src='chmury.png' alt='Chmury'></td>";
                                }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>

            <div id="prawy">
                <h2>Średnie temperatury w roku</h2>
                <a href="index.php?month=1">Styczeń</a>
                <a href="index.php?month=2">Luty</a>
                <a href="index.php?month=3">Marzec</a>
                <a href="index.php?month=4">Kwiecień</a>
                <a href="index.php?month=5">Maj</a>
                <a href="index.php?month=6">Czerwiec</a>
                <a href="index.php?month=7">Lipiec</a>
                <a href="index.php?month=8">Sierpień</a>
                <a href="index.php?month=9">Wrzesień</a>
                <a href="index.php?month=10">Październik</a>
                <a href="index.php?month=11">Listopad</a>
                <a href="index.php?month=12">Grudzień</a>
                <p>Średnia temperatura dla wybranego miesiąca wynosi</p>
                <?php
                    // Skrypt #2
                    if(isset($_GET["month"])) {
                        $month = $_GET["month"];
                        $query = "SELECT ROUND(AVG(temperatura),2) as srednia FROM pomiary WHERE id_miesiac = $month;";
                        $result = $conn -> query($query);
                        $row = $result -> fetch_assoc();
                        echo "<p>".$row["srednia"]." stopni</p>";
                    }
                ?>
            </div>
        </main>

        <footer>
            <p>Numer zdającego: </p>
        </footer>
    </body>
</html>

<?php
    $conn -> close();
?>