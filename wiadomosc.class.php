<?php
require_once('dbconfigu.php');
class wiadomosc
{
	private $conn;
	
	function __construct()
	{
		$Database = new Database();
		$db = $Database->dbConnection();
		$this->conn = $db;
	}
	public function odbiorcy()
	{
		$stmt = $this->conn->prepare("SELECT user_id, user_name FROM users");
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=".$row['user_id'].">".$row['user_name']."</option>";
        }
	}
	
	public function create($temat,$tresc,$autor,$data,$odbiorcy)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO wiadomosc(temat,tresc,autor,data_utw) VALUES(:temat, :tresc, :autor, :data_utw)");
			$stmt->bindparam(":temat",$temat);
			$stmt->bindparam(":tresc",$tresc);
			$stmt->bindparam(":data_utw",$data);
			$stmt->bindparam(":autor",$autor);
			$stmt->execute();
			
			$wiadomosc = $this->conn->lastInsertId();

			$stmt = $this->conn->prepare("INSERT INTO poczta(wiadomosc,odbiorcy) VALUES(:wiadomosc, :odbiorcy)");
			$stmt->bindparam(":odbiorcy",$odbiorcy);
			$stmt->bindparam(":wiadomosc",$wiadomosc);
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
	
	public function dataview($query,$odbwys)
	{
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<?php if($odbwys == 1) { ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">							
							<div class="col-md-8">
								<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
								<?php print($row['temat']); ?>
							</div>								
							<div class="col-md-2"><?php print($row['data_utw']) . "   "; ?></div>
							<div class="col-md-2">
								do:
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<?php print(nl2br($row['user_name'])); ?>
							</div>							
						</div>
					</div>
					<div class="panel-body">
						<?php print(nl2br($row['tresc'])); ?>
					</div>
					<div class="panel-footer">

					</div>
				</div>
				
			<?php } if($odbwys == 0){ ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">							
							<div class="col-md-8">
								<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
								<?php print($row['temat']); ?>
							</div>								
							<div class="col-md-2"><?php print($row['data_utw']) . "   "; ?></div>
							<div class="col-md-2">
								od:
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<?php print(nl2br($row['user_name'])); ?>
							</div>							
						</div>
					</div>
					<div class="panel-body">
						<?php print(nl2br($row['tresc'])); ?>
					</div>
					<div class="panel-footer">

					</div>
				</div>
			<?php }
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
?>