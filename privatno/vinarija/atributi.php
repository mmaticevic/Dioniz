<?php 
									poljavinarija("text","oib","oib",$poruka);
									poljavinarija("text","naziv","naziv",$poruka);
									poljavinarija("text","adresa","adresa",$poruka);

								 ?>
								

								<label >Mjesto</label>

						<select name="mjesto" id="mjesto" placeholder="Mjesto" >
							<option value="0" >Mjesto</option>
							<option>------------------------------------------------</option>

							<?php
							$izraz = $veza -> prepare("SELECT * FROM mjesto");
							$izraz -> execute();
							$rezultat = $izraz -> fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultat as $mjesto) : ?>

							<option
							<?php if(isset($_POST["mjesto"]) && $_POST["mjesto"]==$mjesto->id){
								echo " selected=\"selected\" ";
							} ?>

							value="<?php echo $mjesto -> id; ?>"><?php echo $mjesto -> naselje; ?></option>

						<?php endforeach; 



						?>

					</select>
					<?php if (isset($poruka["mjesto"])): ?>
						<p class="alert alert-success" id="mjesto"><?php echo $poruka["mjesto"]; ?></p>
					<?php  endif; ?>

								<?php 
									poljavinarija("text","telefon","telefon",$poruka);
									poljavinarija("text","fax","fax",$poruka);
									poljavinarija("text","mobitel","mobitel",$poruka);
									poljavinarija("email","email","email",$poruka);
									poljavinarija("text","web","web",$poruka);
									poljavinarija("text","facebook","facebook",$poruka);
									poljavinarija("text","logo","logo",$poruka);
									poljavinarija("text","ziroracun","žiroračun",$poruka);
								 ?>