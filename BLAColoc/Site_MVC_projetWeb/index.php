<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 11:25
 * Updated : Brian Rodrigues Fraga
 * Date : 15.03.2018
 */

session_start();
require "controleur/controleur.php";

try {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'vue_accueil' :
                accueil();
                break;
            case 'vue_snows' :
                snows();
                break;
            case 'vue_login' :
                login();
                break;
            case 'vue_contact' :
                contact();
                break;

            default :
                throw new Exception("Action non valide");
        }
    } else
        accueil();
} catch (Exception $e) {
    erreur($e->getMessage());
}