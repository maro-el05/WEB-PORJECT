<?php
$servername = "localhost";
$username = "marouane";
$password = "";
$dbname = "absence_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$name = $_POST['name'];
$prenom = $_POST['prenom'];
$module = $_POST['module'];
$absence_count = $_POST['absence_count'];

$sql = "INSERT INTO students (name, prenom, module, absence_count) VALUES ('$name', '$prenom', '$module', '$absence_count')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel étudiant inscrit avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>