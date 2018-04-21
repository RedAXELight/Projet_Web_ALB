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

                <div class="span7">
                    Mots<!--Description de l'appart-->
                    <br>
                    <br>
                    <a href="index.php?action=vue_appartement_details">détails...</a>
                </div>
            </div>

            <?php if (@$_POST['erreur'] == 0){ ?>
            <div class="span12">
                <table class="table table-hover">
                    <?php foreach ($resultat as $appartement) {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                    } ?>
                <table>
            </div>
        <?php }else{
            echo "une erreur s'est produite !";
        } ?>

            <div class="span12">
                <hr/>
            </div>
        </div>
    </article>


<?php
$contenu = ob_get_clean();
require "gabarit.php";
