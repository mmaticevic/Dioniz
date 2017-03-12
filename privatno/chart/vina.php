<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- head -->
<?php include_once '../../head.php'; ?>
<!-- /head -->
</head>
<body>
<!-- header -->
<?php include_once '../../header.php'; ?>
<!-- /header -->
<!-- Admin panel -->

<section>
		<div class="container">
			<div class="row">
				<?php include_once '../admin/adminleft.php'; ?>


				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->

						<h2 class="title text-center">Vina </h2>
                   <div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>

			</div>
		</div>
</section>

<!-- /Admin panel -->
















<!-- footer -->
<?php include_once '../../footer.php'; ?>
<!-- /footer -->

<!-- script -->
<?php include_once '../../script.php'; ?>
<!-- /script -->


<!--chart-->

<script src="<?php echo $putanja ?>js/highcharts.js"></script>
<script src="<?php echo $putanja ?>js/exporting.js"></script>
<script>
    $(function () {
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Stanje vina na dan <?php echo date("d-m-Y") ?>'
        },
        
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Broj vina'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Količina  vina: <b>{point.y:1f} </b>'
        },
        series: [{
            name: 'Population',
            data: [
                <?php
                $izraz=$veza->prepare("select  sorta_vina as naziv, count(id) as ukupno from vino
group by  naziv;  ");
                $izraz->execute();
                $niz=$izraz->fetchALL(PDO::FETCH_OBJ);
                foreach ($niz as $red) {
                    echo "{name: '" . $red->naziv . "',y: " . $red->ukupno . "}, ";
                }
                
                 ?>

            ],
            dataLabels: {
                enabled: true,
                rotation: -60,
                color: '#439751',
                align: 'right',
                format: '{point.y:1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});


</script>
		
<!--/chart-->
	
</body>
</html>