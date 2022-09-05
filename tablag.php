
<center> <img width="15%" src="Bandas.png" >
<br>

<br>
<?php 
$server   = "localhost";
$username = "root";
$password = "Loteri@654258";
$database = "bandas";
        $link = mysqli_connect($server, $username, $password, $database); 
         if(! $link ) {
            die('Could not connect: ' . mysqli_error());
         }


 
$sql = "SELECT * FROM totales21 order by ptotal desc ";
  $resultado = mysqli_query($link, $sql);
  $row = mysqli_num_rows($resultado);
  if ($row == 0)
  { ?>    
<center><FONT face=Arial SIZE=4 COLOR=#FF0000 ><b> NO EXISTEN REGISTROS </FONT><b>
<?php } else { ?>
<table  class="table-fill">
<thead>

<tr>
<th class="text-left">N°</th>
<th class="text-left">Nombre de la Banda</th>
<th class="text-left">Puntos</th>
</tr>
</thead>
<?php for ($i = 1; $i <= $row; $i++) { $row = mysqli_fetch_array($resultado);?>   
<tbody >
<tr>
<td class="text-left"><?PHP echo($i);?></td>
<td class="text-left"><?PHP echo($row["escuela"]);?></td>
<td align="center" class="text-center"><?PHP echo($row["ptotal"]); ?></td>  
</tr>
</tbody>
<?php } echo("</table>");}?>  
