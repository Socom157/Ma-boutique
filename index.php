<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma boutique</title>
  <link rel="stylesheet" href="index.css"> 
</head>
<body >

  
 
  <header>
    <p class="titre">Ma boutique en ligne</p>
    <nav>
      <ul class="menuUl">
        <li ><a href="http://localhost:8081/vitrine%20commerce/index.php" class="active">Accueil</a></li>
        <li ><a href="http://localhost:8081/vitrine%20commerce/contact.html" class="menuliste">Contact</a></li>
        <li ><a href="http://localhost:8081/vitrine%20commerce/connexion.html" class="menuliste">Connexion</a></li>
      </ul>
    </nav> 
  </header>
  <section>
    <h1>Nos Articles</h1>
    <?php 
        $conn = new mysqli("localhost", "root", "", "espaceadmin"); 
 
        $sql = "SELECT * FROM enregistrement ORDER BY categorie,ref DESC"; 
        $result = $conn->query($sql); 
        $currentcategorie="";
    ?> 
    <div class="Categorie">
      
      <?php while($row = $result->fetch_assoc()): ?>
      <?php
        if($currentcategorie != $row['categorie']){
          if($currentcategorie != ""){
            echo "</div>";
          }
          $es=" ";
          $cat="Catégorie";
          $currentcategorie=$row['categorie'];
          echo "<h3>".$cat.$es.$currentcategorie."</h3>";
          
          echo "<div style='display: flex;border-top: 1px solid rgb(145, 79, 4);border-bottom: 1px solid rgb(145, 79, 4);
            padding-top: 1vh;margin-top: 0;flex-wrap: nowrap;overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: thin;'>";
        }
      ?> 

        <div class="article">    
          <img src="<?php echo $row['image']; ?>" alt="">
          <p class="Prix"><?php echo $row['nom']; ?><?php echo $row['prix']; ?> FCFA</p>
          <button><a href="http://localhost:8081/vitrine%20commerce/contact.html" class="aa">contactez nous</a></button>   
        </div>
        <?php endwhile; ?> 
        
      </div>
      
    </div>
    
  </section>
  <footer>

  </footer>
  <script></script>
</body>
</html>




