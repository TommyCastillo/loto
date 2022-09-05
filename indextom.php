<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet">
</head>
<body align="center"><br>
<div align="center">
    <img src="Bandas.png" width="30%" ></br><p align="center"> 
    <button align="center" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Entrar</button></p>
</div>
    
<div id="id01" class="modal" >
  
  <form class="modal-content animate" action="proces.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img width="20%" src="Bandas.png" >
    </div>

    <div class="container">
      <select name="uname" required>
        <option value="">Seleccionar Juez</option>
<?php
$hostname ="localhost";
$username ="root";
$password ="Loteri@654258";
$databaseName ="bandas";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM jueces ORDER BY juez";
$result1 = mysqli_query($connect, $query);
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}
?>
<?php while($row1 = mysqli_fetch_array($result1)):;?>
            <option value="<?php echo $row1[0];?>|<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
            <?php endwhile;?>

      </select>

      <button type="submit">Iniciar</button>
    </div>
  </form>
</div>
<script>

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
