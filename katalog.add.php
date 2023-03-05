<?php
include_once 'katalog.class.php';
include_once 'dbconfigu.php';
$kat = new katalog();
	/**
	 * @param string $sText  Text to filter.
	 * @return string
	 */
	function clearPL($sText)
	{
		$aReplacePL = array(
			'ą' => 'a', 'ę' => 'e', 'ś' => 's', 'Ś' => 'S', 'ć' => 'c',
			'ó' => 'o', 'ń' => 'n', 'ż' => 'z', 'ź' => 'z', 'ł' => 'l'
			);
 
		return str_replace(array_keys($aReplacePL), array_values($aReplacePL), $sText);
	}


$max_rozmiar = 1024*1024*200;
if(isset($_POST['btn-save']))
{
	//***tworzenie folderów ****///
	if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!';
    } else {
        echo 'Odebrano plik. <br />Początkowa nazwa: '.$_FILES['plik']['name'];
        echo '<br/>';
        /*if (isset($_FILES['plik']['type'])) {
            echo 'Typ: '.$_FILES['plik']['type'].'<br/>';
        }*/
		$kat_date = "";
		$kat_date =+ date("Ymd", time())."_".date("Gis", time());
		echo $kat_date;
		$tlumaczenie_pl = $_POST['tlumaczenie'];
		$katalog_pl = $_POST['katalog'];
		$tlumaczenie = clearPL($_POST['tlumaczenie']);
		$katalog = clearPL($_POST['katalog']);
		if (is_dir("katalogi/$tlumaczenie")) {
			if (is_dir("katalogi/$tlumaczenie/$katalog")){
				mkdir("katalogi/$tlumaczenie/$katalog/$kat_date", 0777);
			}
			else {
				mkdir("katalogi/$tlumaczenie/$katalog");
				mkdir("katalogi/$tlumaczenie/$katalog/$kat_date", 0777);
			}
		}
		else{
			mkdir("katalogi/$tlumaczenie"); 
			if (is_dir("katalogi/$tlumaczenie/$katalog")){
				mkdir("katalogi/$tlumaczenie/$katalog/$kat_date", 0777);
			}
			else {
				mkdir("katalogi/$tlumaczenie/$katalog");
				mkdir("katalogi/$tlumaczenie/$katalog/$kat_date", 0777);
			}
		}

        move_uploaded_file($_FILES['plik']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT']."/intranet/katalogi/$tlumaczenie/$katalog/$kat_date/".$_FILES['plik']['name']);
    }
} else {
   echo 'Błąd przy przesyłaniu danych!';
}

	//$katalog = $_POST['katalog'];
	//$tlumaczenie = $_POST['tlumaczenie'];
	$plik = "/intranet/katalogi/$tlumaczenie/$katalog/$kat_date/".$_FILES['plik']['name'];
	$data = date("Y-m-d H:i:s",time());	
	if($kat->create($katalog_pl,$tlumaczenie_pl,$plik,$data))
	{
		header("location: katalog.add.php?inserted");
	}
	else
	{
		header("location: katalog.add.php?failure");
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
    <strong>Sukces</strong> Dodano nowy katalog.<a href="index.php">Powrót</a>!
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
<div>Dodawanie katalogu<br/><br/></div>
  <form action="katalog.add.php" method="POST" ENCTYPE="multipart/form-data">	
	<label for="tlumaczenie">tlumaczenie:</label>
	<input type="text" class="form-control" id="tlumaczenie" name="tlumaczenie" required>
	<label for="katalog">katalog:</label>
	<input type="text" class="form-control" id="katalog" name="katalog" required>
	<br />
	<input id="plik" class="btn btn-large btn-success" type="file" name="plik"/><br/>
	<input class="btn btn-large btn-primary" type="submit" value="Wyślij plik" name="btn-save"/>
	<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Powrót</a>
  </form>
</div> <!-- /container -->
<div class="clearfix"></div>



<?php include_once 'footer.php'; ?>