<?php 

require_once("include/DB.php"); // include in this page DB.php file
?>


<!DOCTYPE>
<html>
    <head>
        <title>View Data From Database</title>
        <link rel="stylesheet" href="include/style.css">
    </head>
    
    <body>
<h2 claas="success"> <?php echo @$_GET['id']; ?>  </h2>
    

<div>
    <fieldset>
        <form class="" action="View_From_Database.php" method="GET">
            <input type="text" name="Search" value="" placeholder="Search by name / ssn"><br><br>
            <input type="submit" name="SearchButton" value="Search record">
        </form>
    </fieldset>
</div>



<?php
        if (isset($_GET["SearchButton"])) {
        
            $Search = $_GET["Search"];
            // $sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
            // $stmt=$connectingDB->prepare($sql);
            // $stmt->bindValue(':searcH',$Search);
            // $stmt->execute();

            $sql = "SELECT * FROM emp_record WHERE ename='$Search' OR ssn='$Search'";
            $stmt = $connectingDB->query($sql);
          
            while ($DataRows = $stmt->fetch()) {
                $Id            = $DataRows["id"];
                $EName         = $DataRows["ename"];
                $SSN           = $DataRows["ssn"];
                $Department    = $DataRows["dept"];
                $Salary        = $DataRows["salary"];
                $HomeAddress   = $DataRows["homeaddress"];
                ?>

                <div>
 
                <table width="1000" border="5" align="center">
                    <caption>Search Result</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SSN</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Home Address</th>
                        <th>Search Again</th>
                    </tr>
                    <tr>
                        <td><?php echo $Id; ?></td>
                        <td><?php echo $EName; ?></td>
                        <td><?php echo $SSN; ?></td>
                        <td><?php echo $Department; ?></td>
                        <td><?php echo $Salary; ?></td>
                        <td><?php echo $HomeAddress;?></td>
                        <td> <a href="View_From_Database.php">Search Again</a> </td>
                    </tr>
                </table>
                </div>
 
        <?php    } //Ending of While Loop
        } //Ending of Submit button
 
        ?>




<?php
$sql = "SELECT * FROM emp_record"; //write query for taking all data from database, form table emp_reqord
$stmt = $connectingDB -> query ($sql); //use this $sql string into query function
?>






<table width="1000" border="5" align="center">
         
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>SSN</th>
             <th>Department</th>
             <th>Salary</th>
             <th>Home Address</th>
             <th>Search Again</th>
        </tr>
  
  <?php  while ($DataRows = $stmt->fetch()) {   
    $Id            = $DataRows["id"];
    $EName         = $DataRows["ename"];
    $SSN           = $DataRows["ssn"];
    $Department    = $DataRows["dept"];
    $Salary        = $DataRows["salary"];
    $HomeAddress   = $DataRows["homeaddress"];
    ?>
    
<tr>
    <td><?php echo $Id; ?></td>
    <td><?php echo $EName; ?></td>
    <td><?php echo $SSN; ?></td>
    <td><?php echo $Department; ?></td>
    <td><?php echo $Salary; ?></td>
    <td><?php echo $HomeAddress;?></td>
    <td class="EditButton"> <a href="Update.php?id=<?php echo $Id; ?>">Update</a> </td>
    <td class="DeleteButton"> <a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>

    </body>
</html>