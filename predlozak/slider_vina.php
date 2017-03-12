
 
    <div class="col-sm-6">
        <h1><?php echo $vino->sorta_vina . " " . $vino->zapremnina ?>l</h1>

        <h5><?php echo $vino->naziv ?></h5>
        <p><?php echo $vino->opis ?></p>
        <button <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Dodati u košaricu</a></button>
    </div>

    <div class="col-sm-6">
    <?php 
                                    $putanjaslika = $_SERVER["CONTEXT_DOCUMENT_ROOT"] . $putanja."img/vina/". $vino->id . ".jpg";
                
                if(file_exists($putanjaslika)){
                    $alikavina=$putanja . "img/vina/" . $vino->id . ".jpg";
                }
                else{
                    $alikavina=$putanja . "img/vina/nepoznato.jpg";;
                }
                                     ?>
                                        <a href="#">  <img src="<?php echo $alikavina ?>" alt=""></a>

    </div>
