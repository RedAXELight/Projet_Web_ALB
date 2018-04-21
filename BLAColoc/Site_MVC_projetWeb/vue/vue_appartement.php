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
                <table class="table table-hover">
                    <?php
                    if (@$_POST['erreur'] == 0){
                    foreach ($liste as $appart) {
                      echo "<tr><td style='width: 30%;'>";
                      echo "<img src='./contenu/images/appartement/".$appart->idAppartment."/0.jpg'>";
                      echo "</td><td style='width: 40%;'>";
                      echo "<strong>Ville : </strong>".$appart->aptCity." - ".$appart->aptNPA."<br/>";
                      echo "<strong>Adresse : </strong>".$appart->aptAddress."<br/>";
                      echo "<strong>Date : </strong>".$appart->aptBeginDate." - ".$appart->aptEndDate."";
                      echo "</td><td style='width: 30%;'>";
                      echo "<a href='index.php?action=vue_appartement_details&id=".$appart->idAppartment."'>Détail...</a>";
                      echo "</tr></td>";
                    }
                }else{
                    echo "une erreur s'est produite !";
                }
                    ?>
                </table>
                <hr/>
            </div>
        </div>
    </article>


<?php
$contenu = ob_get_clean();
require "gabarit.php";
?>
