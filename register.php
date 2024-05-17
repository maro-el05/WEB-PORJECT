<?php
$servername = "localhost";
$username = "marouane";
$password = "";
$dbname = "absence_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a echoue : " . $conn->connect_error);
}

$name = $_POST['name'];
$prenom = $_POST['prenom'];
$module = $_POST['module'];
$absence_count = $_POST['absence_count'];

$check_sql = "SELECT * FROM students WHERE name = '$name'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "ce nom deja existe";
} else {
    $sql = "INSERT INTO students (name, prenom, module, absence_count) VALUES ('$name', '$prenom', '$module', '$absence_count')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nouvel etudiant inscrit avec succes";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
