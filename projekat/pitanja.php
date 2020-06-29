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

// Brisanje pitanja.
if (isset($_GET['id'])
    && is_numeric($_GET['id'])
    && isset($_GET['action'])
    && $_GET['action'] == 'delete')
{
    $stmt = $pdo->prepare('
        DELETE FROM questions WHERE id = ?
    ');

    $result = $stmt->execute([
        $_GET['id']
    ]);

    $success_message = 'Uspešno ste obrisali anketu!';
    $_SESSION['success_message'] = $success_message;
    header('Location: pitanja.php');
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
        // Ažuriranje pitanja.
        if (isset($_GET['id'])
            && is_numeric($_GET['id']))
        {
            $stmt = $pdo->prepare('
                UPDATE questions SET survey_id = ?, content = ?, type = ? WHERE id = ?
            ');

            $result = $stmt->execute([
                $_POST['survey_id'], $_POST['content'], $_POST['type'], $_GET['id']
            ]);
        }
        // Kreiranje pitanja.
        else {
            $stmt = $pdo->prepare('
                INSERT INTO questions (survey_id, content, type) VALUES (?, ?, ?)
            ');

            $result = $stmt->execute([
                $_POST['survey_id'], $_POST['content'], $_POST['type']
            ]);
        }

        if ($result) {
            $success_message = 'Uspešno ste sačuvali pitanje!';
            unset($_POST);
            $_SESSION['success_message'] = $success_message;
            header('Location: pitanja.php');
        }
        else {
            if ($stmt->errorCode() == 23000) {
                $error_message = 'Greška! Ovakvo pitanje za istu anketu već postoji.';
            } else {
                die(var_dump($stmt->errorInfo()));
                $error_message = 'Greška! Pokušajte ponovo.';
            }
        }
    }
}

// Izmena postojećeg pitanja.
if (isset($_GET['id'])
    && is_numeric($_GET['id']))
{
    $stmt = $pdo->prepare('
        SELECT * FROM questions WHERE id = ?
    ');
    
    $stmt->execute([
        $_GET['id']
    ]);
    
    $row_edit = $stmt->fetch();

    if ($row_edit) {
        $_POST['survey_id'] = $row_edit['survey_id'];
        $_POST['content'] = $row_edit['content'];
        $_POST['type'] = $row_edit['type'];
    }
}

$stmt = $pdo->prepare('
    SELECT * FROM questions
');

$stmt->execute();

$rows = $stmt->fetchAll();

$stmt = $pdo->prepare('
    SELECT * FROM surveys
');

$stmt->execute();

$surveys = $stmt->fetchAll();

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
                <h3>Pitanja</h3>

                <form method="post" action="?id=<?php echo $_GET['id'] ?? ''; ?>">
                    <div class="form-group">
                        <label for="input-survey_id" class="col-form-label">Anketa</label>
                        <div>
                            <select name="survey_id" id="input-survey_id" class="form-control">
                                <?php foreach ($surveys as $survey) { ?>
                                    <option value="<?php echo $survey['id']; ?>"
                                    <?php echo ($_POST['survey_id'] ?? '') == $survey['id'] ? 'checked' : ''; ?>>
                                        <?php echo $survey['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-content" class="col-form-label">Tekst</label>
                        <div>
                            <textarea class="form-control" id="input-content" name="content"><?php echo $_POST['content'] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-type" class="col-form-label">Tip</label>
                        <div>
                            <select name="type" id="input-type" class="form-control">
                                <option value="radio"
                                <?php echo ($_POST['type'] ?? '') == 'radio' ? 'checked' : ''; ?>>radio</option>
                                <option value="checkbox"
                                <?php echo ($_POST['type'] ?? '') == 'checkbox' ? 'checked' : ''; ?>>checkbox</option>
                                <option value="text"
                                <?php echo ($_POST['type'] ?? '') == 'text' ? 'checked' : ''; ?>>text</option>
                                <option value="textarea"
                                <?php echo ($_POST['type'] ?? '') == 'textarea' ? 'checked' : ''; ?>>textarea</option>
                            </select>
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
                            <th width="20%">Anketa</th>
                            <th width="50%">Tekst</th>
                            <th width="20%">Tip</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <?php foreach ($surveys as $survey) { ?>
                                <?php if ($row['survey_id'] == $survey['id']) { ?>
                                    <td><?php echo $survey['name']; ?></td>
                                <?php } ?>
                            <?php } ?>
                            <td><?php echo $row['content']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td class="text-right">
                                <a href="pitanja.php?id=<?php echo $row['id']; ?>">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="pitanja.php?action=delete&id=<?php echo $row['id']; ?>">
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
