<?php
    require_once "connexionB.php";
    $host = "localhost"; 
    $user = "root"; 
    $pass = ""; 
    $db = "espaceadmin"; 
 
    $conn = new mysqli($host, $user, $pass, $db); 
 
    if ($conn->connect_error) {     
        die("Erreur connexion: " . $conn->connect_error); 
    } 

if (isset($_POST['ref'])) {
    $ref = trim($_POST['ref']); 
    $sql = "DELETE FROM enregistrement WHERE ref = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ref);

    if ($stmt->execute()) {
        echo "✅ Produit supprimé avec succès.";
    } else {
        echo "❌ Erreur lors de la suppression : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "⚠ Aucune Référence fourni.";
}

$conn->close();
?>
