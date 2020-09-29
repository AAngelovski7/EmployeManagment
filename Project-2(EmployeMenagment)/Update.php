<?php 

require_once("include/DB.php");

$SearchQueryParameter = $_GET["id"];

if(isset($_POST['Submit'])){
    
        $Ename=$_POST['Ename'];
        $SSN=$_POST['SSN'];
        $Dept=$_POST['Dept'];
        $Salary=$_POST['Salary'];
        $HomeAddress=$_POST['HomeAddress'];

      
        $sql = "UPDATE emp_record SET ename='$Ename', ssn='$SSN', dept='$Dept',salary='$Salary', 
        homeaddress='$HomeAddress' WHERE id='$SearchQueryParameter'";
    
        $Execute = $connectingDB->query($sql);
              
        

        if ($Execute) {
            echo '<script>window.open("View_From_Database.php?id=Record Updated Successfully","_self")</script>';
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

<?php 

$sql = "SELECT * FROM emp_record WHERE id = '$SearchQueryParameter'";
$stmt = $connectingDB->query($sql);

while ($DataRows = $stmt->fetch()) {      //DataRows is associative array and put in variable tthat data
    $Id            = $DataRows["id"];
    $EName         = $DataRows["ename"];
    $SSN           = $DataRows["ssn"];
    $Department    = $DataRows["dept"];
    $Salary        = $DataRows["salary"];
    $HomeAddress   = $DataRows["homeaddress"];
}
?>



<div>
<form class="" action="Update.php?id= <?php echo $SearchQueryParameter; ?>" method="POST" >
<fieldset>
    <span class="FieldInfo"> EmployeName:</span>
    <br>
    <input type="text" name="Ename" value="<?php echo $EName ?>" >
        <br>
    <span class="FieldInfo">Social Security Number:</span>
    <br>
    <input type="text" name="SSN" value="<?php echo $SSN ?>">
         <br>
    <span class="FieldInfo">Department:</span>
    <br>
    <input type="text" name="Dept" value="<?php echo $Department ?>">
         <br>
    <span class="FieldInfo">Salary:</span>
    <br>
    <input type="text" name="Salary" value="<?php echo $Salary ?>">
        <br>
    <span class="FieldInfo">Home Address:</span>
    <br>
   <textarea name="HomeAddress" rows="8" cols="80"><?php echo $HomeAddress ?></textarea>
        <br>
    <input type="submit" name="Submit" value="Submit your record">
</fieldset>


</form>



</div>


</body>


</html>