<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
    <title>paul vincent Resume</title>
    <link rel="stylesheet" href="resume.css">
    <script type="text/javascript">
    function validationFormulaire() {
        var x = document.forms["formContact"]["messageContact"].value;
        if (x == null || x == "") {
            alert("Vous avez oublié d'insérer un message");
            return false;
        }
    }
    </script>
</head>
<body>
    Contact
    <?php

    if ( isset($_POST["envoie"]) ) {
        if ( $_POST["message"]=='' || !isset($_POST["message"]) ) {
            echo "veuillez remplir le champ message";
        }
        else{
            mail('paul.vincent162@gmail.com','coucou MDS', $_POST["message"]);
            echo'Message envoyé, merci !';

            if(isset($_POST["autorise"])){
                if(!isset($_POST['mail'])) {
                    $_POST['mail']='';
                }
                $adresseMail = $_POST['mail'];
                $db = new PDO('mysql:host=exmachinefmci;charset=utf-8','exmachinefmci', 'carp310M');
                $result = $db->prepare('INSERT INTO mailPaul (mail) VALUES (:adresseMail)');
                $result->execute(array('adresseMail'=> $adresseMail));
            }
        }
    }
    ?>
    
    
    <h1>Parchemin de contact</h1>

    
    <form name="formContact" onsubmit="return validationFormulaire()" enctype="application/x-www-form-urlencoded" method="post" action="#">
        Monsieur <input type="radio" name="civ">
        Madame <input type="radio" name="civ">
        <br>
        <br>
        Nom:<br>
        <input type="text"><br>
        <br>
        Adresse mail:<br>
        <input type="email" name="email"><br>
        <br>
        T&eacute;l&eacute;phone:<br>
        <input type="tel"><br>
        <br>
        Pays :
        <select>
            <option>FR</option>
            <option>UK</option>
            <option>BE</option>
        </select>
        <br>
        <br>
        Message:<br>
        <textarea id="form-textarea" name="messageContact"></textarea><br>
        <br>
        <input type="checkbox" name="autorize"> Je vous autorise &agrave; conserver ces coordonn&eacute;es<br>
        <br>
        <input type="submit" name="envoie" value="Envoyer">
        <br>
        <br>
        <a href="index.html"><strong>Retour</strong></a>
    </form>

</body>
</html>