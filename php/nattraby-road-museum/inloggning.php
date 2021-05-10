<?php
$title = "Välkommen till Nättraby Vägmuseum | Nättraby Vägmuseum";
include(__DIR__ . "/views/header.php");
session_start();
?>

<main>
    <article>
        <header>
            <h1>Inloggning</h1>
        </header>
        <div class="login-container">
            <form method="post" action="admin.php?sida=post-bearbetning">
                <p>
                    <input type="text" name="user" placeholder="Användare" required />
                </p>
                <p>
                    <input type="password" name="password" placeholder="Lösenord" required />
                </p>
                <p>
                    <input type="submit" name="login" value="Logga in" />
                </p>
            </form>
        </div>
        <footer>
            <?php
            if (isset($_SESSION["access"])) {
                echo "<h3>Fel användarnamn eller lösenord!</h3>";
                $_SESSION["access"] = null;
            }
            ?>
        </footer>
    </article>
</main>

<?php include(__DIR__ . "/views/footer.php") ?>
