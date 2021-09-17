
<?php include '../styles/files/db_connect.php'; ?>

<?php
	if(isset($_GET['sid'])){
		$sql='select * from Course where CourseId=?';
        $query=$dbhandler->prepare($sql);
        $query->execute(array($_GET['CourseId']));
		$r=$query->fetch();
		if($r==null)
		{
			$update=false;
			header("location:students.php?msg=Student not found.");
		}
		else{
			$update=true;
		}
	}
	else{
		$update=false;
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php if($update){echo 'Update';}else{echo 'Add';} ?> course details</title>
        <link rel='icon' href="../styles/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Description" content="Student record management system, add new course"/>
        <link rel="stylesheet" type="text/css" href="../styles/w3.css">
		<link rel="stylesheet" type="text/css" href="../styles/main.css">
		 
		
    </head>
    <body>
		<ul id="mynav" class="w3-navbar w3-purple w3-hover-indigo">
			<li><a href="home.php">Home</a></li>
			
			<li><a href="students.php">Student Details</a></li>
			<li><a href="find.php">Find Student</a></li>
			<li><a href="leave_school.php">Student school leaving</a></li>
			<li><a href="exams.php">Add Exams</a></li>
			<li><a href="exam_d.php">Exams Details</a></li>
			<li><a class="w3-green" href="#"><?php if($update){echo 'Update';}else{echo 'Add';} ?> Course</a></li>
			<li class="w3-right"><a href="../default.php">Help..?</a></li>
			<li class="w3-right"><a href="../b/bank_details.php">Banks</a></li>
		</ul>
		<div class="w3-container" id="body_writing">
			<form action="add_student_sql.php" method="post">
				<table class="w3-table w3-card-4">
					<tr>
						<th class="w3-teal" colspan="2" style="text-align:center"><?php if($update){echo 'Update';}else{echo 'Add';} ?> Course Details</th>
					</tr>
					
					<tr>
						<th class="w3-grey" colspan="2">Course Details</th>
					</tr>
					<tr>
						<td style="text-align:right">* Course Name : </td>
						<td><input type="text" class="w3-input" name="Course_name" value="<?php if($update){echo $r['name'];} ?>" title="course name" required /></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;padding:15px;"><input type="submit" class="w3-btn w3-brown" value=" Submit "></td>
					</tr>
				<?php if($update){ echo '<input type="hidden" name="CourseId" value="'.$_GET['CourseId'].'" />'; } ?>
			</form>
		</div>
		<?php include "../styles/files/footer.php"; ?>
	</body>
</html>