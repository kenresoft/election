<?php
include('../includes/config.php');

if(!empty($_POST["Id"])) 
{
    $name=$_POST['Id'];
    if($name == "Candidate"){
        $query=mysqli_query($con,"SELECT * FROM registrations,candidates WHERE registrations.candidate_id=candidates.candidate_id");?>
    
        <?php
        while($row=mysqli_fetch_array($query))
        { ?>
            <option value="<?php echo htmlentities($row['registration_id']); ?>"><?php echo htmlentities($row['candidate_name']); ?></option>
        <?php
        }
    }
    else {
        $query=mysqli_query($con,"SELECT * FROM registrations,electorates WHERE registrations.electorate_id=electorates.electorate_id");?>
    
        <?php
        while($row=mysqli_fetch_array($query))
        { ?>
            <option value="<?php echo htmlentities($row['registration_id']); ?>"><?php echo htmlentities($row['electorate_name']); ?></option>
        <?php
        }
    }
}
?>