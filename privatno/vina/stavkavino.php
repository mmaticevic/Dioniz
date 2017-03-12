 <tr >
                <td><?php echo $vino -> id; ?></td>
                <td><?php echo $vino ->  sorta_vina; ?></td>
                <td><?php echo $vino -> naziv; ?></td>
                <td><?php echo $vino -> boja; ?></td> 
                
                <td><?php echo $vino -> kvaliteta_vina; ?></td>
                <td><?php echo $vino -> zapremnina; ?></td>
              
                <td><?php echo $vino -> cijena; ?></td>
                <td><a href="brisanje.php?id=<?php echo $vino->id ?>" class="btn btn-danger btn-block "><i class="fa fa-eraser" aria-hidden="true"></i></a></td>
                <td><a href="promjena3.php?id=<?php echo $vino->id ?>" class="btn btn-info btn-block "><i class="fa fa-refresh" aria-hidden="true"></i></a></td>
                <td><a href="#" class="postaviSliku" id="o_<?php echo $vino->id ?>"> Slika
        </a></td>
       
              </tr>