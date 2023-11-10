<?php
session_start();

include("../config.php");
if (!isset($_SESSION['valid'])) {
  header("Location: ../index.html");
}

if (isset($_GET['id'])) {
  $memberId = $_GET['id'];
  $deleteQuery = "DELETE FROM members WHERE Id = $memberId";
  if (mysqli_query($con, $deleteQuery)) {
    // Member deleted successfully
    header("Location: adminlistMembers.php");
  } else {
    // Error occurred while deleting
    echo "Error deleting member: " . mysqli_error($con);
  }
} else {
  // No member ID provided
  echo "Invalid member ID";
}
?>
