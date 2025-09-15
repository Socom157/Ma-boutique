<?php 
        $host = "localhost"; 
        $user = "root"; 
        $pass = ""; 
        $db   = "espaceadmin"; // ⚠ mets le nom exact de ta BD 
 
        $conn = new mysqli($host, $user, $pass, $db); 
 
        if ($conn->connect_error) {     die("Échec connexion : " . $conn->connect_error); 
        } 
?> 
