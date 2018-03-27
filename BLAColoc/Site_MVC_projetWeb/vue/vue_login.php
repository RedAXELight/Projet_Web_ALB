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
    <h2>Login / Logout</h2>
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
                if ($resultat == 4){
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
                else {
                  echo "Une erreur inconnu s'est produit.";
                }
              }
            ?>

            <form class='form' method='POST' action="index.php?action=vue_login">
                <table class="table table-hover">
                    <tr>
                        <td scope="row">Login</td>
                        <td>
                            <input type="text" placeholder="Entrez votre login" name="fLogin" value="<?=@$_POST['fLogin'] ?>"/>
                            <!-- code php pour éviter de retaper le contenu en cas d'erreur -->
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Mot de passe</td>
                        <td>
                            <input type="password" placeholder="Entrez votre mot de passe" name="fPass" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="btn" type="submit" value="Login"><input class="btn" type="reset" value="Effacer"></td>
                        <td></td>
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
