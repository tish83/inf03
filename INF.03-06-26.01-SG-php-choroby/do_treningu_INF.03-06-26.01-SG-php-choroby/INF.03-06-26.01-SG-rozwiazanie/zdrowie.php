<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styl.css">
        <title>Wykaz chorób</title>
    </head>
    <body>
        <header>
            <h1>Informacja o chorobach w Polsce</h1>
        </header>

        <nav>
            <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
            <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
            <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
        </nav>

        <main>
            <div id="lewy">
                <h2>Choroby zakaźne</h2>
                <ol>
                    <?php
                        // Skrypt #1
                    ?>
                </ol>
            </div>

            <div id="prawy">
                <h2>Objawy chorób</h2>
                <form action="zdrowie.php" method="post">
                    <select name="choroba" id="choroba">
                        <?php
                            // Skrypt #2
                        ?>
                    </select>
                    <button type="submit" name="sprawdz" id="sprawdz">Sprawdź</button>
                </form>
                <div id="wynik">
                    <?php
                        // Skrypt #3
                    ?>
                </div>
            </div>
        </main>

        <footer>
            <p>Stronę opracował: </p>
        </footer>

        <img src="zdrowia.png" alt="Życzymy zdrowia!">
    </body>
</html>