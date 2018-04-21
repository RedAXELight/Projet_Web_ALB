<?php
/**
 * Created by PhpStorm.
 * User: Brian Rodrigues Fraga
 * Date: 15.03.2018
 * Time: 11:15
 */

// tampon de flux stocké en mémoire
ob_start();


$titre="BLAColoc - Login";
?>
<div>
    <h2>Login</h2>
    <article>
        <?php
        //Si la session est active = déconnecter
        if (isset($_SESSION['active']))
        {
            $_SESSION = array();
            session_destroy();
            header ("location:index.php");
        }

        //Si le login est correct = passe la session active
            if (isset($_SESSION['idClient']))
            {
                echo "Bonjour ".$_SESSION['cltSurname']." ".$_SESSION['cltName'].". Vous êtes bien connecté !";
                $_SESSION['active'] = 1;
            }
            else
            {
              if(isset($resultat)){
                if ($resultat > 0){
                echo "<div class='alert alert-danger'>";
                }
                if ($resultat == 5) {
                  echo "le <strong>captcha</strong> n'était pas valide.";
                }
                elseif ($resultat == 4){
                  echo "Fichier introuvable !";
                }
                elseif ($resultat == 3){
                  echo "Impossible de lire le fichier !";
                }
                elseif ($resultat == 2) {
                  echo "Ce login n'existe pas.";
                }
                elseif ($resultat == 1) {
                  echo "Le mot de passe est incorrect.";
                }
                elseif ($resultat == 0) {
                  echo "<div class='alert alert-success'>";
                  echo "Vous vous êtes bien inscrit ! Vous pouvez vous connecter à présent.";
                  echo "</div>";
                }
                else {
                  echo "Une erreur inconnu s'est produit.";
                }
                if ($resultat > 0){
                echo "</div>";
                }
              }


            ?>

            <form class='form' method='POST' action="index.php?action=vue_login">
                <table class="table table-hover">
                    <tr>
                        <td scope="row">Login</td>
                        <td>
                            <input type="text" placeholder="Entrez votre login" name="fLogin" value="<?=@$_POST['fLogin'] ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Mot de passe</td>
                        <td><input type="password" placeholder="Entrez votre mot de passe" name="fPass" value=""/></td>
                    </tr>
                    <tr>
						<td></td>
                        <td><div class="g-recaptcha" data-sitekey="6Lc6L08UAAAAALOJt6xF1OIQY9AvrJ6_7H0K6a3Y"></div></td>
                    </tr>
                    <tr>
                        <td><input class="btn" type="reset" value="Effacer"></td>
                        <td><input class="btn" type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>

        <?php } ?>
    </article>

</div>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
