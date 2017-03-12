<?php

include_once "config.php";
include_once "functions.php";
setlocale(LC_ALL,  'de_DE'); 

if(isset($_POST['pid'])){
    $pid=$_POST['pid'];
    $wasFound=false;
    $i=0;
    
    if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1 ){
        $_SESSION["cart_array"] = array(0=> array("item_id"=> $pid,"quantity"=>1));
    }
    else{
        foreach ($_SESSION["cart_array"] as $each_item){
            $i++;
            while(list($key,$value)=each($each_item)){
                if($key=="item_id" && $value==$pid){
                    
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id"=>$pid,"quantity"=>$each_item['quantity']+1)));
                    $wasFound = true;
                }
            }
        }
        if($wasFound == false){
            array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" =>1));
        } 
    }
    header("location:cart.php");
}


if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart"){
    unset($_SESSION["cart_array"]);
}


if(isset($_POST['item_to_inc']) && $_POST['item_to_inc']!=""){
    $item_to_inc = $_POST['item_to_inc'];
    $i=0;
    foreach ($_SESSION["cart_array"] as $each_item){
            $i++;
            while(list($key,$value)=each($each_item)){
                if($key=="item_id" && $value==$item_to_inc){
                    
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id"=>$item_to_inc,"quantity"=>$each_item['quantity']+1)));
                    $wasFound = true;
                }
            }
        }
}
if(isset($_POST['item_to_dec']) && $_POST['item_to_dec']!="" && $_POST['quant_val']>1){
    $item_to_dec = $_POST['item_to_dec'];
    $i=0;

    foreach ($_SESSION["cart_array"] as $each_item){
            $i++;
            while(list($key,$value)=each($each_item)){
                if($key=="item_id" && $value==$item_to_dec){
                   
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id"=>$item_to_dec,"quantity"=>$each_item['quantity']-1)));
                    $wasFound = true;
                }
            }
        }
}

if(isset($_POST["index_to_remove"]) && $_POST["index_to_remove"]!="" ){
    $key_to_remove = $_POST["index_to_remove"];
    if (count($_SESSION["cart_array"]) <= 1) {
        unset($_SESSION{"cart_array"}); 
    }
    else {
        unset($_SESSION["cart_array"]["$key_to_remove"]); 
        sort($_SESSION["cart_array"]); 
    }
}


$cartOutput = "";
$cart_total="kn";
if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1 ){
    $cartOutput= '<h3>Košarica je prazna</h3>';
}
else{
    $i=0;
    foreach($_SESSION["cart_array"] as $each_item) {
        $item_id = $each_item['item_id'];
        $izraz = $veza->prepare("SELECT * FROM vino WHERE id=:id ");
        $izraz->execute([$item_id]);
        while ($row = $izraz->fetch()) {
            $product_name = $row['sorta_vina'];
            $product_price = $row['cijena'];
        }
        $izraz->execute();
        $quant = $each_item['quantity'];
        $item_total = $product_price*$each_item['quantity'];
        $cart_total = $item_total+$cart_total;
        $cart_total2 = $cart_total + 30;
        $cartOutput .= '
                    
                        
        ';
        $cartOutput .= '                <td>
                            <div>
                                <p><a href="product.php?id=' . $each_item['item_id'] . '">' . ucwords($product_name) .'</a> </p><span class="price">' . money_format('%.2n', $product_price) . '</span>
                            </div>
                        </td>
        ';
        $cartOutput .= '                <td><form action="cart.php" method="post" class="pull-left">
                                <button name="incBtn'.$item_id.'" type="submit" value="increase">
                                <input type="hidden" name="item_to_inc" value="'.$item_id.'"/>+
                                </button>
                            </form>' . $each_item['quantity'] . '
                            <form action="cart.php" method="post" class="pull-right">
                                <button name="decBtn'.$item_id.'" type="submit" value="decrease">
                                <input type="hidden" name="quant_val" value="'.$each_item['quantity'].'"/>
                                <input type="hidden" name="item_to_dec" value="'.$item_id.'"/>-
                                </button>
                            </form>
                        </td>
        ';
        $cartOutput .= '                <td class="price">  ' .  money_format('%.2n', $item_total) . '
                            <form action="cart.php" method="post" class="pull-right">
                                <button name="deleteBtn'.$item_id.'" type="submit">
                                <input type="hidden" name="index_to_remove" value="'.$i.'"/>
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true">
                                </button>
                            </form>
                        </td>
                    </tr>
'; 
        $i++;
    }
}
?>
<!DOCTYPE html>
<htmL>
<head>
  <?php include_once("head.php");  ?>
</head>
<body>
<?php
 
    include_once("header.php"); 
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <table class="table table-hover">
                <thead>
                    <tr class="info"><th>Vino</th><th>Količina</th><th style="text-align:right;">Ukupno</th></tr>
                </thead>
                <tbody><?php echo $cartOutput; ?>
                    <tr>
                    <td colspan="2"></td>
                    <td class="price">Ukupno:</td><td class="price"><?php echo money_format('%.2n', $cart_total); ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="cart.php?cmd=emptycart">Isprazni košaricu</a>
        </div>
        <div class="col-sm-4 col-md-3">
            
            <div class="well well-lg">
                <table class="table" style="border-top:0px;">
                    <tr><td>Iznos košarice:<span class="pull-right price"><?php echo money_format('%.2n', $cart_total); ?></span></td></tr>
                    <tr><td>Trošak dostave:<span class="pull-right"></span>30kn</td></tr>
                  
                    <tr class="info"><td>Ukupno:<span class="pull-right price"><?php echo money_format('%.2n', $cart_total + 30); ?></span></td></tr>
                </table>
                <div class="input-group">
                    
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="button">Nastavi kupnju</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container -->
    <?php include_once("footer.php"); ?>
        <?php include_once("script.php"); ?>
</body>
</html>