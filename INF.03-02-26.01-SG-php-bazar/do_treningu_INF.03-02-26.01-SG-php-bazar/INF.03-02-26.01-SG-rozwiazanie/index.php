<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zdrowy bazarek</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Zdrowy bazarek</h1>
        </header>

        <nav>
            <?php
                // Skrypt #1
            ?>
        </nav>

        <main>
            <section id="boczny">
                <img src="market.png" alt="bazarek">
            </section>

            <section id="sekcji">
                <p>Wybierz owoc lub warzywo i podaj jego wagę:</p>
                <form action="index.php" method="post">
                    <select name="id" id="id" required>
                        <?php
                            // Skrypt #2
                        ?>
                    </select>
                    <input type="number" step="1" min="1" name="waga" id="waga">
                    <button type="submit">Zamów</button>
                </form>

                <?php
                    // Skrypt #3
                ?>
            </section>
        </main>

        <footer>
            <p>Stronę opracował: </p>
        </footer>
    </body>
</html>