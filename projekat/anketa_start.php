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

        <?php
            require_once('db.php');

            
            
            $pdoQuery = 'SELECT * FROM questions';
            $pdoQuery_run = $pdo->query($pdoQuery);

            $pdoQuery1 = 'SELECT * FROM answers';
            $pdoQuery1_run = $pdo->query($pdoQuery1);

            while($row1 = $pdoQuery1_run->fetch(PDO::FETCH_OBJ)){
                $ans[]=$row1;
            }
            while($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ) ){
                $que[]=$row;
            }
        ?>
        <form method="POST">
        <div class="container">
            <?php echo '<p>'.$que[0]->id.'. '.$que[0]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="aa[]" type=<?php echo $que[0]->type ?> value=<?php echo $ans[0]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;"/><?php echo $ans[0]->content;?></li><hr style='background-color: white'>
                <li><input name="aa[]" type=<?php echo $que[0]->type ?> value=<?php echo $ans[1]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[1]->content;?></li><hr style='background-color: white'>
                <li><input name="aa[]" type=<?php echo $que[0]->type ?> value=<?php echo $ans[2]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[2]->content;?></li>
            </ul>
        </div>
        <div class="container">
        <?php echo '<p>'.$que[1]->id.'. '.$que[1]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="ab[]" type=<?php echo $que[1]->type ?> value=<?php echo $ans[3]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[3]->content;?></li><hr style='background-color: white'>
                <li><input name="ab[]" type=<?php echo $que[1]->type ?> value=<?php echo $ans[4]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[4]->content;?></li><hr style='background-color: white'>
                <li><input name="ab[]" type=<?php echo $que[1]->type ?> value=<?php echo $ans[5]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[5]->content;?></li>
            </ul>
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[2]->id.'. '.$que[2]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="que3" type=<?php echo $que[2]->type ?> value=<?php echo $ans[7]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" checked/><?php echo $ans[7]->content;?></li><hr style='background-color: white'>
                <li><input name="que3" type=<?php echo $que[2]->type ?> value=<?php echo $ans[8]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[8]->content;?></li><hr style='background-color: white'>
                <li><input name="que3" type=<?php echo $que[2]->type ?> value=<?php echo $ans[9]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[9]->content;?></li><hr style='background-color: white'>
                <li><input name="que3" type=<?php echo $que[2]->type ?> value=<?php echo $ans[10]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[10]->content;?></li>
            </ul>
        </div>
        <div class="container">
        <?php echo '<p>'.$que[3]->id.'. '.$que[3]->content.' </p> ';?>
        <input name="que4" class="form-control" style="margin-bottom: 20px;" type=<?php echo $que[3]->type ?> placeholder="  Unesite text..." required/> <!-- ovde mora value da se sredi -->
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[4]->id.'. '.$que[4]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="que5" type=<?php echo $que[4]->type ?> value=<?php echo $ans[11]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" checked/><?php echo $ans[11]->content;?></li><hr style='background-color: white'>
                <li><input name="que5" type=<?php echo $que[4]->type ?> value=<?php echo $ans[12]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[12]->content;?></li>
            </ul>
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[5]->id.'. '.$que[5]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="ac[]" type=<?php echo $que[5]->type ?> value=<?php echo $ans[13]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[13]->content;?></li><hr style='background-color: white'>
                <li><input name="ac[]" type=<?php echo $que[5]->type ?> value=<?php echo $ans[14]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[14]->content;?></li><hr style='background-color: white'>
                <li><input name="ac[]" type=<?php echo $que[5]->type ?> value=<?php echo $ans[15]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[15]->content;?></li><hr style='background-color: white'>
                <li><input name="ac[]" type=<?php echo $que[5]->type ?> value=<?php echo $ans[16]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[16]->content;?></li>
            </ul>
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[6]->id.'. '.$que[6]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="que6" type=<?php echo $que[6]->type ?> value=<?php echo $ans[17]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" checked/><?php echo $ans[17]->content;?></li><hr style='background-color: white'>
                <li><input name="que6" type=<?php echo $que[6]->type ?> value=<?php echo $ans[18]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;"  /><?php echo $ans[18]->content;?></li><hr style='background-color: white'>
                <li><input name="que6" type=<?php echo $que[6]->type ?> value=<?php echo $ans[19]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;"  /><?php echo $ans[19]->content;?></li><hr style='background-color: white'>
                <li><input name="que6" type=<?php echo $que[6]->type ?> value=<?php echo $ans[20]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;"  /><?php echo $ans[20]->content;?></li><hr style='background-color: white'>
                <li><input name="que6" type=<?php echo $que[6]->type ?> value=<?php echo $ans[21]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;"  /><?php echo $ans[21]->content;?></li>
            </ul>
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[7]->id.'. '.$que[7]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="ad[]" type=<?php echo $que[7]->type ?> value=<?php echo $ans[22]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[22]->content;?></li><hr style='background-color: white'>
                <li><input name="ad[]" type=<?php echo $que[7]->type ?> value=<?php echo $ans[23]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[23]->content;?></li><hr style='background-color: white'>
                <li><input name="ad[]" type=<?php echo $que[7]->type ?> value=<?php echo $ans[24]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[24]->content;?></li><hr style='background-color: white'>
                <li><input name="ad[]" type=<?php echo $que[7]->type ?> value=<?php echo $ans[25]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[25]->content;?></li>
            </ul>
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[8]->id.'. '.$que[8]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="que8" type=<?php echo $que[8]->type ?> value=<?php echo $ans[26]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" checked/><?php echo $ans[26]->content;?></li><hr style='background-color: white'>
                <li><input name="que8" type=<?php echo $que[8]->type ?> value=<?php echo $ans[27]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[27]->content;?></li>
            </ul>
        </div>
        <div class="container" >
        <?php echo '<p>'.$que[9]->id.'. '.$que[9]->content.' </p> ';?>
            <ul style="list-style-type:none;">
                <li><input name="que9" type=<?php echo $que[9]->type ?> value=<?php echo $ans[28]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" checked/><?php echo $ans[28]->content;?></li><hr style='background-color: white'>
                <li><input name="que9" type=<?php echo $que[9]->type ?> value=<?php echo $ans[29]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[29]->content;?></li><hr style='background-color: white'>
                <li><input name="que9" type=<?php echo $que[9]->type ?> value=<?php echo $ans[30]->content ?> style="margin-right: 20px; font-family:cursive; font-size: 30px;" /><?php echo $ans[30]->content;?></li>
            </ul>
        </div>
        <div style="text-align:center">
        
        <input type="submit" name="sacuvaj" value="Sacuvaj" style="width: 200px; height: 40px; margin: 0px 0px 0px 0px; font-size: 27px; background-color:#495057; color: white; pading: 5px 5px;" onclick="window.location.reload();" >
        </div>
    </div>
    </form>
    </div>
    <?php include_once('footer.php');  ?>
    </div>
    
