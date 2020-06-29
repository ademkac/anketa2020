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

// Brisanje odgovora.
if (isset($_GET['id'])
    && is_numeric($_GET['id'])
    && isset($_GET['action'])
    && $_GET['action'] == 'delete')
{
    $stmt = $pdo->prepare('
        DELETE FROM answers WHERE id = ?
    ');

    $result = $stmt->execute([
        $_GET['id']
    ]);

    $success_message = 'Uspešno ste obrisali anketu!';
    $_SESSION['success_message'] = $success_message;
    header('Location: odgovori.php');
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
        // Ažuriranje odgovora.
        if (isset($_GET['id'])
            && is_numeric($_GET['id']))
        {
            $stmt = $pdo->prepare('
                UPDATE answers SET question_id = ?, content = ? WHERE id = ?
            ');

            $result = $stmt->execute([
                $_POST['question_id'], $_POST['content'], $_GET['id']
            ]);
        }
        // Kreiranje odgovora.
        else {
            $stmt = $pdo->prepare('
                INSERT INTO answers (question_id, content) VALUES (?, ?)
            ');

            $result = $stmt->execute([
                $_POST['question_id'], $_POST['content']
            ]);
        }

        if ($result) {
            $success_message = 'Uspešno ste sačuvali odgovor!';
            unset($_POST);
            $_SESSION['success_message'] = $success_message;
            header('Location: odgovori.php');
        }
        else {
            if ($stmt->errorCode() == 23000) {
                $error_message = 'Greška! Ovakav odgovor za isto pitanje već postoji.';
            } else {
                die(var_dump($stmt->errorInfo()));
                $error_message = 'Greška! Pokušajte ponovo.';
            }
        }
    }
}

// Izmena postojećeg odgovora.
if (isset($_GET['id'])
    && is_numeric($_GET['id']))
{
    $stmt = $pdo->prepare('
        SELECT * FROM answers WHERE id = ?
    ');
    
    $stmt->execute([
        $_GET['id']
    ]);
    
    $row_edit = $stmt->fetch();

    if ($row_edit) {
        $_POST['question_id'] = $row_edit['question_id'];
        $_POST['content'] = $row_edit['content'];
    }
}

$stmt = $pdo->prepare('
    SELECT * FROM answers
');

$stmt->execute();

$rows = $stmt->fetchAll();

$stmt = $pdo->prepare('
    SELECT * FROM questions
');

$stmt->execute();

$questions = $stmt->fetchAll();

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
                <h3>Odgovori</h3>

                <form method="post" action="?id=<?php echo $_GET['id'] ?? ''; ?>">
                    <div class="form-group">
                        <label for="input-question_id" class="col-form-label">Pitanje</label>
                        <div>
                            <select name="question_id" id="input-question_id" class="form-control">
                                <?php foreach ($questions as $question) { ?>
                                    <option value="<?php echo $question['id']; ?>"
                                    <?php echo ($_POST['question_id'] ?? '') == $question['id'] ? 'checked' : ''; ?>>
                                        <?php echo $question['content']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-content" class="col-form-label">Odgovor</label>
                        <div>
                            <textarea class="form-control" id="input-content" name="content"><?php echo $_POST['content'] ?? ''; ?></textarea>
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
                            <th width="60%">Pitanje</th>
                            <th width="30%">Odgovor</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <?php foreach ($questions as $question) { ?>
                                <?php if ($row['question_id'] == $question['id']) { ?>
                                    <td><?php echo $question['content']; ?></td>
                                <?php } ?>
                            <?php } ?>
                            <td><?php echo $row['content']; ?></td>
                            <td class="text-right">
                                <a href="odgovori.php?id=<?php echo $row['id']; ?>">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="odgovori.php?action=delete&id=<?php echo $row['id']; ?>">
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
