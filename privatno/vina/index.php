<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}
$pretraga="";
if(isset($_GET["pretraga"])){
  $pretraga="%" . $_GET["pretraga"] . "%";
}else {
  $pretraga="%";
}

$poStranici=20;

$izraz = $veza -> prepare("
   SELECT count(a.id) from vino a
              inner join vinarija b on a.vinarija = b.id
              inner join boja_vina c on a.boja_vina =c.id

              where concat(b.naziv, c.boja, a.sorta_vina, a.zapremnina,a.kvaliteta_vina,a.stanje_skladista, a.postotak_alkohola, a.godina_berbe, a.cijena) like :pretraga
  ");  
$izraz -> execute(array("pretraga"=>$pretraga));
$ukupno = $izraz->fetchColumn();

$ukupnoStranica=ceil($ukupno/$poStranici);



if(isset($_GET["stranica"])){
  $stranica=$_GET["stranica"];
}else{
  $stranica=1;
}

if($stranica>$ukupnoStranica){
  $stranica=1;
}

if($stranica==0){
  $stranica=$ukupnoStranica;
}

$odKuda = $stranica*$poStranici-$poStranici;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- head -->
  <?php include_once '../../head.php'; ?>
  <!-- /head -->
</head>
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
              <h2 class="title text-center">Vina</h2>
              <div class="search_box pull-right">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                  <input value="<?php echo str_replace("%","", $pretraga); ?>" type="text" id="pretraga" name="pretraga" placeholder="Pretraga"/>
              </form>
          </div>
          <a href="dodaj.php" class="btn btn-success ">Dodaj<a><br><hr>
            <?php



            $izraz = $veza -> prepare("
              SELECT  a.id, b.naziv, c.boja, a.sorta_vina, a.zapremnina,a.kvaliteta_vina,a.stanje_skladista, a.postotak_alkohola, a.godina_berbe, a.cijena 
              from vino a 
              inner join vinarija b on a.vinarija = b.id
              inner join boja_vina c on a.boja_vina =c.id

              where concat(b.naziv, c.boja, a.sorta_vina, a.zapremnina,a.kvaliteta_vina,a.stanje_skladista, a.postotak_alkohola, a.godina_berbe, a.cijena) like :pretraga
              order by a.id limit :odKuda,:poStranici;  ");


            $izraz -> execute(array("pretraga"=>$pretraga, "odKuda"=>$odKuda,"poStranici"=>$poStranici));
            $niz = $izraz -> fetchAll(PDO::FETCH_OBJ);
              ?>



             <table  style="width:100%;  ">
          <tbody >

            <tr >
              <th>RB</th><br> 
              <th>Vino</th>             
              <th>Vinarija</th>   
              <th>Boja vina</th>
              <th>Kvaliteta</th><br>
              <th>Zapremnina</th>
           
              <th>Cijena</th>
              


            </tr>
            <br>
            <?php foreach ($niz as $vino): ?>
              
            <tr >
                <td><?php echo $vino -> id; ?></td>
                <td><?php echo $vino ->  sorta_vina; ?></td>
                <td><?php echo $vino -> naziv; ?></td>
                <td><?php echo $vino -> boja; ?></td> 
                
                <td><?php echo $vino -> kvaliteta_vina; ?></td>
                <td><?php echo $vino -> zapremnina; ?></td>
              
                <td><?php echo $vino -> cijena; ?></td>
                <td><a href="brisanje.php?id=<?php echo $vino->id ?>" class="btn btn-danger btn-block "><i class="fa fa-eraser" aria-hidden="true"></i></a></td>
                <td><a href="promjena.php?id=<?php echo $vino->id ?>"  class="btn btn-info btn-block " onclick="return confirm('Želite li raditi promjenu ?')"><i class="fa fa-refresh" aria-hidden="true"></i></a></td>

                <!-- Trigger the modal with a button -->


  
  
                
       
              </tr>
             

          <?php endforeach; ?>
          </tbody>
        </table>

          

      </div>
      <!--Pagination-->
      <div class="pagination-area" style="text-align: center;">
         <ul class="pagination">
           <li><a href="<?php echo "?stranica=" . ($stranica-1) ?>"><i class="fa fa-angle-double-left"></i></a></li>


       </li>
       <?php 


       for($i=1;$i<=$ukupnoStranica;$i++):
        if($i==$stranica):
          ?>
      <li><a href="?stranica=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endif; ?>
<?php  endfor; ?>



<li><a href="<?php echo "?stranica=" . ($stranica+1) ?>"><i class="fa fa-angle-double-right"></i></a></li>
</ul>
</div>	
<!--/Paginaion-->
</div>




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="slika.php" enctype="multipart/form-data">
      <label>Slika
        <input type="file" required="required" name="slika"/>
        </label>
        
        <input type="hiden" id="id" name="id" />
        
        <input class="expanded button" type="submit" name="autorizacija" value="Postavi" />
        
        
    </form>
  
      </div>
      
    </div>
  </div>




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
<script>
      $("#uvjet").focus();
      
      
      $(".postaviSliku").click(function(){
        $("#id").val($(this).attr("id").split("_")[1]);
        $("#slikaModal").foundation("open");
        
        
        
        return false;
      });
      
    </script>
<body>
	
</body>
</html>