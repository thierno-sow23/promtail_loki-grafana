<?php
// Configuration de la base de données
$host = 'mysql';  // Utilise 'mysql' comme nom de service MySQL dans Docker
$dbname = 'mydatabase';
$username = 'root';
$password = 'password';

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération des données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];

// Préparation de la requête d'insertion
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

// Exécution de la requête
if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>
