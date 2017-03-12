<?php poljavino("text","sorta_vina","Sorta vina",$poruka); ?>
							<!-- Vinarija-->
							<tr>
    	<td><label class="control-label">Vinarija</label></td>
        <td><select name="vinarija" id="vinarija" placeholder="Vinarija" >
								<option value="0" >Vinarija</option>
								<option>------------------------------------------------</option>

								<?php

								$izraz = $veza -> prepare("SELECT * FROM vinarija order by naziv");
								$izraz -> execute();
								$rezultat = $izraz -> fetchAll(PDO::FETCH_OBJ);
								foreach ($rezultat as $vinarija) : ?>

								<option
								 <?php if(isset($_POST["vinarija"]) && $_POST["vinarija"]==$vinarija->id){
									echo " selected=\"selected\" ";
								} 
								?>  value="<?php echo $vinarija->id; ?>"><?php echo $vinarija->naziv; ?>
									
								</option>

							<?php endforeach; ?>						
												
							

						</select>



       
    </tr>
						
						<?php if (isset($poruka["vinarija"])): ?>
							<p class="alert alert-success" id="vinarija"><?php echo $poruka["vinarija"] ?></p>
						<?php  endif; ?>
						<!-- /Vinarija-->



						<!--Boja vina -->

						<label class="control-label">Boja vina:</label>

						<select name="boja_vina" id="boja_vina" placeholder="Boja vina" >
							<option value="0" >Boja vina</option>
							<option>------------------------------------------------</option>

							<?php
							$izraz = $veza -> prepare("SELECT * FROM boja_vina order by boja");
							$izraz -> execute();
							$rezultat = $izraz -> fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultat as $boja_vina) : ?>

							<option
							<?php if(isset($_POST["boja_vina"]) && $_POST["boja_vina"]==$boja_vina->id){
								echo " selected=\"selected\" ";
							} ?>

							value="<?php echo $boja_vina->id; ?>"><?php echo $boja_vina->boja; ?>
								
							</option>

						<?php endforeach; ?>						

					</select>
					
					<?php if (isset($poruka["boja_vina"])): ?>
						<p class="alert alert-success" id="boja_vina"><?php echo $poruka["boja_vina"]; ?></p>
					<?php  endif; ?>

					<!-- /Boja vina -->

					<?php  
					poljavino("text","kvaliteta_vina","Kvaliteta",$poruka);
					poljavino("decimal","zapremnina","Zapremnina",$poruka);
					poljavino("decimal","postotak_alkohola","Postotak alkohola",$poruka);
					
					poljavino("number","godina_berbe","Godina berbe",$poruka);
					poljavino("text","opis","Opis",$poruka);

					poljavino("decimal","stanje_skladista","Stanje na skladištu",$poruka);

					
					poljavino("decimal","cijena","Cijena",$poruka);
					?>
					
      
        
        
        
        
   