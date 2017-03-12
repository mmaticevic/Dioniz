<?php
if(isset($_GET['id'])){
    $id = preg_replace('#[^0-9]#i', '',$_GET['id']);
}
else{
    echo "Ne postoji takav proizvod";
    exit();
    $veza = null;
}
include "config.php";
$dynamic_list = "";
    $izraz = $veza->prepare("SELECT  a.id, b.naziv, c.boja, a.sorta_vina, a.zapremnina,a.kvaliteta_vina, a.postotak_alkohola, a.opis, a.godina_berbe, a.cijena, a.slika 
        from vino a 
        inner join vinarija b on a.vinarija = b.id
        inner join boja_vina c on a.boja_vina =c.id 
        wHERE a.id='$id' ");
    $izraz->execute();
    $productCount = $izraz->rowCount();
    if ($productCount > 0) {
        while ($row = $izraz->fetch()) {
            $product_id = $row['id'];
            $naziv = $row['sorta_vina'];
            $product_price = $row['cijena'];
            $vinarija = $row['naziv'];
            $product_subcat = $row['boja'];
            $product_details = $row['godina_berbe'];
            $zapremnina = $row['zapremnina'];
            $product_opis = $row['opis'];
            $slika = $row['slika'];
            $check = $product_details;
            if (strlen(trim($check)) == 0){
                $product_details = "<u>No Details</u>";
            }
            
        }
    }

   
    $veza = null;
?>
<!DOCTYPE html>
<htmL>
<head>
    <?php     include_once("head.php"); ?>
</head>
<body>
<?php 
   
    include_once("header.php"); 
?>
<div class="col-sm-9 padding-right" >
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Opis</h2>
            <div class="col-sm-12 padding-right" >
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5" style="border: solid black 1px">
                        <div class="view-product">
                           
                            <img src="privatno/vina/img/<?php echo $slika ?>" class="img-rounded" width="250px" height="250px" />
                           
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->

                  
                            <h2><?php echo $naziv . ' ' . $zapremnina;?></h2>
                            <p>Godina berbe: <?php echo $product_details; ?></p>
                            <h6 style="font-weight: bold;"><?php echo $vinarija; ?></h6>
                            
                            <p></p>
                            
                            <h5 style="font-family: "Comic Sans MS", cursive, sans-serif "><?php echo $product_opis;?></h5>
                            
                                <h3><?php echo $product_price;?> kn</h3>
                                <div class="container">




                                    <div class="col-lg-2">
                                        <div class="input-group">

                                           
                                        <form id="form1" name="form1" method="post" action="cart.php">
                        <div class="form-group">
                            <input type="hidden" name="pid" id="pid" value="<?php echo $id;?>"/>
                            <input type="submit" class="btn btn-default btn-primary" id="button" value="Dodaj u košaricu">
                        </div>
                    </form>
                                    </span>
                                </div>


                            </div>







                        </span>

                   

                </div><!--/product-information-->
            </div>
        </div>


</div>
    
    <!-- /.container -->
  <?php include_once"footer.php"; ?>
       <?php include_once"script.php"; ?>
</body>
</html>