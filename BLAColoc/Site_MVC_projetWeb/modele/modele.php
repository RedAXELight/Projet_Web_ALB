<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:15
 * modifier par Brian et alexandre
 */


// ------------------------ Liste des Appartements-----------------------------


function liste_appartement()
{
    $dataFileAppartementPath = "JSon/Appartements.json";
    if (file_exists("$dataFileAppartementPath")) // the file already exists -> load it
    {
        $dataAppartements = json_decode(file_get_contents("$dataFileAppartementPath"));
        @$_POST['erreur'] = 0;
    }
    return $dataAppartements;
}

function recupinfoappart($idappart){
    $dataFileAppartementPath = "JSon/Appartements.json";
    if (file_exists("$dataFileAppartementPath")) // the file already exists -> load it
    {
        $dataAppartements = json_decode(file_get_contents("$dataFileAppartementPath"));
        $dataappart = $dataAppartements[$idappart-1];
    }
    return $dataappart;
}

function recupinfouser($idclient){
    $dataFileUsersPath = "JSon/Users.json";
    if (file_exists("$dataFileUsersPath")) // the file already exists -> load it
    {
        $dataclients = json_decode(file_get_contents("$dataFileUsersPath"));
        $dataclient = $dataclients[$idclient];
    }
    return $dataclient;
}

function nombreimageappart($idappart) {
    $directory = "./contenu/images/appartement/".$idappart."/";
    $filecount = count(glob($directory . "*.jpg"));
    return $filecount;
}

function addAppart(){

    $adresse = @$_POST['adresse'];
    $ddate = @$_POST['ddate'];
    $ville = @$_POST['ville'];
    $fdate = @$_POST['fdate'];
    $NPA = @$_POST['NPA'];
    $superficie = @$_POST['superficie'];
    $description = @$_POST['description'];
    $pieces = @$_POST['pieces'];
    $prix = @$_POST['prix'];

    $erreur = '0';
    if (@$_FILES['AppImg']['name'][0] == ''){$erreur = 'aucune <strong>image(s)</strong> a été séléctionné !';}
    if ($prix == ''){$erreur = 'le champ <strong>prix</strong> est incorrect !';}
    if ($pieces == ''){$erreur = 'le nombre de <strong>pièces</strong> entrée est incorrect !';}
    if ($description == ''){$erreur = 'le champ <strong>description</strong> est incorrect !';}
    if ($superficie == ''){$erreur = 'le champ <strong>superficie</strong> est incorrect !';}
    if ($NPA == ''){$erreur = 'le champ <strong>NPA</strong> est incorrect';}
    if ($fdate == ''){$erreur = 'le champ <strong>date de fin</strong> est incorrect !';}
    if ($ville == ''){$erreur = 'le champ ville est incorrect !';}
    if ($ddate == ''){$erreur = 'le champ date de début est incorrect !';}
    if ($adresse == ''){$erreur = 'le champ <strong>adresse</strong> est incorrect !';}


    if ($erreur == '0'){
      $dataFileAppartementPath = "JSon/Appartements.json";
      if (file_exists("$dataFileAppartementPath")) // the file already exists -> load it
      {
          try {
            // On essayes de récupérer le contenu existant
            $data = file_get_contents("$dataFileAppartementPath");

            if( !$data || strlen($data) == 0 ) {
                // On crée le tableau JSON
                $tableau_pour_json = array();
            } else {
                // On récupère le JSON dans un tableau PHP
                $tableau_pour_json = json_decode($data);
            }

              $id = count($tableau_pour_json);
              $id = $id + 1;

              //image(s) (source : https://antoine-herault.developpez.com/tutoriels/php/upload/)
              $erreur_img = 0;
              foreach ($_FILES["AppImg"]["name"] as $i => $pImage) {
                if ($erreur_img == 1){break;}
                $dossier = './contenu/images/appartement/'.$id.'/';
                $taille_maxi = 10000000; //en octet (mis 10 Mo)
                $fichier = basename($_FILES['AppImg']['name'][$i]);
                $extensions = array('.png', '.jpg', '.jpeg', '.JPG', '.JPEG', '.PNG');
                $extension = strrchr($_FILES['AppImg']['name'][$i], '.');
                $taille = filesize($_FILES['AppImg']['tmp_name'][$i]);
                //Début des vérifications de sécurité...
                if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                {
                  $erreur = 'Vous devez uploader un fichier de type png, jpg ou jpeg !';
                }
                if($taille>$taille_maxi) //Si la taille du fichier est plus grand que 10Mo
                {
                  $erreur = 'Le fichier est trop gros...';
                }
                if ($erreur == '0') //S'il n'y a pas d'erreur, on upload
                {
                  //On formate le nom du fichier ici...
                  $fichier = strtr($fichier,
                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                  $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                  mkdir($dossier, 0755, true);
                  if (move_uploaded_file($_FILES['AppImg']['tmp_name'][$i], $dossier . $i . $extension)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                  {
                    $erreur_img = 0;
                  } else //Sinon (la fonction renvoie FALSE).
                  {
                    $erreur_img = 1;
                  }
                }
              }

              if (($erreur_img == 0) && ($erreur == '0')){

              $tableau_pour_json = json_decode($data, true);

              $newappart = new stdClass();

              $newappart -> idAppartment = $id;
              $newappart -> aptAddress = $adresse;
              $newappart -> aptNPA = $NPA;
              $newappart -> aptCity = $ville;
              $newappart -> aptRooms = $pieces;
              $newappart -> aptSuperficy = $superficie;
              $newappart -> aptPrice = $prix;
              $newappart -> aptDescription = $description;
              $newappart -> aptBeginDate = $ddate;
              $newappart -> aptEndDate = $fdate;
              $newappart -> aptActive = 1;
              $newappart -> aptidClient = $_SESSION['idClient'];

              $tableau_pour_json [] = $newappart;

              // On réencode en JSON
              $contenu_json = json_encode($tableau_pour_json);

              // On stocke tout le JSON
              file_put_contents("$dataFileAppartementPath", $contenu_json);
            }
          }catch( Exception $e ) {
            echo "Erreur : ".$e->getMessage();
          }
        }
    }
    return $erreur;
  }
//}

// -----------------------------------------------------
// Fonctions liées aux utilisateurs

//login
function getLogin($post)
{
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $privatekey = "6Lc6L08UAAAAAJy7AtBX2RAnmSF37VC4elK928IC";
  $reponseAPI = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);

  $dataAPI = json_decode($reponseAPI);

  $type_error = 5;
  //5 = capcha non valide
  //4 = fichier intruvable
  //3 = aucune données trouvé
  //2 = aucun utilisateur trouvé
  //1 = password incorrect
  //0 = pas d'erreur

  if(isset($dataAPI->success) AND $dataAPI->success==true){
    $type_error = 4;
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
          if (password_verify(@$_POST['fPass'], $user->password)){    //($user->password == @$_POST['fPass'])
            $_SESSION['idClient'] = $user->idClients;
            $_SESSION['cltName'] = $user->cltName;
            $_SESSION['cltSurname'] = $user->cltSurname;
            $_SESSION['email'] = $user->email;
            $login_succes = 1;
            $type_error = 0;
          }
        }
      }
    }
  }
  return $type_error;
}

