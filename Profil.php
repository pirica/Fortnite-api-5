<?php
$pseudo = '';
if(isset($_GET['envoyer'])){
    $pseudo = $_GET['pseudo'];

    /* Récupération du contenu du fichier .json */
    $contenu_fichier_json = file_get_contents('https://fortnite-api.com/v1/stats/br/v2/?name='.$pseudo);
    /* Les données sont récupérées sous forme de tableau (true) */
    $tr = json_decode($contenu_fichier_json, true);
}
?>
 
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Test json</title>
        <meta name="description" content=" Je teste json">
    </head>
 
    <body>

        <h1>Boujour <?php echo $pseudo; ?></h1>

        <form action="" method="get">
            <input type="text" name="pseudo" value="" placeholder="Entrez votre pseudo" />
            <input type="submit" name="envoyer" value="Envoyer" />
        </form>

        <?php 

        if(isset($tr)) {
        ?>

        <div class="level">
            <p>Bonjour</p> <?= $tr['data']['account']['name'].'<br>' ?> 
            <p>Tu es niveau : </p> <?= $tr['data']['battlePass']['level'].'<br>' ?>
            <p>Progression :</p><?= $tr['data']['battlePass']['progress'].'<br>' ?>
        </div>

        <?php 
        }
        ?>
    </body>
</html>