<?php  
                                    poljaunos("text","oib","oib",$poruka);
									poljaunos("text","ime","ime",$poruka);
									poljaunos("text","prezime","prezime",$poruka);
									poljaunos("text","adresa","adresa",$poruka);
									
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
									poljaunos("text","telefon","telefon",$poruka);
									poljaunos("text","mobitel","mobitel",$poruka);
									poljaunos("email","email","email",$poruka);	