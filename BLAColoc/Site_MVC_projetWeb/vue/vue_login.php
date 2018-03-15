<?php
/**
 * Created by PhpStorm.
 * User: Brian Rodrigues Fraga
 * Date: 15.03.2018
 * Time: 11:15
 */

// tampon de flux stocké en mémoire
ob_start();
if (isset($_SESSION)) {
    $_SESSION = array();
    session_destroy();
}

$titre="BLAColoc - Login";
?>
<div class="container">
    <h2>Login / Logout</h2>

    <article>
        <?php
        if (isset($resultats))
        {
            // les données dans le formulaire sont exactes
            $ligne=$resultats->fetch();
            // Test pour savoir si on est vendeur ou client
            if (isset($ligne['idClient']))
            {
                echo "Bonjour ".$ligne['prenomClient']." ".$ligne['nomClient'].". Vous êtes bien connecté !";
                // Création de la session
                $_SESSION['login']=$ligne['prenomClient']." ".$ligne['nomClient'];
                $_SESSION['typeUser']="Client";
            }
            else
            {
				echo "Erreur de login";
            }
        }
        else
        {
            if (isset($_SESSION['login']))
            {
                session_destroy();
                header ("location:index.php");
            }
            ?>

            <form class='form' method='POST' action="index.php?action=vue_login">
                <table class="table table-hover ">
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
                            <input type="password" placeholder="Entrez votre mot de passe" name="fPass" value="<?=@$_POST['fPass'] ?>"/>
                        </td>
                    </tr>
                    <tr>
						<td><input class="btn" type="reset" value="Effacer"></td>
                        <td><input class="btn" type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>

        <?php } ?>
    </article>
    <hr/>
</div>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>