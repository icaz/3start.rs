<?php
session_start();
$user_id = $_SESSION['user_id'];

$image = $_POST['image'];

list($type, $image) = explode(';', $image);
list(, $image) = explode(',', $image);

$image = base64_decode($image);
$image_name = 'avatar_uid_' . $user_id . '.png';
file_put_contents('uploads/' . $image_name, $image);

echo 'successfully uploaded';
include 'db.php';
$sql = "UPDATE user SET `avatar`='uploads/$image_name' WHERE id=$user_id";
if ($mysqli->query($sql)) {
    echo 'successfully uploaded';
}
