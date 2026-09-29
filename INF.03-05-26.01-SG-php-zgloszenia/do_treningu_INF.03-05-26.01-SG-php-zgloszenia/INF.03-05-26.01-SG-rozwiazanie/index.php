<?php
    // Skrypt #3
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ZGŁOSZENIA</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Zgłoszenia wydarzeń</h1>
        </header>

        <main>
            <div id="lewy">
                <h2>Personel</h2>
                <form action="index.php" method="post">
                    <label>
                        <input type="radio" name="personel" value="Policjant" checked>
                        Policjant
                    </label>
                    <label>
                        <input type="radio" name="personel" value="Ratownik">
                        Ratownik
                    </label>
                    <button type="submit" name="pokaz">Pokaż</button>
                </form>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                    </tr>
                    <?php
                        // Skrypt #1
                    ?>
                </table>
            </div>

            <div id="prawy">
                <h2>Nowe zgłoszenie</h2>
                <?php
                    // Skrypt #2
                ?>
                <form action="index.php" method="post">
                    <label for="osoba_id">Wybierz id osoby z listy: </label>
                    <input type="number" id="osoba_id" name="osoba_id" min="1" required>
                    <button type="submit" name="dodaj_zgloszenie">Dodaj zgłoszenie</button>
                </form>
            </div>
        </main>

        <footer>
            <p>Stronę wykonał: </p>
        </footer>
    </body>
</html>