<?php
    $conn = mysqli_connect("localhost", "root", "", "matura");

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $imie = isset($_GET['imie']) ? $_GET['imie'] : '';
    $nazwisko = isset($_GET['nazwisko']) ? $_GET['nazwisko'] : '';
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Matura</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>System informacji dla maturzystów</h1>
        </header>

        <aside>
            <img src="ma.jpg" alt="Matura"><br>
            <img src="tu.jpg" alt="Matura"><br>
            <img src="ra.jpg" alt="Matura"><br>
        </aside>

        <div id="pierwszy">
            <?php
                echo "<h2>" . htmlspecialchars($imie) . " " . htmlspecialchars($nazwisko) . "</h2>";

                $q5 = "SELECT arkusz.rok, arkusz.sesja, arkusz.przedmiot, wynik.punkty FROM arkusz JOIN wynik ON arkusz.symbol = wynik.symbol WHERE wynik.maturzysta_id = $id";
                $res5 = mysqli_query($conn, $q5);

                if ($res5) {
                    while ($row5 = mysqli_fetch_assoc($res5)) {
                        echo "<h3>" . $row5['rok'] . " " . $row5['sesja'] . "</h3>";
                        echo "<p>" . htmlspecialchars($row5['przedmiot']) . ": " . $row5['punkty'] . "</p>";
                    }
                }
            ?>
        </div>

        <div id="drugi">
            <?php
                echo "<div class='blok'>";
                    echo "<h4>Przedmioty</h4>";
                    $q2 = "SELECT DISTINCT przedmiot FROM arkusz";
                    $res2 = mysqli_query($conn, $q2);
                    if ($res2) {
                        while ($row2 = mysqli_fetch_assoc($res2)) {
                            echo $row2['przedmiot'] . " ";
                        }
                    }
                echo "</div>";

                echo "<div class='blok'>";
                    echo "<h4>Lata</h4>";
                    $q3 = "SELECT MIN(rok) AS min_rok, MAX(rok) AS max_rok FROM arkusz";
                    $res3 = mysqli_query($conn, $q3);
                    if ($res3) {
                        $row3 = mysqli_fetch_assoc($res3);
                        echo $row3['min_rok'] . " - " . $row3['max_rok'];
                    }
                echo "</div>";

                echo "<div class='blok'>";
                    echo "<h4>Najlepszy wynik</h4>";
                    $q4 = "SELECT maturzysta_id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1";
                    $res4 = mysqli_query($conn, $q4);
                    if ($res4) {
                        $row4 = mysqli_fetch_assoc($res4);
                        echo round($row4['Wynik'], 2) . "%";
                    }
                echo "</div>";

                echo "<div class='blok'>";
                    echo "<h4>Najgorszy wynik</h4>";
                    $q4asc = "SELECT maturzysta_id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1";
                    $res4asc = mysqli_query($conn, $q4asc);
                    if ($res4asc) {
                        $row4asc = mysqli_fetch_assoc($res4asc);
                        echo round($row4asc['Wynik'], 2) . "%";
                    }
                echo "</div>";
            ?>
        </div>

        <footer>
            <p>Stronę wykonał: </p>
        </footer>
    </body>
</html>

<?php
    $conn->close();
?>