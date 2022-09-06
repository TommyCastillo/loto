
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet">
</head>

<?php 
$server   = "localhost";
$username = "root";
$password = "Loteri@654258";
$database = "bandas";

$mysqli = new mysqli($server, $username, $password, $database);

$catego = $_GET['catego'];

if ($catego == 'bm') {
  $catname ='Bandas de Musica';
}elseif ($catego == 'bc') {
  $catname ='Bandas Combinadas';
}elseif ($catego == 'lt') {
  $catname ='Liras y Tambores';
}

if ($catego == 'bc') {

	$query = mysqli_query($mysqli, "SELECT escuela, SUM(bc)bc, SUM(bcbata)bcbata, SUM(bcbatu)bcbatu, SUM(bcdisc)bcdisc, SUM(bcesco)bcesco, SUM(bcfolc)bcfolc, SUM(bctmay)bctmay FROM categorias GROUP BY escuela" )
or die('error: '.mysqli_error($mysqli));
	
}elseif ($catego == 'bm') {

	$query = mysqli_query($mysqli, "SELECT escuela, SUM(bm)bm, SUM(bmbata)bmbata, SUM(bmbatu)bmbatu, SUM(bmdisc)bmdisc, SUM(bmesco)bmesco, SUM(bmfolc)bmfolc, SUM(bmtmay)bmtmay FROM categorias GROUP BY escuela" )
or die('error: '.mysqli_error($mysqli));
	
}elseif ($catego == 'lt') {

	$query = mysqli_query($mysqli, "SELECT escuela, SUM(lt)lt, SUM(ltbata)ltbata, SUM(ltbatu)ltbatu, SUM(ltdisc)ltdisc, SUM(ltesco)ltesco, SUM(ltfolc)ltfolc, SUM(lttmay)lttmay FROM categorias GROUP BY escuela" )
or die('error: '.mysqli_error($mysqli));
	
}


 ?>
<header>
  <img style="width: 25%; text-align: left; " src="Bandas.png" >
  <h2><?php echo $catname; ?></h2> 
  <h1>Colegios Participantes</h1> 
</header>

<body>
<ol>
<div class="row">

<?php 
$x=1;
while ($data = mysqli_fetch_assoc($query)) { 

if ($data[bm] != 0 ) {
 ?>
  <div class="col-lg-3">
      <div class="card text-center">
      <div class="card-body">
        <h4 class="card-title"><?php echo $data[escuela]; ?></h4><p class="card-text"> Banda de Musica </p>         
        <button  onclick="window.location.href='controlchange.php?colegio=<?php echo $data[escuela]; ?>&catego=bm'" >Calificar</button>
      </div>
    </div>
  </div>
<?php } ?>

<?php 
if ($data[bc] != 0 ) {
 ?>
  <div class="col-lg-3">
      <div class="card text-center">
      <div class="card-body">
        <h4 class="card-title"><?php echo $data[escuela]; ?></h4><p class="card-text">Banda Combinada</p>         
        <button  onclick="window.location.href='controlchange.php?colegio=<?php echo $data[escuela]; ?>&catego=bc'" >Calificar</button>
      </div>
    </div>
  </div>
<?php } ?>

<?php 
if ($data[lt] != 0 ) {
 ?>
  <div class="col-lg-3">
      <div class="card text-center">
      <div class="card-body">
        <h4 class="card-title"><?php echo $data[escuela]; ?></h4><p class="card-text">Liras Y Tambores</p>         
        <button  onclick="window.location.href='controlchange.php?colegio=<?php echo $data[escuela]; ?>&catego=lt'" >Calificar</button>
      </div>
    </div>
  </div>
<?php } 
 $x++; } ?>
</div>
</div>
<footer>
  <button  onclick="window.location.href='control.php'" >Atrás</button>  
</footer>
</ol>
</body> 

</html>
