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

						<h2 class="title text-center">Vinarija </h2>
                    <div id="container" style="min-width: 10%; height: 300px; margin: 0 auto"></div>

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

    $(document).ready(function () {

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Udio vina po vinarijama'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Postotak vina',
                colorByPoint: true,
                data: [
                
                <?php
                $izraz=$veza->prepare("select a.id, a.naziv, count(b.vinarija) as ukupno
                                        from vinarija a
                                        inner join vino b on a.id = b.vinarija
                                        group by a.id, a.naziv order by 3 desc limit 100");
                $izraz->execute();
                $niz=$izraz->fetchALL(PDO::FETCH_OBJ);
                foreach ($niz as $red) {
                    echo "{name: '" . $red->naziv . "',y: " . $red->ukupno . "}, ";
                }
                
                 ?>
                
               
                ]
            }]
        });
    });
});
        </script>
		
<!--/chart-->
	
</body>
</html>