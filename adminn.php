<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace admin</title>
    <link rel="stylesheet" href="./admin.css">
</head>
<body>
    
    <p class="phr1">VOUS ÊTES CONNECTER A L'ESPACE ADMINISTRATEUR</p>
    <a href="http://localhost:8081/vitrine%20commerce/index.php" class="retour">retour a l'accueil</a>
    <div class="actions">
        <button class="button1" id="ajout">Ajouter un prouit</button>
        <button class="button2" id="suprim">Supprimer un produit</button>
    </div>
    <form action="./admin.php" id="form1" method="post" enctype="multipart/form-data">
        <button class="quitter" id="fermer">Fermer</button>
        <label for="N">Nom:</label>
        <input type="text" name="nom" id="N" placeholder="Nom du prouit..." required>
        <label for="C">Catégorie:</label>
        <input type="text" name="categorie" id="C" placeholder="Catégorie du produit..." required>
        <label for="P">Prix:</label>
        <input type="number" name="prix" id="P" placeholder="Prix de vente...">
        <label for="Ph">Image du produit:</label>
        <input type="file" name="image" accept="image/*" id="" required>
        <input type="submit" value="Ajouter" class="submit">
    </form>
    <form action="./suprim.php" id="form2" method="POST">
        <button  class="quitter" id="fermer">Fermer</button>
        <input type="number" name="ref" id="ref" placeholder="reference du produit" required >
        <button type="submit" class="submit2" name="supprimer">supprimer</button>
    </form>
    
    <section>
        <h3>PRODUITS AJOUTER</h3>
        <table>
            <tr>
                <th>ref</th>
                <th>image</th>
                <th>nom</th>
                <th>catécorie</th>
                <th>Prix</th>
            </tr>
            <?php 
                include "connexionB.php";
                
                $sql = "SELECT * FROM enregistrement ORDER BY ref DESC"; 
                $result = $conn->query($sql); 
                $currentref="";
            ?> 
            <?php while($row = $result->fetch_assoc()): ?>
            <?php
                if($currentref = $row['ref']){
                    if($currentref != ""){
                        echo "</tr>";
                    }
                    $currentref=$row['ref'];
                
                }
            ?> 
            <td style='border-bottom: 1px solid rgb(145, 79, 4);'><?php echo $currentref ?></td>
            <td style='border-bottom: 1px solid rgb(145, 79, 4);'><?php echo $row['image']; ?></td>
            <td style='border-bottom: 1px solid rgb(145, 79, 4);'><?php echo $row['nom']; ?></td>
            <td style='border-bottom: 1px solid rgb(145, 79, 4);'><?php echo $row ['categorie'] ?></td>
            <td style='border-bottom: 1px solid rgb(145, 79, 4);'><?php echo $row['prix']; ?> FCFA</td>
        
            <?php endwhile; ?>
        </table>  
    </section>

    <script src="./admin.js"></script>
</body>
</html>