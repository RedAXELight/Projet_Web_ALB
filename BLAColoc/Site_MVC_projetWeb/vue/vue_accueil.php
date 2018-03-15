<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:16
 * Updated : Nicolas.Glassey
 * Date : 14.02.2018
 */

// tampon de flux stocké en mémoire
ob_start();
$titre = "BLAColoc - Accueil";
?>

    <div class="span12" id="divMain">
        <h1>Nos activités</h1>

        <p><strong>BLAColoc</strong> est spécialisée dans la location d'appartement spécialement pour les étudiants :
        <ul>
            <li>des sobres au plus luxueux,
            <li>toujours à un prix abordable
        </ul>

        </p>


        <br/>
        <br/>

        <div class="row-fluid">
            <div class="span3">
                <div class="box">
                    <i class="icon-wrench"></i>
                    <h4 class="title">Entretien</h4>
                    <hr/>
                    <p>
                        L'appartement est toujours entretenu et nettoyé avant la location, cependant, si un entretien
                        des locataire n'est pas observé, une facture pour le temps supplémentaire sera envoyée.
                    </p>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <i class="icon-leaf"></i>
                    <h4 class="title">Environnement</h4>
                    <hr/>
                    <p>
                        Nous veillons à respecter l'environnement en utilisant au maximum du courant d'origine
                        renouvelable et pour utiliser des lumières dynamique afin d'economiser de l'énergie.
                    </p>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <i class="icon-edit"></i>
                    <h4 class="title">Contrat</h4>
                    <hr/>
                    <p>
                        Un contrat sera signé à chaque location. La durée de la location est définie avec le bailleur sur ledit contrat. D'autre part, nos appartements sont sous surveillance
                        vidéo a l'exterieur, afin de garantir votre sécurité.
                    </p>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <i class="icon-signal"></i>
                    <h4 class="title">Signal</h4>
                    <hr/>
                    <p>
                        Tous nos appartements sont reliés par fibre optique, il est donc garanti d'avoir une connexion
                        d'1Go/seconde !
                    </p>
                </div>
            </div>
        </div>

    </div>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
