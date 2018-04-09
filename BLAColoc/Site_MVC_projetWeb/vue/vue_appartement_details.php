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

            <div class="span12">
                <div class="span4">
                    Mots d'image<!--Image de l'appartement-->
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
