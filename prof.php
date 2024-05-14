<?php
$servername = "localhost";
$username = "marouane";
$password = "";
$dbname = "absence_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$module = $_POST['module'];

$sql = "SELECT name, prenom, absence_count, module FROM students WHERE module = '$module'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<p style='font-size:20px;'>Table d'absence des etudiants:</p> <br>";
    echo "<table style='border-collapse: collapse; width: 50%;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 8px; background-color: #f2f2f2; font-weight: bold;'>FIRST NAME</th>";
    echo "<th style='border: 1px solid black; padding: 8px; background-color: #f2f2f2; font-weight: bold;'>LAST NAME</th>";
    echo "<th style='border: 1px solid black; padding: 8px; background-color: #f2f2f2; font-weight: bold;'>ABSENCE</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['name'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['absence_count'] . " séances" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun étudiant trouvé pour ce module";
}

$conn->close();
?>
