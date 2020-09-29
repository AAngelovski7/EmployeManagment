<?php 

require_once("include/DB.php");

if(isset($_POST['Submit'])){
    if(!empty($_POST['Ename']) && !empty($_POST['SSN'])){
        $Ename=$_POST['Ename'];
        $SSN=$_POST['SSN'];
        $Dept=$_POST['Dept'];
        $Salary=$_POST['Salary'];
        $HomeAddress=$_POST['HomeAddress'];

      
        $sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress) VALUE(:enamE, :ssN, :depT, :salarY, :homeaddresS)";

        $stm=$connectingDB->prepare($sql);
        $stm->bindValue(':enamE',$Ename);
        $stm->bindValue(':ssN',$SSN);
        $stm->bindValue(':depT',$Dept);
        $stm->bindValue(':salarY',$Salary);
        $stm->bindValue(':homeaddresS',$HomeAddress);
        
        $Execute = $stm->execute();

        if ($Execute) {
            echo '<span class="success"> Record Has been Addedd Successfully</span>';
        }
   
    }else{
    echo '<span class="FieldInfoHeading">Please Add atleast Name and Social Security Number</span>';
   }


}

?>


<!DOCTYPE >
<html>
<head>


<title>
Insert Data into Database
</title>
<link rel="stylesheet" href="include/style.css">
</head>

<body>



<div>
<form class="" action="" method="POST" >
<fieldset>
    <span class="FieldInfo"> EmployeName:</span>
    <br>
    <input type="text" name="Ename" value="" >
        <br>
    <span class="FieldInfo">Social Security Number:</span>
    <br>
    <input type="text" name="SSN" value="">
         <br>
    <span class="FieldInfo">Department:</span>
    <br>
    <input type="text" name="Dept" value="">
         <br>
    <span class="FieldInfo">Salary:</span>
    <br>
    <input type="text" name="Salary" value="">
        <br>
    <span class="FieldInfo">Home Address:</span>
    <br>
   <textarea name="HomeAddress" rows="8" cols="80"></textarea>
        <br>
    <input type="submit" name="Submit" value="Submit your record">
</fieldset>


</form>



</div>


</body>


</html>