//inscription
function create_membre()
{
    //Source : Catarina et Johan
    //Modifier : Brian

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $privatekey = "6Lc6L08UAAAAAJy7AtBX2RAnmSF37VC4elK928IC";
    $reponseAPI = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);

    $dataAPI = json_decode($reponseAPI);

    if(isset($dataAPI->success) AND $dataAPI->success==true){
      $dataFileUsersPath = "JSon/Users.json";

      $nom = @$_POST['nom'];
      $prenom = @$_POST['prenom'];
      $adresse = @$_POST['adresse'];
      $ville = @$_POST['ville'];
      $npa = @$_POST['npa'];
      $email = @$_POST['email'];
      $telephone = @$_POST['telephone'];
      $login = @$_POST['login'];
      $password = @$_POST['password'];
      $confirm_password = @$_POST['confirm_password'];

      @$_POST['erreur'] = 0;

      if ($password != $confirm_password) {@$_POST['erreur'] = 1;}
      if ($password == ''){@$_POST['erreur'] = 10;}
      if ($login == ''){@$_POST['erreur'] = 9;}
      if (!is_numeric($telephone)){@$_POST['erreur'] = 8;}
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){@$_POST['erreur'] = 7;}
      if (($npa < 999) || ($npa > 100000)){@$_POST['erreur'] = 6;}
      if ($ville == ''){@$_POST['erreur'] = 5;}
      if ($adresse == ''){@$_POST['erreur'] = 4;}
      if ($prenom == ''){@$_POST['erreur'] = 3;}
      if ($nom == ''){@$_POST['erreur'] = 2;}

      if (@$_POST['erreur'] == 0){
        try {
          // On essayes de récupérer le contenu existant
          $data = file_get_contents("$dataFileUsersPath");

          if( !$data || strlen($data) == 0 ) {
              // On crée le tableau JSON
              $tableau_pour_json = array();
          } else {
              // On récupère le JSON dans un tableau PHP
              $tableau_pour_json = json_decode($data);
          }

          foreach ($tableau_pour_json as $user) {
              if ($login == $user->cltLogin){
                  @$_POST['erreur'] = 11;
              }
          }

          if (@$_POST['erreur'] == 0){
            $id = count($tableau_pour_json);
            $id = $id + 1;

            $tableau_pour_json = json_decode($data, true);

            $newmembre = new stdClass();

            $newmembre -> idClients = $id;
            $newmembre -> cltLogin = $login;
            $newmembre -> cltName = $nom;
            $newmembre -> cltSurname = $prenom;
            $newmembre -> email = $email;
            $newmembre -> password = password_hash($password, PASSWORD_DEFAULT);
            $newmembre -> cltAddress = $adresse;
            $newmembre -> cltNPA = $npa;
            $newmembre -> cltCity = $ville;
            $newmembre -> cltPhone = $telephone;

            $tableau_pour_json [] = $newmembre;

            // On réencode en JSON
            $contenu_json = json_encode($tableau_pour_json);

            // On stocke tout le JSON
            file_put_contents("$dataFileUsersPath", $contenu_json);
          }
        }catch( Exception $e ) {
          echo "Erreur : ".$e->getMessage();
        }
      }
    }else{
        @$_POST['erreur'] = 12;
    }
}

//Fonction de l'envoi de mail
function sendMail($datamail)
{
    ini_set('SMTP', 'smtp.sunrise.ch');//remplacer le nom du smtp
    $to = 'Alexandre.baseia@cpnv.ch'/*; Brian.rodrigues-fraga@cpnv.ch'*/;
    $subject = $datamail['sujet'];
    $from = $datamail['mail'];
    $message = $datamail['contactMessage'];
    $toSend = "Envoyé par : ".$from."\n..".$message;
    $toSend = mb_convert_encoding($toSend, "UTF-8");


    mail($to, $subject, $toSend);
}
