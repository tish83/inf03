<?php
    $conn = new mysqli("localhost", "root", "", "samochody");
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Konfigurator samochodów</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Serwis konfiguracji samochodów</h1>
        </header>

        <nav>
            <h2>Samochody</h2>
            <h2>Konfigurator</h2>
            <h2>Kontakt</h2>
        </nav>

        <main>
            <section id="lewa">
                <table>
                    <?php
                        // Skrypt #1
                        $query = "SELECT marka, model, cena, nazwa, doplata FROM pojazdy INNER JOIN kolory ON kolor = kolory.id WHERE model = 'alfa';";
                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {
                            $cena_calkowita = $row['cena'] + $row['doplata'];

                            echo "<tr>";
                                echo "<td>" . $row['marka'] . "</td>";
                                echo "<td>" . $row['model'] . "</td>";
                                echo "<td>" . $row['nazwa'] . "</td>";
                                echo "<td>" . $cena_calkowita . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </section>

            <section id="srodkowa">
                <table>
                    <tr>
                        <th colspan="2">Konfiguracja</th>
                        <th>Cena</th>
                    </tr>
                    <?php
                        // Skrypt #2
                        $query = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2";
                        $result = $conn->query($query);
                        $nr = 1;

                        while ($row = $result->fetch_assoc()) {
                            $marka = $row['marka'];
                            $model = $row['model'];
                            $cena = $row['cena'];

                            echo "<tr>";
                                echo "<td colspan='3'><img src='a" . $nr . ".jpg' alt='Konfiguracja " . $nr . "'></td>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<td>Marka</td>";
                                echo "<td>" . $marka . "</td>";
                                echo "<td rowspan='2'>" . $cena . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<td>Model</td>";
                                echo "<td>" . $model . "</td>";
                            echo "</tr>";

                            $nr++;
                        }
                    ?>
                </table>
            </section>

            <section id="prawa">
                <h3>111 222 444</h3>
                <img src="a3.png" alt="Samochód">
            </section>
        </main>

        <footer>
            <p>Stronę wykonał: </p>
        </footer>
    </body>
</html>

<?php
    $conn->close();
?>