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
            case 'vue_login' :
                login();
                break;
            case 'vue_contact' :
                contact();
                break;
            case 'vue_appartement' :
                appartement();
                break;
            case 'vue_appartement_details' :
                details();
                break;
            case 'vue_ajout_appartement' :
                ajouter_appartement();
				break;
            case 'vue_inscription' :
                inscription();
                break;
			case 'enregistrer' :
                enregistrer();
                break;
			case 'vue_ajout_appartement' :
                ajouter();
                break;
            case 'vue_profil' :
                profil();
                break;
            case 'contact' :
                mailsend();
				break;
            case 'enregistrer' :
                enregistrer();
                break;
            case 'ajouter_appartement' :
                ajout_appartement();
                break;
            default :
                throw new Exception("Action non valide");
        }
    } else
        accueil();
} catch (Exception $e) {
    erreur($e->getMessage());
}
