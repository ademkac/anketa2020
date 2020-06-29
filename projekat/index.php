<?php
include_once 'sesija.php'; 
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
                <p>Dobrodošli na sajt "Anketa 2020"! Sajt je napravljen kao projekat za predmet "Veb Programiranje" i namenjen je pregledu ankete i popunjavanju iste nakon registracije / prijave.
                    Prijavite se kako bi ste popunili anketu. Ukoliko niste prijavljeni, registrujte se.
                </p>
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
