<?php
include '../includes/config.php';
error_reporting(0);

$position = $_POST['position'];
$party = $_POST['party'];
$voter = $_POST['voter'];
$category = $_POST['category'];

$insert = "INSERT INTO `votes`(`position_id`, `party_id`, `voter_category`, `vote_validation_id`)
        VALUES ('$position','$party','$category','$voter')";
$reset = "ALTER TABLE `votes` AUTO_INCREMENT = 1";
$check = "SELECT * FROM `votes`
    WHERE `position_id` = '$position' AND `party_id` = '$party' AND `voter_category` = '$category' AND `vote_validation_id` = '$voter'";
$detail = "SELECT * FROM votes, positions, parties 	
    WHERE votes.position_id = positions.position_id AND votes.party_id = parties.party_id 
    AND votes.position_id = '$position' AND votes.party_id = '$party' ORDER BY vote_id ";
$row = mysqli_fetch_assoc(mysqli_query($con, $detail));
$data = array("position" => $row['position_name'], "party" => $row['party_name']);

if (mysqli_num_rows(mysqli_query($con, $check))) { // Rows exist
	  db_clean($con, $reset);
    json_response(2, "Sorry, you can't vote this party and candidate again", $data, 201);
} else {
    if (mysqli_query($con, $insert)) {
        db_clean($con, $reset);
			json_response(1, "Vote successful", $data);
    } else {
         db_clean($con, $reset);
        json_response(3, "Invalid vote", $data, 203);
    }
    //mysqli_close($con);
}

function db_clean($con, $reset)
{
    mysqli_query($con, $reset);
    $row = mysqli_fetch_assoc(mysqli_query($con, $detail));
    $data = array("position" => $row['position_name'], "party" => $row['party_name']);
    //mysqli_close($con);
}

function json_response($code, $message, $data, $httpStatus = 200)
{
    header_remove();
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    http_response_code($httpStatus);
    echo json_encode(array("code" => $code, "message" => $message, "data" => $data));
    exit();
}
