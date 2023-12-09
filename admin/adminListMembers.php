<?php
session_start();

include("../config.php");
require('../fpdf/fpdf.php');  // Include the FPDF library
require('../fpdf/font/helvetica.php');
if (!isset($_SESSION['valid'])) {
    header("Location: ../index.html");
}

// Function to generate PDF from the member list
function generatePDF($data)
{
    $pdf = new FPDF();
    // Add the necessary fonts
    $pdf->AddFont('helvetica', '', 'helvetica.php');  // Adjust the path as needed
    $pdf->SetFont('helvetica', 'B', 12);

    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    // Add header
    $pdf->Cell(10, 10, 'ID', 1);
    $pdf->Cell(30, 10, 'Full Name', 1);
    $pdf->Cell(40, 10, 'Email', 1);
    $pdf->Cell(10, 10, 'Age', 1);
    $pdf->Cell(30, 10, 'Contact Number', 1);
    $pdf->Cell(25, 10, 'Starting Date', 1);
    $pdf->Cell(25, 10, 'Ending Date', 1);
    $pdf->Cell(30, 10, 'Password', 1);
    $pdf->Ln();

    // Add data from the member list
    foreach ($data as $row) {
        $pdf->Cell(10, 10, $row['Id'], 1);
        $pdf->Cell(30, 10, $row['FullName'], 1);
        $pdf->Cell(40, 10, $row['Email'], 1);
        $pdf->Cell(10, 10, $row['Age'], 1);
        $pdf->Cell(30, 10, $row['ContactNumber'], 1);
        $pdf->Cell(25, 10, $row['StartingDate'], 1);
        $pdf->Cell(25, 10, $row['EndingDate'], 1);
        $pdf->Cell(30, 10, $row['Password'], 1);
        $pdf->Ln();
    }

    // Output PDF to the browser
    $pdfFileName = 'member_list.pdf';
    $pdf->Output('D', $pdfFileName);  // 'D' sends the file to the browser, forcing a download

    return $pdfFileName;
}

// Check if the Print button is clicked
if (isset($_POST['print'])) {
    $sql = "SELECT * from members";
    if ($result = mysqli_query($con, $sql)) {
        $memberData = mysqli_fetch_all($result, MYSQLI_ASSOC);
        generatePDF($memberData);
        mysqli_free_result($result);

        echo "<p><a href='$pdfFileName' download>Download PDF</a></p>";
    }
    exit; // Prevent further HTML output after generating PDF
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adminListMembers.css" />
    <title>Admin Dashboard - Member List</title>
</head>

<body>
    <div class="navbar">
        <a href="#home">
            <img src="../Components/Images/LogoWhite.png" alt="logo" class="logo" />
        </a>
        <ul>
            <li><a href="adminDashboard.php">Go Back</a></li>
            <li><a href="adminLogin.php">Log Out</a></li>
        </ul>
    </div>
    <main>
        <div class="main-box member-list">
            <h2>Member List</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php
                $sql = "SELECT * from members";
                if ($result = mysqli_query($con, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Id'] . "</td>";
                        echo "<td>" . $row['FullName'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Age'] . "</td>";
                        echo "<td>" . $row['ContactNumber'] . "</td>";
                        echo "<td>" . $row['StartingDate'] . "</td>";
                        echo "<td>" . $row['EndingDate'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td><a href='adminDeleteMember.php?id=" . $row['Id'] . "'>Delete</a></td>";
                        echo "<td><a href='adminUpdateMember.php?id=" . $row['Id'] . "'>Update</a></td>";
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                }
                ?>
            </table>
            <form method="post">
                <input type="submit" class="print-button" name="print" value="Print" />
            </form>
        </div>

    </main>
</body>

</html>