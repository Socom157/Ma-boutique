<?php 
    
    session_start(); 
    require_once "connexionB.php"; // inclut la connexion 
 
    if ($_SERVER["REQUEST_METHOD"] === "POST") { 
        $Identifiant = trim($_POST['identifiant']); 
        $password  = $_POST['motpass']; 
        
        // 1⃣ Préparer la requête 
        $sql  = "SELECT * FROM admin WHERE identifiants = ?";     
        $stmt = $conn->prepare($sql); 
        if (!$stmt) {         
            die("Erreur préparation : " . $conn->error); 
        }
        
        // 2⃣ Lier et exécuter 
        $stmt->bind_param("s", $Identifiant); 
        $stmt->execute(); 
        $result = $stmt->get_result(); 
 
            // 3⃣ Vérifier si l’utilisateur existe     
        if ($row = $result->fetch_assoc()) { 
            
 
            // 4⃣ Vérifier le mot de passe     
            if ($password===$row['motdepass']){ 
            
            header("Location: adminn.php"); // redirection             
            exit(); 
        } else {            
            echo "❌ Mot de passe incorrect."; 
        } 
    } else {         
        echo "❌ Matricule introuvable."; 
    } 
 
    $stmt->close(); 
        
    }
?> 