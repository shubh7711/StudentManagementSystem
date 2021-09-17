
<?php include '../styles/files/db_connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>All Exams Details</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, view student"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		<script src="../styles/jquery.js"></script>
		<style>
		form div{
			margin:3px;
		}
		</style>
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			
			<li><a href="find.php">Find Student</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="exams.php">Add Exams</a></li>
			<li><a class="w3-green" href="#">Exams Details</a></li>
			<li><a href="add_course.php">Add Course</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<div>
			<div>
				<form>
				<div id="c-1" style="display:none"><input type="button" onclick="showCo(1)" value="Show More Details column" /><br/></div>
				<div id="c-2" style="display:none"><input type="button" onclick="showCo(2)" value="Show Marks" /><br/></div>
				
								</form>
			</div>
			<div  style="overflow-x:auto;margin:10px 2px 15px 8px;" class="w3-card-4">
			<table class="w3-table w3-striped w3-bordered w3-hoverable">
				<tr class="w3-teal">
					<th colspan="13">Student Details</th>
				</tr>
				<tr class="w3-grey" id="student-table">
					<th onclick="hideCo(1)">Select</th>
					<th onclick="hideCo(2)">Marks</th>
					
					
				</tr>
				<?php
					$sql="select * from Exam";
					$query=$dbhandler->query($sql);
                    $temp=0;
					while($r=$query->fetch()){
						echo '<tr>';
						echo '<td><a href="exam_dd.php?sid='.$r['Exam_id'].'" class="w3-btn w3-light-blue">More Details</a></td>';
						echo '<td>'.$r['Marks'].'</td>';
						echo '</tr>';
						$temp=1;
					}
					if($temp==0){
						echo '<tr><th colspan="13">No Exam found...</th></tr>';
					}
				?>
			</table>
			</div>
			</div>
			<div class="w3-red" style="padding:15px;">
				<!-- all link for other kind of list and finding student page -->
				
				<a href="list.php" title="GR List">View General Register List</a>
			
			</div>
		</div>
		
		<?php include "../styles/files/footer.php"; ?>
	<script>
		function hideCo(i){
			$("td:nth-child(" + i + "),th:nth-child(" + i + ")").hide();
			document.getElementById("c-"+i).style.display='block';
		}
		function showCo(i){
			$("td:nth-child(" + i + "),th:nth-child(" + i + ")").show();
			document.getElementById("c-"+i).style.display='none';
		}
	</script>
	</body>
</html>