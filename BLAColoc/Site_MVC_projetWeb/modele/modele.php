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
    //require_once "recaptchalib.php";

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
