<?php
$servername = "localhost";
$username = "marouane";
$password = "";
$dbname = "absence_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$name = $_POST['name'];
$prenom = $_POST['prenom'];
$module = $_POST['module'];
$newAbsenceCount = $_POST['absence_count'];

$sql = "UPDATE students SET absence_count = absence_count + '$newAbsenceCount' WHERE name = '$name' AND prenom = '$prenom' AND module = '$module'";

if ($conn->query($sql) === TRUE) {
    echo "Nombre d'absences mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour du nombre d'absences : " . $conn->error;
}

$conn->close();
?>