<?php include '../styles/files/db_connect.php'; ?>

<?php
	try{
		if(isset($_GET['Exam_id']))
		{
			header("location:exam_d.php?msg=Try in straight forward way.");
		}
		else if(isset($_GET['Exam_id'])){
			$sid=$_GET['Exam_id'];
			$query=$dbhandler->prepare('select * from Exam where Exam_id=?');
			$query->execute(array($sid));
			$r=$query->fetch();
			if($r==null)
			{
				header("location:exam_d.php?msg=We are unable to find exam.");
			}
			else{
				$q=$dbhandler->query('select * from student where sid='.$r['sid']);
				$b=$q->fetch();
			}
		}
		
		else{
			header("location:exam_d.php?msg=Please select any student.");
		}
	}
	catch(Exception $ex){
		header("location:exam_d.php?msg=We are unable to find student.");
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
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
			<li><a href="students.php">All student Details</a></li>
			<li><a href="find.php">Find Student</a></li>
			<li><a class="w3-green" href="#">Student Details</a></li>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="std_upgrade.php">Mass STD updation</a></li>
			<li><a href="exams.php">Add Exams</a></li>
			<li><a href="exam_d.php">Exams Details</a></li>
			<li><a href="add_course.php">Add Course</a></li>
			
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<table class="w3-table w3-card-4">
				<tr>
					<th class="w3-teal" colspan="2" style="text-align:center">Exam Details</th>
				</tr>
				
				<tr>
					<th class="w3-grey" colspan="2">Personal Details</th>
				</tr>
				<tr>
					<td style="text-align:right">Exam id : </td>
					<td><input type="text" class="w3-input" name="name" title="examid" disabled value="<?php echo $r['Exam_id']; ?>" /></td>
				</tr>
				<tr>
					<td style="text-align:right">Marks : </td>
					<td><input type="text" class="w3-input" name="gender" title="Marks" disabled value="<?php echo $r['Marks']; ?>" /></td>
				</tr>
				
				<tr>
					<td style="text-align:center;padding:15px;"><a href="exams.php?sid=<?php echo $r['Exam_id']; ?>" class="w3-btn w3-light-blue">Update</a></td>
					<td style="text-align:center;padding:15px;"><a class="w3-btn w3-red" onclick="deleteExam(<?php echo $r['Exam_id']; ?>)">Delete</a></td>
				</tr>
				
				
						
			</table>
		</div>
	<?php include "../styles/files/footer.php"; ?>
	
	<div id="delStudent" class="w3-modal">
		<div class="w3-modal-content w3-animate-top w3-card-8">
			<header class="w3-teal" style="padding-left:10px;padding-right:10px;">
			  <span onclick="document.getElementById('delExam').style.display='none'"
			  class="w3-closebtn">&times;</span>
			  <h2>Deleting exam will also delete all General Register entries with this student</h2>
			</header>
			<div class="w3-container">
			<form class="w3-container" action="delete_exam_sql.php" method="post">
				Student Name. : <input id="marks_" name="name" class="w3-margin-top" type="text" disabled />
				<input id="exam_d" name="sid" class="w3-margin-top" type="hidden" />
				<div class=" w3-center "><input class="w3-btn w3-red" type="submit" value="Confirm Delete" style="margin:5px;"/></div>
			</form>
			</div>
					</div>
	</div>
	
</body>

	<script>
		function deleteExam(Exam_id){
			document.getElementById("delExam").style.display='block';
			document.getElementById("exam_d").value=Exam_id;
			document.getElementById("marks_").value='<?php echo $r['Marks']; ?>';
		}
		
	</script>
</html>

<?php
	/* displaying student personal information */
	function load_sid($sid){
		
	}
	
	/* displaying student GR-List information optionally */
	function load_gr($gr_no,$sid){
		load_sid($sid);
		
	}
?>