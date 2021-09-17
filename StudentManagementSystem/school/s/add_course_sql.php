
<?php include '../styles/files/db_connect.php'; ?>
<?php

if(isset($_POST['Course_name']))
{
        $temp=0;
        try{
			if(!isset($_POST['CourseId'])){
				$sql='insert into Course (CourseId,Course_name) values (?,?)';
			}
			else{
				$s='select * from Course where CourseId=?';
				$q=$dbhandler->prepare($s);
				$q->execute(array($_POST['CourseId']));
				$r=$q->fetch();
				if($r==null)
				{
					$update=false;
					header("location:students.php?msg=Please select student first.");
				}
				else{
					$update=true;
					$sql='update students set Course_name=? where CourseId=?';
				}
			}
			
            // direct all name, gender, cast_no
			
			
			if(!isset($_POST['CourseId'])){
				$query=$dbhandler->prepare($sql);
				$r=$query->execute(array($_POST['Course_name']));
				$temp=1;
			}
			else{
				if($update){
					$query=$dbhandler->prepare($sql);
					$r=$query->execute(array($_POST['Course_name'],$_POST['CourseId']));
					$temp=1;
				}
				else{
					$temp=0;
				}
			}
        }
        catch(PDOException $e){
                header("location:add_student.php?msg=Data error occured try again..!".$e->getMessage());
				$temp=0;
        }
        if($temp == 1){
			if(isset($_POST['CourseId'])){
				header("location:details.php?msg=Student details updated successfully&CourseId=".$_POST['CourseId']);
			}
			else{
				$sql='select max(CourseId) as id from students';
				$query=$dbhandler->query($sql);
				if($r=$query->fetch()){
					header("location:admission.php?=CourseId".$r['id']);
				}
				else{
					header("location:student_details.php?msg=student details added successfully");
				}
			}
        }
}
else {
        header("location:add_student.php?msg=FILL REQUIRED DETAILS");
    }

?>