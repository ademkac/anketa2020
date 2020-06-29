<?php
session_start();

if (! isset($_SESSION['is_admin'])) {
    header('Location: index.php');
}

require_once('db.php');

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

// Brisanje ankete.
if (isset($_GET['id'])
    && is_numeric($_GET['id'])
    && isset($_GET['action'])
    && $_GET['action'] == 'delete')
{
    $stmt = $pdo->prepare('
        DELETE FROM surveys WHERE id = ?
    ');

    $result = $stmt->execute([
        $_GET['id']
    ]);

    $success_message = 'Uspešno ste obrisali anketu!';
    $_SESSION['success_message'] = $success_message;
    header('Location: anketa.php');
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
    if (
        isset($_POST['form-submit'])
        && !isset($error_message)
    ) {
        // Ažuriranje ankete.
        if (isset($_GET['id'])
            && is_numeric($_GET['id']))
        {
            $stmt = $pdo->prepare('
                UPDATE surveys SET name = ?, description = ? WHERE id = ?
            ');

            $result = $stmt->execute([
                $_POST['name'], $_POST['description'], $_GET['id']
            ]);
        }
        // Kreiranje ankete.
        else {
            $stmt = $pdo->prepare('
                INSERT INTO surveys (name, description) VALUES (?, ?)
            ');

            $result = $stmt->execute([
                $_POST['name'], $_POST['description']
            ]);
        }

        if ($result) {
            $success_message = 'Uspešno ste sačuvali anketu!';
            unset($_POST);
            $_SESSION['success_message'] = $success_message;
            header('Location: anketa.php');
        }
        else {
            if ($stmt->errorCode() == 23000) {
                $error_message = 'Greška! Anketa sa ovim nazivom već postoji.';
            } else {
                $error_message = 'Greška! Pokušajte ponovo.';
            }
        }
    }
}

// Izmena postojeće ankete.
if (isset($_GET['id'])
    && is_numeric($_GET['id']))
{
    $stmt = $pdo->prepare('
        SELECT * FROM surveys WHERE id = ?
    ');
    
    $stmt->execute([
        $_GET['id']
    ]);
    
    $row_edit = $stmt->fetch();

    if ($row_edit) {
        $_POST['name'] = $row_edit['name'];
        $_POST['description'] = $row_edit['description'];
    }
}

$stmt = $pdo->prepare('
    SELECT * FROM surveys
');

$stmt->execute();

$rows = $stmt->fetchAll();

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
                <h3>Ankete</h3>

                <form method="post" action="?id=<?php echo $_GET['id'] ?? ''; ?>">
                    <div class="form-group">
                        <label for="input-name" class="col-form-label">Naziv</label>
                        <div>
                            <input type="name" class="form-control" id="input-name" name="name" value="<?php echo $_POST['name'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-description" class="col-form-label">Opis</label>
                        <div>
                            <textarea class="form-control" id="input-description" name="description"><?php echo $_POST['description'] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-dark" name="form-submit" value="1">Sačuvaj</button>
                        </div>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th width="30%">Naziv</th>
                            <th width="60%">Opis</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td class="text-right">
                                <a href="anketa.php?id=<?php echo $row['id']; ?>">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="anketa.php?action=delete&id=<?php echo $row['id']; ?>">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


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
