<?php
require_once('dbconfigu.php');
class katalog
{
	private $conn;
	
	function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}
	
	public function create($katalog,$tlumaczenie,$plik,$data)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO katalog(katalog,tlumaczenie,plik,data) VALUES(:katalog, :tlumaczenie, :plik, :data)");
			$stmt->bindparam(":katalog",$katalog);
			$stmt->bindparam(":tlumaczenie",$tlumaczenie);
			$stmt->bindparam(":plik",$plik);
			$stmt->bindparam(":data",$data);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['katalog']); ?></td>
                <td><?php print($row['tlumaczenie']); ?></td>
                <td><a href='<?php print($row['plik']); ?>'><?php echo $row['data']."//".$row['katalog']; ?></a></td>
                <td><?php print($row['data']); ?></td>
                
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Brak danych...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{	
                    $starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>Pierwszy</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'><<</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>>></a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Ostatni</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
