<?php
    $conn = mysqli_connect("localhost", "root", "", "matura");
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
                $q1 = "SELECT id, imie, nazwisko FROM maturzysta WHERE szkola = 'T3' ORDER BY nazwisko ASC";
                $res1 = mysqli_query($conn, $q1);

                if ($res1) {
                    while ($row1 = mysqli_fetch_assoc($res1)) {
                        $id = $row1['id'];
                        $imie = $row1['imie'];
                        $nazwisko = $row1['nazwisko'];
                        $link = 'wynik.php?id=' . urlencode($id) . '&imie=' . urlencode($imie) . '&nazwisko=' . urlencode($nazwisko);

                        echo '<a href="' . $link . '">' . $id . '. ' . htmlspecialchars($imie) . ' ' . htmlspecialchars($nazwisko) . '</a><br>';
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