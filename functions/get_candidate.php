<?php
include('../includes/config.php');

if(!empty($_POST["Id"])) 
{
    $id=intval($_POST['Id']);
    $query=mysqli_query($con,"SELECT * FROM candidates WHERE candidate_id=$id");?>
    
    <!-- <option value="">Select Position</option> -->
    <?php
    while($row=mysqli_fetch_array($query))
    { ?>
        <option value="<?php echo htmlentities($row['candidate_id']); ?>"><?php echo htmlentities($row['candidate_name']); ?></option>
    <?php
    }
}
?>