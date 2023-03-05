<?php
include_once 'header.php';
include_once 'ogloszenie.class.php';
$ogloszenie = new ogloszenie();

include_once 'dbconfigu.php';

if(isset($_POST['btn-save']))
{
// $plik = "/updkkz/pliki/$temat/$tresc/$soft_date/".$_FILES['plik']['name'];
	$tresc =  ($_POST['tresc']);
	$temat = ($_POST['temat']);
	$autor = ($_SESSION['user_session']);
	$data = date("Y-m-d H:i:s",time());	
	if($ogloszenie->create($temat,$tresc,$autor,$data))
	{
		//header("location: ogloszenie.add.php?inserted");
        echo("<script>location.href ='ogloszenie.add.php?inserted';</script>");
	}
	else
	{
		//header("location: ogloszenie.add.php?failure");
        echo("<script>location.href ='ogloszenie.add.php?failure';</script>");
	}
}
include_once 'header.php';
?>
<div class="clearfix"></div><br />

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Sukces</strong> Dodano nowe ogłoszenie.<a href="index.php">Powrót</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>Nie udało się</strong> Błąd podczas wprowadzania danych !
	</div>
	</div>
    <?php
}

?>
<div class="clearfix"></div><br />
<div class="container">
<div>Dodawanie ogłoszenia<br/><br/></div>
  <form action="ogloszenie.add.php" method="POST" >	
	<label for="temat">Temat:</label>
	<input type="text" class="form-control" id="temat" name="temat" required>
	<label for="tresc">Tresc:</label>	
	<textarea class="form-control" rows="5" id="tresc" name="tresc" required></textarea>
	<br />
	<!--
	<label for="autor">Autor:</label>
	<input type="text" class="form-control" id="autor" name="autor" required>
	<br />
	
	<input id="plik" class="btn btn-large btn-success" type="file" name="plik"/><br/>
	-->
	<input class="btn btn-large btn-primary" type="submit" value="Dodaj ogłoszenie" name="btn-save"/>
	<a href="ogloszenie.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Powrót</a>
  </form>
</div>
 <br /><!-- /container -->
<div class="clearfix"></div>



<?php include_once 'footer.php'; ?>