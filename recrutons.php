<?php

$target_path = "upload/";
file_put_contents('logtiti.txt',$target_path);
$target_path = $target_path . basename($_FILES['monfichier']['name']); 
$log = file_put_contents('logtiti.txt',$target_path);
$log .= file_put_contents('logtiti.txt',$_FILES['monfichier']['tmp_name']);
$log .= file_put_contents('logtiti.txt',$_FILES['monfichier']['name']);
if(move_uploaded_file($_FILES['monfichier']['tmp_name'], $target_path)) {
    echo "The file ".  basename($_FILES['monfichier']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
file_put_contents('logtiti.txt',$log);
?>

