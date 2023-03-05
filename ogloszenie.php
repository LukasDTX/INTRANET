<?php
include_once 'dbconfigu.php';
include_once 'header.php'; 
include_once 'ogloszenie.class.php';
$ogloszenie = new ogloszenie();
?>


<div class="clearfix"></div>

<div class="container">
<a href="ogloszenie.add.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Dodaj ogłoszenie</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>

     <?php
		//$query = "SELECT * FROM ogloszenie";   
		$query = "SELECT users.user_name, ogloszenie.temat, ogloszenie.tresc, ogloszenie.data_utw FROM ogloszenie INNER JOIN users ON users.user_id = ogloszenie.autor";
		$records_per_page=5;
		$newquery = $ogloszenie->paging($query,$records_per_page);
		$ogloszenie->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $ogloszenie->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr> 
</table>      
</div>

<?php include_once 'footer.php'; ?>