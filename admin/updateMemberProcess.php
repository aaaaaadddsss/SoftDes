<?php
session_start();

include("../config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: ../index.html");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['memberId']) && !empty($_POST['memberId']) &&
        isset($_POST['fullName']) && !empty($_POST['fullName']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['CNumber']) && !empty($_POST['CNumber']) &&
        isset($_POST['StDate']) && !empty($_POST['StDate']) &&
        isset($_POST['EdDate']) && !empty($_POST['EdDate'])) {
        
        // Sanitize and validate the input data as needed
        $memberId = mysqli_real_escape_string($con, $_POST['memberId']);
        $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $CNumber = mysqli_real_escape_string($con, $_POST['CNumber']);
        $StDate = mysqli_real_escape_string($con, $_POST['StDate']);
        $EdDate = mysqli_real_escape_string($con, $_POST['EdDate']);
        // Add similar validations for other fields
        
        // Perform the database update
        $sql = "UPDATE members SET FullName = '$fullName', Email = '$email', ContactNumber = '$CNumber', StartingDate = '$StDate', EndingDate = '$EdDate' WHERE Id = $memberId";
        
        if (mysqli_query($con, $sql)) {
            // Successful update, you can redirect to a success page or do other actions
            header("Location: adminListMembers.php");
        } else {
            // Handle the case where the update failed
            echo "Update failed. Please try again.";
        }
    } else {
        // Handle invalid or missing form data
        echo "Invalid form data. Please fill in all required fields.";
    }
} else {
    // Handle non-POST requests
    echo "Invalid request method.";
}
?>