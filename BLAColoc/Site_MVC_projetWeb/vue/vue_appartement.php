<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 12.05.2017
 * Time: 09:36
 * Updated : Nicolas.Glassey
 * Date : 14.02.2018
 */

ob_start();
$titre = 'BLAColoc - Nos appartements';

?>

    <article>
        <h1>Les appartements disponibles :</h1>

        <div class="row-fluid">
            <div class="span12">
                <hr/>
            </div>

            <div class="span12">
                <div class="span4">
                    Mots d'image<!--Image de l'appartement-->
                </div>
.
                <div class="span7">
                    Mots<!--Description de l'appart-->
                    <br>
                    <br>
                    <a href="index.php?action=vue_appartement_details">détails...</a>
                </div>

            </div>

            <div class="span12">
                <hr/>
            </div>
        </div>

    </article>


<?php
$contenu = ob_get_clean();
require "gabarit.php";
