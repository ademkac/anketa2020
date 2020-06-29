<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Validacija - Sva polja su obavezna
foreach ($_POST as $key => $value) {
    if (empty($_POST[$key])) {
        //die(var_dump($_POST[$key], $key));
        $error_message = 'Greška! Sva polja su obavezna.';
        break;
    }
}

if (!isset($error_message)) {
    // Validacija - E-mail nije validan.
    if (
        isset($_POST['email'])
        && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
        $error_message = 'Greška! E-mail nije validan.';
    }
}

if (!isset($error_message)) {
    // Autentifikacija korisnika.
    if (
        isset($_POST['form-submit'])
        && !isset($error_message)
    ) {
        require_once('db.php');

        $stmt = $pdo->prepare('
            SELECT * FROM users WHERE email = ?
        ');

        $stmt->execute([
            $_POST['email']
        ]);

        $user = $stmt->fetch();

        if ($user 
            && password_verify($_POST['password'], $user['password']))
        {
            $success_message = 'Uspešno ste se prijavili!';
            unset($_POST);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['success_message'] = $success_message;
            header('Location: index.php');
        }
        else {
            if ($stmt->errorCode() == 23000) {
                $error_message = 'Greška! Korisnik sa ovom e-mail adresom već postoji.';
            } else {
                $error_message = 'Greška! Pokušajte ponovo.';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('head.php'); ?>

<body>
    <div class="container">
        <?php include_once('header.php'); ?>

        <div class="row">
            <div class="column">
                <p>
                    <?php include_once('nav.php'); ?>
                </p>
            </div>
            <div class="column-2-thirds">
                <h3>Prijava</h3>

                <p>Kako biste mogli da date svoje mišljenje i popunite anketu potrebno je da napravite nalog.</p>

                <form method="post" action="">
                    <div class="form-group">
                        <label for="input-email" class="col-sm-2 col-form-label">E-mail</label>
                        <div>
                            <input type="email" class="form-control" id="input-email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-password" class="col-sm-2 col-form-label">Lozinka</label>
                        <div>
                            <input type="password" class="form-control" id="input-password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-dark" name="form-submit" value="1">Prijavi se</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>

        <?php include_once('footer.php'); ?>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>