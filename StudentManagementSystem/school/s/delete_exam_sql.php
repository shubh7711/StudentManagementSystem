
<?php include '../styles/files/db_connect.php'; ?>
<?php
if(isset($_POST['Exam_id']))
{
	$temp=0;
    try{
        
        $sql='delete from Exam where Exam_id=?';
        $query=$dbhandler->prepare($sql);
        $r=$query->execute(array($_POST['Exam_id']));
		
		$temp=1;
        header("location:exam_d.php?msg=Exam has been deleted and ".$r."");
    } catch (Exception $ex) {
        if($temp==0){
            header("location:exam_dd.php?msg=We are unable to delete exam rigth now try again later.&Exam_id=".$_POST['Exam_id']);
        }
    }    
}
else{
    header("location:exam_d.php?msg=please select any student before access page.");
}
?>
