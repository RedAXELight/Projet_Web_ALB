<?php
/**
 * Created by PhpStorm.
 * User: AlexAndrE.BaseIa
 * Date: 20.03.2018
 * Time: 10:10
 */

ob_start();
$titre="BLAColoc - Profil";
?>








<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>