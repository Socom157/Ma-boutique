<?php 
require_once "connexionB.php";

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db   = "espaceadmin"; 

$conn = new mysqli($host, $user, $pass, $db);

// Vérifier connexion 
if ($conn->connect_error) {     
    die("Erreur connexion: " . $conn->connect_error); 
} 

// Récupération des champs texte
$nom       = $_POST['nom']; 
$prix      = $_POST['prix']; 
$categorie = $_POST['categorie']; 

// Vérifier qu'une image est envoyée
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    // Créer le dossier s'il n'existe pas
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // Renommer l'image pour éviter les doublons
    $fileName = uniqid() . "_" . basename($_FILES["image"]["name"]);
    $chemin   = "uploads/" . $fileName;

    // Déplacer le fichier
    if (move_uploaded_file($_FILES['image']['tmp_name'], $chemin)) {
        // Préparer la requête SQL
        $sql = "INSERT INTO enregistrement (image, nom, categorie, prix) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $chemin, $nom, $categorie, $prix);

        if ($stmt->execute()) {     
            echo "✅ Produit ajouté avec succès";
            header("Location: adminn.php");
            exit;
        } else {     
            echo "❌ Erreur SQL : " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ Erreur lors de l'upload de l'image.";
    }
} else {
    echo "⚠ Aucune image envoyée.";
}

$conn->close();
?>
