<?php
// tampon de flux stocké en mémoire
ob_start();
$titre="BLAColoc - Inscription";
?>

<div class="span12" id="divMain">
    <h1>Crée un compte</h1>
    <p>
    <?php if (@$_POST['erreur'] > 0){ ?>
      <div class="alert alert-danger">
        <?php if (@$_POST['erreur'] == 1){?>
          Les deux champs <strong>"mot de passe"</strong> ne se correspondent pas.
        <?php } if (@$_POST['erreur'] == 2){?>
          Le champ <strong>"Nom"</strong> ne peut pas être vide !
        <?php } if (@$_POST['erreur'] == 3){?>
          Le champ <strong>"Prénom"</strong> ne peux pas être vide !
        <?php } if (@$_POST['erreur'] == 4){?>
          Le champ <strong>"adresse"</strong> ne peut pas être vide !
        <?php } if (@$_POST['erreur'] == 5){?>
          Le champ <strong>"ville"</strong> ne peut pas être vide !
        <?php } if (@$_POST['erreur'] == 6){?>
          Le champ <strong>"NPA"</strong> doit être entre 1000 et 99999 !
        <?php } if (@$_POST['erreur'] == 7){?>
          <strong>L'email</strong> que vous avez saisi est incorrect !
        <?php } if (@$_POST['erreur'] == 8){?>
          Le champ <strong>téléphone</strong> que vous avez saisi est incorrect !
        <?php } if (@$_POST['erreur'] == 9){?>
          Le champ <strong>login</strong> ne peut pas être vide !
        <?php } if (@$_POST['erreur'] == 10){?>
          Le champ mot de passe ne peut pas être vide !
        <?php } if (@$_POST['erreur'] == 11){?>
          Ce <strong>login</strong> est déjà utilisé !
        <?php } if (@$_POST['erreur'] == 12){?>
          le <strong>captcha</strong> n'était pas valide.
        <?php }?>
      </div>
    <?php } ?>
    <form class="form" method="POST" action="index.php?action=enregistrer">
        <table class="table table-hover">
            <tr>
                <td>Nom : </td>
                <td><input type="text" placeholder="Entrez votre nom" name="nom" value="<?= @$_POST['nom']; ?>" required></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Prenom : </td>
                <td><input type="text" placeholder="Entrez votre prénom" name="prenom" value="<?= @$_POST['prenom']; ?>" required></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Adresse : </td>
                <td><input type="text" placeholder="Entrez votre adresse" name="adresse" value="<?= @$_POST['adresse']; ?>" required></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ville : </td>
                <td><input type="text" placeholder="Entrez votre ville" name="ville" value="<?= @$_POST['ville']; ?>" required></td>
                <td>NPA : </td>
                <td><input type="number" placeholder="1234" name="npa" min="1000" max="99999" value="<?= @$_POST['npa']; ?>" required></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" placeholder="Entrez votre email" name="email" value="<?= @$_POST['email']; ?>" required></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>N° de tél. : </td>
                <td><input type="tel" placeholder="Entrez votre téléphone" name="telephone" value="<?= @$_POST['telephone']; ?>" required></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Login : </td>
                <td><input type="text" placeholder="Entrez votre login" name="login" value="<?= @$_POST['login']; ?>" required></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td>
                    <?php if (isset($_POST['erreur'])) : ?>
                        <input type="password" placeholder="Entrez votre mot de passe" class="inputError" name="password" value="<?= @$_POST['password'];?>" required>
                    <?php else : ?>
                        <input type="password" placeholder="Entrez votre mot de passe" name="password" required>
                    <?php endif ?>
                </td>
                <td>Confirmer le mot de passe : </td>
                <td><input type="password" placeholder="Répétez le mot de passe" name="confirm_password" required>
            </tr>
            <tr>
                <td></td>
				<td><div class="g-recaptcha" data-sitekey="6Lc6L08UAAAAALOJt6xF1OIQY9AvrJ6_7H0K6a3Y"></div></td>
				<td></td>
				<td></td>
            </tr>
            <tr>
                <td><input class="btn" type="reset" value="Effacer"/></td>
                <td><input class="btn" type="submit" value="Confirmer"/></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
    </p>
</div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
