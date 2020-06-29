<?php include_once('sesija.php') ?>
<html lang="en">
<head>
<?php include_once('head.php') ?>
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
          <?php 
          require_once('db.php');
          $upit="SELECT q1, COUNT(*) FROM user_answers GROUP BY q1 ";
          $stmt=$pdo->query($upit);
          while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            echo "['".$row->q1."', 2],";
          }
          ?>
          /* [odg1, 3],
          [odg2, 1],
          [odg3, 1] */
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
	  function drawChart1() {
        var odg1 = "Glasanje na izborima";
        var odg2 = "Ukljucivanje u rad politickih stranaka";
        var odg3 = "Potpisivanje peticije";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          [odg1, 3],
          [odg2, 1],
          [odg3, 1]
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
	  
	  function drawChart2() {
        var odg1 = "Roditelji";
        var odg2 = "Skola";
        var odg3 = "Udruženje mladih";
        var odg4 = "Državne institucije";

        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          [odg1, 3],
          [odg2, 1],
          [odg3, 1],
          [odg4, 5]
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

      function drawChart3() {
        var odg1 = "da";
        var odg2 = "ne";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          [odg1, 3],
          [odg2, 1]
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

      function drawChart4() {
        var odg1 = "PC";
        var odg2 = "Droga";
        var odg3 = "Alkohol";
        var odg4 = "Nesto drugo";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          [odg1, 3],
          [odg2, 1],
          [odg3, 1],
          [odg4, 4]
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
          [odg1, 3],
          [odg2, 1],
          [odg3, 1]
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

      function drawChart6() {
        var odg1 = "Drustvene mreze";
        var odg2 = "Igrice";
        var odg3 = "Trazenje informacija na internetu";
        var odg4 = "Studentski portal";
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          [odg1, 3],
          [odg2, 1],
          [odg3, 1],
          [odg4, 2]
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

      function drawChart7() {
        var odg1 = "Muski";
        var odg2 = "Zenski";
       
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          [odg1, 3],
          [odg2, 1]
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
          [odg1, 3],
          [odg2, 1],
          [odg3, 1]
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
    <div class="container">
        <?php include_once('header.php') ?>
    <div class="row">
        <div class="column">
            <p>
            <?php include_once('nav.php') ?>
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
        <?php include_once('footer.php') ?>
    </div>
</body>
</html>