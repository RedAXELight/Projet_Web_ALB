<?php
/**
 * Created by PhpStorm.
 * User: Alexandre.BASEIA
 * Date: 27.03.2018
 * Time: 11:17
 */

ob_start();
$titre = 'BLAColoc - ';//ajouter dynamiquement le nom de l'appart

?>


    <article>
        <h1>Nom de l'appartement</h1>

        <div class="row-fluid">
            <div class="span12">
                <hr/>
            </div>

            <!-- ________ SLIDER_ Appartements____________-->


            <div class="camera_full_width">

                <div id="camera_wrap">
                    <div data-src="contenu/slider-images/1.jpg">
                        <!--Pas oublier de lier les images du slider avec l'appart concerné -->
                    </div>

                    <div data-src="contenu/slider-images/2.jpg">
                    </div>

                    <div data-src="contenu/slider-images/3.jpg">
                    </div>

                </div>
                <br style="clear:both"/>
                <div style="margin-bottom:40px"></div>
            </div>

            <div id="headerSeparator2"></div>
            <!-- ________ SLIDER_____________-->

            <div class="span6"
            <table style="font-weight: bold">
                <td>CP :</td>
                <td>Ville :</td>
                <td>Adresse :</td>
                <td>Nombre de pièces :</td>
            </table>
        </div>
        <div class="span10">
            <pre><!--Description de l'appartement--></pre>
        </div>

        <div class="span10">
            <table class="table-bordered">
               <th style="font-weight: bold" style="width: 15%">Contacter l'annonceur :</th>
                <tr>
                    <td style="width: 15%">Votre e-mail : </td>
                    <td style="width: 30%"><input type="text" id="contactNom" name="mail"> </td>
                    <td style="width: 30%"><input class="btn" value="Envoyer" type="submit" id="contactSubmit"></td>
                </tr>
                <tr>
                    <td style="width: 15%">Votre message : </td>
                    <td style="width: 80%"><textarea class="form-control" style="min-width: 100%; resize: vertical;" rows="10" maxlength="1000" name="message" id="contactMessageAppart"></textarea></td>
                </tr>
            </table>

            <div class="span2" align="right">
                <table class="table-bordered">
                    <tr>
                        <td>Infos relatives à l'annonceur</td>
                    </tr>
                </table>
            </div>
        </div>
    </article>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
