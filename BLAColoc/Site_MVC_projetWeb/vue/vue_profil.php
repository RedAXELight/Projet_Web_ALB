<?php
/**
 * Created by PhpStorm.
 * User: AlexAndrE.BaseIa
 * Date: 20.03.2018
 * Time: 10:10
 */

ob_start();
$titre = "BLAColoc - Profil";
?>

    <div class="rows">
        <div class="span9">
            <table class="table table-hover" style="width: 100%;">
                <tr>
                    <th height="26" colspan="2" style="font-weight: bold ; font-size: large">Votre profil</th>
                </tr>
                <tr>
                    <td width="129" rowspan="5"><img src="..\contenu\images\Logo.png" width="129" height="129" alt="no image found"/></td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">
                        <div align="left">Prenom :</div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">
                        <div align="left">Nom :</div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">
                        <div align="left">Sexe :</div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">
                        <div align="left">Adresse :</div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">
                        <div align="left">Mail :</div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">
                        <div align="left">Appartements :</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>