<?php 
include("../importBooks.php");
if ( isset($_POST["uploadCsv"]) ) {
    if ( isset($_FILES["csvFile"])) {

            //if there was an error uploading the file
        if ($_FILES["csvFile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["csvFile"]["error"] . "<br />";

        }
        else {
                //Print file details
            echo "Upload: " . $_FILES["csvFile"]["name"] . "<br />";
            echo "Type: " . $_FILES["csvFile"]["type"] . "<br />";
            echo "Size: " . ($_FILES["csvFile"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["csvFile"]["tmp_name"] . "<br />";

                //if file already exists
            if (file_exists("uploads/uploaded_file.csv")) {
                echo $_FILES["csvFile"]["name"] . " already exists. ";
                unlink("uploaded_file.csv");
            }
                //Store file in directory "upload" with the name of "uploaded_file.txt"
                $storagename = "uploaded_file.csv";
                move_uploaded_file($_FILES["csvFile"]["tmp_name"], "../uploads/" . $storagename);
                echo "Stored in: " . "uploads/" . $_FILES["csvFile"]["name"] . "<br />";
        }
    } else {
            echo "No file selected <br />";
    }
}
importBooks();
header("Location: ../catalog.php");
?>