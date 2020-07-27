<?php include_once('components/sesija.php') ?>
<html lang="en">
<head>
<?php include_once('components/head.php') ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	     google.charts.setOnLoadCallback(drawChart1); 
	  google.charts.setOnLoadCallback(drawChart2);
	  google.charts.setOnLoadCallback(drawChart3);
	  google.charts.setOnLoadCallback(drawChart4);
	  google.charts.setOnLoadCallback(drawChart5);
	  google.charts.setOnLoadCallback(drawChart6);
       google.charts.setOnLoadCallback(drawChart7);
       google.charts.setOnLoadCallback(drawChart8);  
      


      function drawChart() {
        var odg1 = "Veća uključenost mladih u društveno - politički život;";
        var odg2 = "Osigurati učestvovanje mladih u procesu odlučivanja na svim nivoima / javne rasprave, okrugli stolovi, učestalija i kvalitetnija komunikacija vlasti sa mladima";
        var odg3 = "Osigurati kvalitetno obrazovanje u skladu sa zahtevima tržišta i potrebama društva";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');

        data.addRows([
          <?php require_once('db.php');

$stmt1 = "SELECT * FROM answers";
$res1 = $pdo->query($stmt1);
while ($row1=$res1->fetch(PDO::FETCH_OBJ)) {
  $ans[]=$row1;
}

          $stmt = "SELECT * FROM user_answers";
          $res = $pdo->query($stmt);
          $number = 0;
          $number1= 0;
          while($row= $res->fetch(PDO::FETCH_OBJ)){
            /* die(var_dump($row)); */
            $userAns[]=$row;
          }
          for($i=0; $i<count($userAns); $i++){
            if((substr($ans[1]->content, 0, 9) == $userAns[$i]->q1) or (substr($ans[1]->content, 0, 9) == substr($userAns[$i]->q1, 6, 9) )){
              $number = $number + 1;
            } 
            elseif(substr($ans[1]->content, 0, 9) == substr($userAns[$i]->q1, 6, 9)) {
              $number1 = $number1 + 1;
            }
            else {
              $number1 = $number1 + 1;
            }
          }

          
          
           echo " ['Veća uključenost mladih u društveno - politički život;', ".$number1."],
          ['Osigurati učestvovanje mladih u procesu odlučivanja na svim nivoima / javne rasprave, okrugli stolovi, učestalija i kvalitetnija komunikacija vlasti sa mladima', ".$number."],
          ['Osigurati kvalitetno obrazovanje u skladu sa zahtevima tržišta i potrebama društva', ".$number."]" 
          ?>
          /* [odg1, 7],
          [odg2, 4],
          [odg3, 2] */ 
        ]);


        var options = {
          'title' : '1. Šta smatraš da bi trebalo učiniti da se problemi mladih počnu delotvornije rešavati?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));


        chart.draw(data, options);
	
      }

      
  
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	   function drawChart1() {
        var odg1 = "Glasanje na izborima";
        var odg2 = "Ukljucivanje u rad politickih stranaka";
        var odg3 = "Potpisivanje peticije";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          
          <?php require_once('db.php');

$stmt1 = "SELECT * FROM answers";
$res1 = $pdo->query($stmt1);
while ($row1=$res1->fetch(PDO::FETCH_OBJ)) {
  $ans[]=$row1;
}

          $stmt = "SELECT * FROM user_answers";
          $res = $pdo->query($stmt);
          $number = 0;
          $number1= 0;
          $number2= 0;
          while($row= $res->fetch(PDO::FETCH_OBJ)){
           
            $userAns[]=$row;
          }
          for($i=0; $i<count($userAns); $i++){

             if(substr($ans[3]->content, 0, 8) == substr($userAns[$i]->q2, 0, 8)){
              $number = $number + 1;
            } 
            elseif((substr($ans[4]->content, 0, 12) == substr($userAns[$i]->q2, 0, 12)) or (substr($ans[4]->content, 0, 12) == substr($userAns[$i]->q2, 9, 12) )) {
              $number1 = $number1 + 1;
            }
            else {
              $number2 = $number2 + 1;
            } 
          }

          
          
           echo " ['Glasanje na izborima', ".$number."],
          ['Ukljucivanje u rad politickih stranaka', ".$number1."],
          ['Potpisivanje peticije', ".$number2."]" 
          ?> 
        ]);

        var options = {
          'title' : '2. U kojoj si od navedenih aktivnosti spreman/a delovati u cilju rešavanja problema?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));


        chart.draw(data, options);
	
      } 

      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  
	  function drawChart2() {
        var odg1 = "Roditelji";
        var odg2 = "Skola";
        var odg3 = "Udruženje mladih";
        var odg4 = "Državne institucije";

        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');

$stmt1 = "SELECT * FROM answers";
$res1 = $pdo->query($stmt1);
while ($row1=$res1->fetch(PDO::FETCH_OBJ)) {
  $ans[]=$row1;
}

          $stmt = "SELECT * FROM user_answers";
          $res = $pdo->query($stmt);
          $number = 0;
          $number1= 0;
          $number2= 0;
          $number3= 0;
          while($row= $res->fetch(PDO::FETCH_OBJ)){
           
            $userAns[]=$row;
          }
          for($i=0; $i<count($userAns); $i++){

             if(substr($ans[7]->content, 0, 9) == substr($userAns[$i]->q3, 0, 9)){
              $number = $number + 1;
            } elseif(substr($ans[8]->content, 0, 5) == substr($userAns[$i]->q3, 0, 5)){
              $number1 = $number1 + 1;
            } elseif(substr($ans[9]->content, 0, 9) == substr($userAns[$i]->q3, 0, 9)){
              $number2 = $number2 + 1;
            } else {
              $number3 = $number3 + 1;
            }
              
            }
            

          
          
           echo " ['Roditelji', ".$number."],
          ['Skola', ".$number1."],
          ['Udruzenje mladih', ".$number2."],
          ['Drzavne institucije', ".$number3."]" 
          ?> 
        ]);

        var options = {
          'title' : '3. Ko je, prema tvom mišljenju, najodgovorniji za rešavanje problema mladih u društvu?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
     
	
      }

      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      function drawChart3() {
        var odg1 = "da";
        var odg2 = "ne";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');

$stmt11 = "SELECT * FROM answers";
$res11 = $pdo->query($stmt11);
while ($row11=$res11->fetch(PDO::FETCH_OBJ)) {
  $ans1[]=$row11;
}

          $stmt1 = "SELECT * FROM user_answers";
          $res1 = $pdo->query($stmt1);
          $number = 0;
          $number1= 0;

          while($row1= $res1->fetch(PDO::FETCH_OBJ)){
            $userAns1[]=$row1;
             
          }

          for($i=0; $i<count($userAns1); $i++){
            if($ans1[11]->content == $userAns1[$i]->q5){
              $number = $number + 1;
            }
            else {
              $number1 = $number1 + 1;
            }
          }
          echo " ['Da', ".$number."],
          ['Ne', ".$number1."]";

          
          ?>
        ]);

        var options = {
          'title' : '5. Da li smatrate da mladi učešćem u političkom životu mogu biti jedan od uzroka promena u Republici Srbiji?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
     
	
      }

      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      function drawChart4() {
        var odg1 = "PC";
        var odg2 = "Droga";
        var odg3 = "Alkohol";
        var odg4 = "Nesto drugo";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');

$stmt12 = "SELECT * FROM answers";
$res12 = $pdo->query($stmt12);
while ($row12=$res12->fetch(PDO::FETCH_OBJ)) {
  $ans2[]=$row12;
}

          $stmt = "SELECT * FROM user_answers";
          $res = $pdo->query($stmt);
          $num = 0;
          $num1= 0;
          $num2= 0;
          $num3= 0;
          while($row= $res->fetch(PDO::FETCH_OBJ)){
           
            $userAns2[]=$row;
          }
          for($i=0; $i<count($userAns2); $i++){

             if($ans2[13]->content == substr($userAns2[$i]->q6, 0, 2)){
              $num = $num + 1;
            } 
            elseif(($ans2[14]->content == substr($userAns2[$i]->q6, 0, 5)) or ($ans2[14]->content == substr($userAns2[$i]->q6, 3, 5) )) {
              $num1 = $num1 + 1;
            }
            elseif(($ans2[15]->content == substr($userAns2[$i]->q6, 0, 7)) or ($ans2[15]->content == substr($userAns2[$i]->q6, 3, 7)) or ($ans2[15]->content == substr($userAns2[$i]->q6, 9, 7))){
              $num2 = $num2 + 1;
            }
            else {
              $num3 = $num3 + 1;
            } 
          }

          
          
           echo " ['PC', ".$num."],
          ['Droga', ".$num1."],
          ['Alkohol', ".$num2."],
          ['Nesto drugo', ".$num3."]" 
          ?> 
        ]);

        var options = {
          'title' : '6. Koje su po vama najčešći uzroci što se mladi sve manje bave sportom?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
     
	
      }

      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      function drawChart5() {
        var odg1 = "Neznanje";
        var odg2 = "Besposlica";
        var odg3 = "Nasilje";
        var odg4 = "Narkomanija";
        var odg5 = "Nesto drugo";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');
$stmt1 = "SELECT * FROM answers";
$res1 = $pdo->query($stmt1);
while ($row1=$res1->fetch(PDO::FETCH_OBJ)) {
  $ans3[]=$row1;
}
          $stmt = "SELECT * FROM user_answers";
          $res = $pdo->query($stmt);
          $num = 0;
          $num1= 0;
          $num2= 0;
          $num3= 0;
          $num4= 0;
          while($row= $res->fetch(PDO::FETCH_OBJ)){
           
            $userAns3[]=$row;
          }
          for($i=0; $i<count($userAns3); $i++){

             if($ans3[17]->content == $userAns3[$i]->q7){
              $num = $num + 1;
            } 
            elseif($ans3[18]->content == $userAns3[$i]->q7) {
              $num1 = $num1 + 1;
            }
            elseif($ans3[19]->content == $userAns3[$i]->q7){
              $num2 = $num2 + 1;
            }
            elseif($ans3[20]->content == $userAns3[$i]->q7){
              $num3 = $num3 + 1;
            }
            else {
              $num4 = $num4 + 1;
            } 
          }
           echo " ['Neznanje', ".$num."],
          ['Besposlica', ".$num1."],
          ['Nasilje', ".$num2."],
          ['Narkomanija', ".$num3."],
          ['Nesto drugo', ".$num4."]" 
          ?> 
        ]);

        var options = {
          'title' : '7. Najveci problem sa kojim se suocavaju mladi?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

        chart.draw(data, options);
     
	
      }

      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      function drawChart6() {
        var odg1 = "Drustvene mreze";
        var odg2 = "Igrice";
        var odg3 = "Trazenje informacija na internetu";
        var odg4 = "Studentski portal";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');
$stmt1 = "SELECT * FROM answers";
$res1 = $pdo->query($stmt1);
while ($row1=$res1->fetch(PDO::FETCH_OBJ)) {
  $ans4[]=$row1;
}
          $stmt = "SELECT * FROM user_answers";
          $res = $pdo->query($stmt);
          $num = 0;
          $num1= 0;
          $num2= 0;
          $num3= 0;
          while($row= $res->fetch(PDO::FETCH_OBJ)){
           
            $userAns4[]=$row;
          }
          for($i=0; $i<count($userAns4); $i++){

             if(substr($ans4[22]->content, 0, 9) == substr($userAns4[$i]->q8, 0, 9)){
               if(substr($ans4[23]->content, 0, 6) == substr($userAns4[$i]->q8, 10, 6)){
                 if(substr($ans4[24]->content, 0, 8) == substr($userAns4[$i]->q8, 17, 8)){
                   if(substr($ans4[25]->content, 0, 10) == substr($userAns4[$i]->q8, 26, 10)){
                    $num3 = $num3 + 1;
                   }
                  $num2 = $num2 + 1;
                 }
                $num1 = $num1 + 1;
               }
              $num = $num + 1;
            } 
            elseif(substr($ans4[23]->content, 0, 6) == substr($userAns4[$i]->q8, 0, 6)) {
              if(substr($ans4[24]->content, 0, 8) == substr($userAns4[$i]->q8, 7, 8)){
                if(substr($ans4[25]->content, 0, 10) == substr($userAns4[$i]->q8, 16, 10)){
                  $num3 = $num3 + 1;
                }
                $num2 = $num2 + 1;
              }
              $num1 = $num1 + 1;
            }
            elseif(substr($ans4[24]->content, 0, 8) == substr($userAns4[$i]->q8, 0, 8)){
              if(substr($ans4[25]->content, 0, 10) == substr($userAns4[$i]->q8, 9, 10)){
                $num3 = $num3 + 1;
              }
              $num2 = $num2 + 1;
            }
            else {
              $num3 = $num3 + 1;
            } 
          }
           echo " ['Drustvene mreze', ".$num."],
          ['Igrice', ".$num1."],
          ['Trazenje informacija na internetu', ".$num2."],
          ['Studentski portal', ".$num3."]" 
          ?>
        ]);

        var options = {
          'title' : '8. Označite polja ispred aktivnosti zbog kojih najviše koristite računare.',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart6'));

        chart.draw(data, options);
     
	
      }

      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      function drawChart7() {
        var odg1 = "Muski";
        var odg2 = "Zenski";
       
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');

$stmt11 = "SELECT * FROM answers";
$res11 = $pdo->query($stmt11);
while ($row11=$res11->fetch(PDO::FETCH_OBJ)) {
  $ans15[]=$row11;
}

          $stmt1 = "SELECT * FROM user_answers";
          $res1 = $pdo->query($stmt1);
          $number = 0;
          $number1= 0;

          while($row1= $res1->fetch(PDO::FETCH_OBJ)){
            $userAns15[]=$row1;
             
          }

          for($i=0; $i<count($userAns15); $i++){
            if($ans15[26]->content == $userAns15[$i]->q9){
              $number = $number + 1;
            }
            else {
              $number1 = $number1 + 1;
            }
          }
          echo " ['Muski', ".$number."],
          ['Zenski', ".$number1."]";

          
          ?>
        ]);

        var options = {
          'title' : '9. Pol?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart7'));

        chart.draw(data, options);
     
	
      }

      function drawChart8() {
        var odg1 = "15-19";
        var odg2 = "20-24";
        var odg3 = "25-30";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php require_once('db.php');

$stmt11 = "SELECT * FROM answers";
$res11 = $pdo->query($stmt11);
while ($row11=$res11->fetch(PDO::FETCH_OBJ)) {
  $ans16[]=$row11;
}

          $stmt1 = "SELECT * FROM user_answers";
          $res1 = $pdo->query($stmt1);
          $number = 0;
          $number1= 0;
          $number2= 0;

          while($row1= $res1->fetch(PDO::FETCH_OBJ)){
            $userAns16[]=$row1;
             
          }

          for($i=0; $i<count($userAns16); $i++){
            if($ans16[28]->content == $userAns16[$i]->q10){
              $number = $number + 1;
            }
            elseif($ans16[29]->content == $userAns16[$i]->q10){
              $number1 = $number1 + 1;
            }
            else {
              $number2 = $number2 + 1;
            }
          }
          echo " ['15-19', ".$number."],
          ['20-24', ".$number1."],
          ['25-30', ".$number2."]";

          
          ?>
        ]);

        var options = {
          'title' : '10. Godine starosti?',
          'width' : 550,
          'height': 300,
          'is3D': true
        };
		
        var chart = new google.visualization.PieChart(document.getElementById('piechart8'));

        chart.draw(data, options);
     
	
      }
	  
      </script>
</head>

<body>
    <div class="container-fluid">
        <?php include_once('components/header.php') ?>
    <div class="row">
        <div class="column">
            <p>
            <?php include_once('components/nav.php') ?>
            </p>
        </div>
        <div class="column-2-thirds">
            <h4 style="text-align: center">Prikaz rezultata ankete preko grafikona:</h4>
            <div class="container" style="margin-bottom: 20px; margin-top: 50px">
                <div id="piechart" style="width:400; height:300"></div> 
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart1" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart2" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart3" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart4" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart5" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart6" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart7" style="width:400; height:300"></div>
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div id="piechart8" style="width:400; height:300"></div>
            </div>
        </div>
        <?php include_once('components/footer.php') ?>
    </div>
</body>
</html>