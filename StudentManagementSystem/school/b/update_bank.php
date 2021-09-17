
<?php include '../styles/files/db_connect.php'; ?>
<?php 
	if(!isset($_GET['bank_no'])){
		header("location:bank_details.php?msg=select bank for update details");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Bank</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, update bank"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		 
    </head>
    <body onload="data()">
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="bank_details.php">Banks</a></li>
			<li><a class="w3-green" href="#">Updating Bank Details</a></li>
			<li><a href="add_bank.php">Discard this and Add new Bank</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../s/home.php">Student Details</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="update_bank_sql.php?bank_no=<?php echo $_GET['bank_no']; ?>" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="2" style="text-align:center">Update Bank</th>
					</tr>
					
					<tr>
						<td style="text-align:right">* Bank Name : </td>
						<td><input type="text" class="w3-input" name="bank_name" id="bank_name" title="Name of Bank" required /></td>
					</tr>
					<tr>
						<td style="text-align:right">* Bank Place : </td>
						<td><input type="text" class="w3-input" name="place" id="place" title="Place of bank" required /></td>
					</tr>
					</tr>
						<td colspan="2" style="text-align:center;padding:15px;"><input type="submit" class="w3-btn w3-brown" value=" Submit "></td>
					<tr>
					<tr>
						<th class="w3-pale-blue w3-text-red" colspan="2"> &nbsp; * &nbsp; required field</th>
					</tr>
				</table>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
		<script>
			function data(){
			<?php
				$query=$dbhandler->prepare("select * from banks where bank_no=?");
                $query->execute(array($_GET['bank_no']));
                $r=$query->fetch();
				if($r==null)
                {
                    header("location:bank_details.php?msg=bank not available check again");
                }
				else{
					echo 'document.getElementById("bank_name").value="'. $r['bank_name'] .'";';
					echo 'document.getElementById("place").value="'. $r['place'] .'";';
				}
			?>
			}
		</script>
	</body>
</html>