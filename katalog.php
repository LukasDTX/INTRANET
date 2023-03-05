<?php
include_once 'dbconfigu.php';
include_once 'header.php'; 
include_once 'katalog.class.php';
$katalog = new katalog();
?>


<div class="clearfix"></div>

<div class="container">
<a href="katalog.add.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Dodaj katalog</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     <th>Katalog</th>
     <th>Tłumaczenie</th>
     <th>Plik</th>
     <th>Data aktualizacji</th>
     </tr>
     <?php
		$query = "SELECT * FROM katalog";   
		$records_per_page=5;
		$newquery = $katalog->paging($query,$records_per_page);
		$katalog->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $katalog->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr> 
</table>      
</div>

<?php include_once 'footer.php'; ?>