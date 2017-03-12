<?php include_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head.php'; ?>

</head>
<body>

<?php include_once 'header.php'; ?>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>







<?php include_once 'footer.php'; ?>

<?php include_once 'script.php'; ?>

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
</body>	
</html>




script src="<?php echo $putanja ?>js/highcharts.js"></script>
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
        
        <div id="container" style="min-width: 10%; height: 300px; margin: 0 auto"></div>