</body>
</html>

<?php

$upit = "SELECT * FROM users WHERE id = '{$_SESSION['user_id']}' ";
                $result = $pdo->query($upit);
                $row2= $result->fetch(PDO::FETCH_OBJ);


 
 
             if(isset($_POST['sacuvaj'])){
                $aa = $_POST['aa'];
                $aa = implode(",",$aa);
                
                $ab = $_POST['ab'];
                $ab = implode(",",$ab);
                
                $ac = $_POST['ac'];
                $ac = implode(",",$ac);
                
                $ad = $_POST['ad'];
                $ad = implode(",",$ad);
                
                if($row2->award != 'jeste')
                {
                    $insert = "INSERT INTO user_answers (username, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10)
                                    VALUES ('{$_SESSION['user_id']}','{$aa}', '{$ab}', '{$_POST['que3']}', '{$_POST['que4']}', '{$_POST['que5']}', '{$ac}', '{$_POST['que6']}', '{$ad}', '{$_POST['que8']}', '{$_POST['que9']}')";
                $stmt=$pdo->prepare($insert);
                $rezultat = $stmt->execute();
                    if ($rezultat) {
                    /* $success_message = 'Uspešno ste popunili anketu!'; */
                    $update= "UPDATE users SET award = 'jeste' WHERE id = '{$_SESSION['user_id']}' ";
                    $stmt1=$pdo->prepare($update);
                    $resultat1=$stmt1->execute();
                    
                    echo "<script type='text/javascript'>alert('Uspesno ste popunili anketu');</script>";
                    }
                    else {
                        if ($stmt->errorCode() == 23000) {
                        $error_message = 'Greška!';
                    } else {
                        die(var_dump($stmt->errorInfo()));
                        $error_message = 'Greška! Pokušajte ponovo.';
                        }
                }
                }
                else 
                {
                    echo "<script type='text/javascript'>alert('Vec ste popunili anketu');</script>";
                };

                $upit2="SELECT * FROM user_answers WHERE username = '{$_SESSION['user_id']}' ";
                $res = $pdo->query($upit2);
            while( $res1=$res->fetch(PDO::FETCH_OBJ)){
                $res11[]=$res1;
            };


            /* var_dump(    $res11[0]->q9 == $ans[26]->content $res11[0]->q2  == substr($ans[4]->content, 0, 12)  ); */
                
                if(( /* $res11[0]->q1 == substr($ans[0]->content, 0, 4) */  $res11[0]->q2 == substr( $ans[3]->content, 0 , 8) and $res11[0]->q3 == $ans[7]->content and $res11[0]->q5 == $ans[11]->content and $res11[0]->q6 == $ans[13]->content and $res11[0]->q7 == $ans[17]->content and $res11[0]->q8 == substr($ans[22]->content, 0, 9)  and $res11[0]->q9 == $ans[26]->content and $res11[0]->q10 == $ans[28]->content)
                or (/* $res11[0]->q1 == substr($ans[1]->content, 0, 9)  and */ $res11[0]->q2 == substr($ans[4]->content, 0, 12)  and $res11[0]->q3 == $ans[8]->content and $res11[0]->q5 == $ans[12]->content and $res11[0]->q6 == $ans[14]->content and $res11[0]->q7 == $ans[18]->content and $res11[0]->q8 == $ans[23]->content and $res11[0]->q9 == $ans[27]->content and $res11[0]->q10 == $ans[29]->content) ){
                    $upit1 = "DELETE FROM user_answers WHERE username='{$_SESSION['user_id']}'";
                    $stmt2= $pdo->prepare($upit1);
                    $stmt2->execute();

                    $update= "UPDATE users SET award = 'nije' WHERE id = '{$_SESSION['user_id']}' ";
                    $stmt1=$pdo->prepare($update);
                    $resultat1=$stmt1->execute();

                    echo "<script type='text/javascript'>alert('Anketa nije validna i bice automatski obrisana!');</script>";
                }
                else {
                    echo "<script type='text/javascript'>alert('Anketa je validna');</script>";

                }
 
                
            } 

?>