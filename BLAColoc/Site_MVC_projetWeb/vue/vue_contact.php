<?php
/**
 * Created by PhpStorm.
 * User: Alexandre.BASEIA
 * Date: 13.03.2018
 * Time: 10:09
 */
ob_start();
$titre="RentASnow - Contacts";
?>
    <div id="main">
        <!-- Post -->
        <article class="post">
            <header>
                <div class="title">
                    <h1>Un problème ? une requête ? Alors Contactez-nous!</h1>
                </div>
            </header>
            <form class="form" method="post" action="index.php?action=contact" enctype="multipart/form-data">
                <table class="table table-hover ">
                    <tr>
                        <td style="width: 15%">Votre e-mail : </td>
                        <td style="width: 30%"><input type="text" id="contactNom" name="mail"> </td>
                    </tr>
                    <tr>
                        <td style="width: 15%">Sujet : </td>
                        <td style="width: 30%"><input type="text" id="contactSujet" name="sujet"></td>
                    </tr>
                    <tr>
                        <td style="width: 15%">Votre message : </td>
                        <td style="width: 80%"><textarea class="form-control" style="min-width: 80%; resize: vertical;" rows="10" maxlength="1000" name="message" id="contactMessage"></textarea></td>
                    </tr>
                    <tr>
                        <td style="width: 15%"><input class="btn" value="Effacer" type="reset"></td>
                        <td style="width: 30%"><input class="btn" value="Envoyer" type="submit" id="contactSubmit"></td>
                    </tr>
                </table>
            </form>
        </article>
    </div>
<?php
$contenu = ob_get_clean();
require "gabarit.php";
