<?php
if (isset($_SESSION['user_id'])) {
    require_once('db.php');

    $stmt = $pdo->prepare('
        SELECT * FROM users WHERE id = ?
    ');

    $stmt->execute([
        $_SESSION['user_id']
    ]);

    $user = $stmt->fetch();
    $_SESSION['is_admin'] = $user['is_admin'];
    ?>
    Dobrodošli dragi <?php echo $user['name']; ?>!
    <br>
<?php
}
?>


<a href="index.php">
    <i class="fa fa-home"></i> Početna
</a>
<br>
 <!-- <a href="anketa-final.php">
    <i class="fa fa-align-center"></i> Anketa
</a>
<br> 
<a href="Rezultati.php">
    <i class="fa fa-edit"></i>Rezultati ankete
</a>
<br> -->

<?php
if (!isset($_SESSION['user_id'])) {
    ?>
    <a href="login.php">
        <i class="fa fa-sign-in-alt"></i> Prijava
    </a>
    <br>
    <a href="register.php">
        <i class="fa fa-user"></i> Registracija
    </a>
    <br>
<?php
}
?>

<?php
if (isset($_SESSION['user_id'])) {
    ?>
    <?php
    if (
        isset($_SESSION['is_admin'])
        && $_SESSION['is_admin']
    ) {
        ?>
        <a href="anketa.php">
            <i class="fa fa-align-center"></i> Anketa
        </a>
        <br>
        <a href="pitanja.php">
            <i class="fa fa-question"></i> Pitanja 
        </a>
        <br>
        <a href="odgovori.php">
            <i class="fa fa-broadcast-tower"></i> Odgovori 
        </a>
        <br>
    <?php
} else {?>
<a href="anketa-final.php">
    <i class="fa fa-align-center"></i> Anketa
</a>
<br> 
<a href="rezultati.php">
    <i class="fa fa-edit"></i>Rezultati ankete
</a>
<br>
<?php
}
?>
    <a href="logout.php">
        <i class="fa fa-sign-out-alt"></i> Odjavi se
    </a>
    <br>
    <br>
<?php
}
?>