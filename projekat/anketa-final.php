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
            <div class="column-2-thirds" >
                <h3 style='color:lightblue'>Anketa - problemi mladih</h3>
              <?php
              require_once 'db.php';

            $pdoQuery = 'SELECT * FROM surveys';
            $pdoQuery_run = $pdo->query($pdoQuery);

            if($pdoQuery_run)
            {
                while($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ))
                {
                    echo '
                    <div class="col s6 md3">
                        <div class="card z-depth-0">
                            <div class="card-content center">
                                <h6>'.$row->name.'</h6>
                                <p>'.$row->description.'</p>
                            </div>
                            <div class="card-action right-align">
                                <a class="brand-text" href="anketa_start.php" style="color:lightblue">Zapocnite anketu</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
                
            }
            else
            {
                echo '<script> alert("No Record / Data found") </script>';
            }

              ?> 
    

                    
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