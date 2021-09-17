<?php include '../styles/files/db_connect.php'; ?>
<?php

if(isset($_POST['Exam_id']) && isset($_POST['Marks']))
{
        $temp=0;
        try{
			if(!isset($_POST['Exam_id'])){
				$sql='insert into Exam (Exam_id,Marks) values (?,?)';
			}
			else{
				$s='select * from Exam where Exam_id=?';
				$q=$dbhandler->prepare($s);
				$q->execute(array($_POST['Exam_id']));
				$r=$q->fetch();
				if($r==null)
				{
					$update=false;
					header("location:exam_d.php?msg=Please select exams first.");
				}
				else{
					$update=true;
					$sql='update Exam set Marks=? where Exam_id=?';
				}
			}
			
            

			$Marks=0;
			if(isset($_POST['Marks'])){
				$Marks=$_POST['Marks'];
			}
			
			if(!isset($_POST['Exam_id'])){
				$query=$dbhandler->prepare($sql);
				$r=$query->execute(array($_POST['Marks']));
				$temp=1;
			}
			else{
				if($update){
					$query=$dbhandler->prepare($sql);
					$r=$query->execute(array($_POST['Marks'],$_POST['Exam_id']));
					$temp=1;
				}
				else{
					$temp=0;
				}
			}
			
        }
        catch(PDOException $e){
                header("location:exams.php?msg=Data error occured try again..!".$e->getMessage());
				$temp=0;
        }
        if($temp == 1){
			if(isset($_POST['Exam_id'])){
				header("location:exam_dd.php?msg=Exam details updated successfully&sid=".$_POST['Exam_id']);
			}
			else{
				$sql='select max(Exam_id) as id from Exam';
				$query=$dbhandler->query($sql);
				if($r=$query->fetch()){
					header("location:new_exams.php?sid=".$r['Exam_id']);
				}
				else{
					header("location:exam_details.php?msg=student details added successfully");
				}
			}
        }
}
else {
        header("location:exams.php?msg=FILL REQUIRED DETAILS");
    }

?>
