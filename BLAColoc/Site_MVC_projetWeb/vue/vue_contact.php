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
                    <h1>Un problème, une requête contactez-nous!</h1>
                </div>
                <hr>
            </header>
            <form method="post" action="index.php?action=vue_contact&msg=<font style:'text-decoration:underline, color=red'>Le message a bien été envoyé!</h3></font>" enctype="multipart/form-data">
                <table>
                    <tr>
                            <td>Votre e-mail:</td>
                            <td><input type="text" id="contactNom" name="mail"> </td>
                    </tr>
                    <tr>
                        <td>Sujet: </td>
                        <td><input type="text" id="contactSujet" name="sujet"></td>
                    </tr>
                    <tr>
                        <td>Votre message: </td>
                        <td><textarea rows="10" cols="50" name="message" id="contactMessage"></textarea> </td>
                    </tr>
                </table>
                <input type="reset">
                <input type="submit" id="contactSubmit">
            </form>
        </article>
    </div>
<?php
$contenu = ob_get_clean();
require "gabarit.php";