<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:15
 */

// ---------------------------------------------
// getBD()
// Fonction : connexion avec le serveur : instancie et renvoie l'objet PDO
// Sortie : $connexion

function getBD()
{
    // connexion au server de BD MySQL et à la BD
    $connexion = new PDO('mysql:host=localhost; dbname=snows', 'root', '');
    // permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;
}

// -----------------------------------------------------
// Fonctions liées aux snows

// getSnows()
// Fonction : Récupérer les données des snows
// Sortie : $resultats

function getSnows()
{
    // Connexion à la BD et au serveur
    $connexion = getBD();

    // Création de la string pour la requête
    $requete = "SELECT * FROM tblsurfs ORDER BY idsurf;";
    // Exécution de la requête
    $resultats = $connexion->query($requete);
    return $resultats;
}

// ------------------------ Sélection d'un snow --------------------

function getASnow($ID)
{
    $connexion = getBD();
    $requete = "SELECT * FROM tblsurfs WHERE idsurf='" . $ID . "';";
    $resultat = $connexion->query($requete);
    return $resultat;
}

// ------------------------ Ajouter un snow ------------------------

function addSnowDB()
{
    $connexion = getBD();
    $requete = "INSERT INTO tblsurfs (idsurf, marque, boots, type, disponibilite, statut) VALUES ('" . @$_POST['fID'] . "', '" . @$_POST['fMarque'] . "', '" . @$_POST['fBoots'] . "', '" . @$_POST['fType'] . "', '" . @$_POST['fDispo'] . "', '');";
    $resultat = $connexion->query($requete);
    return $resultat;
}

// -----------------------------------------------------
// Fonctions liées aux utilisateurs

// ---------------------------------------------------
// getLogin()
// Fonction : Récupérer les données du login du fichier JSON
// Sortie : $type_error

function getLogin($post)
{
    $type_error = 4;
    //4 = fichier intruvable
    //3 = aucune données trouvé
    //2 = aucun utilisateur trouvé
    //1 = password incorrect
    //0 = pas d'erreur

    $dataFileUsersPath = "JSon/Users.json";
    if (file_exists("$dataFileUsersPath")) // the file already exists -> load it
    {
        $dataUsers = json_decode(file_get_contents("$dataFileUsersPath"));
        $type_error = 3;
    }

    $login_succes = 0;
    if (isset($dataUsers)){
      $type_error = 2;
      foreach ($dataUsers as $user) {
        if($login_succes == 1){
          $type_error = 0;
        }
        if ($user->cltLogin == @$_POST['fLogin']){
          $type_error = 1;
          if ($user->password == @$_POST['fPass']){
            $_SESSION['idClient'] = $user->idClients;
            $_SESSION['cltName'] = $user->cltName;
            $_SESSION['cltSurname'] = $user->cltSurname;
            $_SESSION['email'] = $user->email;
            $login_succes = 1;
          }
        }
      }
    }
    return $type_error;
}
