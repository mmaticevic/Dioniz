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
        <h2 class="title text-center">Vinarija</h2>
        <a href="dodaj.php" class="btn btn-success ">Dodaj</a>

        <?php
        
        $poStranici=15;
        
        $izraz = $veza -> prepare("select count(id) from vinarija");
        $izraz -> execute();
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
        

        $izraz = $veza -> prepare("
          select a.id, a.oib, a.naziv, a.adresa,b.naselje, a.telefon, a.fax, a.email, a.ziroracun 
          from vinarija a
          inner join mjesto b on a.mjesto = b.id limit :odKuda, :poStranici;


          ");
        $izraz -> execute(array("odKuda"=>$odKuda,"poStranici"=>$poStranici));
        $niz = $izraz -> fetchAll(PDO::FETCH_OBJ);
        ?>
        <br>
        <table  style="width:95%;  ">
          <tbody >

            <tr >
              <th>ID</th><br>
              
              <th>Naziv</th>   
              <th>Oib</th>
              <th>Mjesto</th><br>
              <th>E-mail</th>
              <th>Brisanje</th>
              <th>Promjena</th>
              


            </tr>
            <br>
            <?php foreach ($niz as $vinarija): ?>
              

              <tr >
                <td><?php echo $vinarija -> id; ?></td>
                
                <td><?php echo $vinarija -> naziv; ?></td>
                <td><?php echo $vinarija -> oib; ?></td>   
                <td><?php echo $vinarija -> naselje; ?></td>
                <td><?php echo $vinarija -> email; ?></td>
                <td><a href="obrisi.php?id=<?php echo $vinarija->id ?>" class="btn btn-danger btn-block "><i class="fa fa-eraser" aria-hidden="true"></i></a></td>
                <td><a href="promjeni.php?id=<?php echo $vinarija->id ?>" class="btn btn-info btn-block "><i class="fa fa-refresh" aria-hidden="true" onclick="return confirm('Želite li raditi promjenu ?')"></i></a></td>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>

        









        
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

</div>
<br><br>

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
<body>
	
</body>
</html>