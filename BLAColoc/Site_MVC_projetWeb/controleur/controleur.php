<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:10
 * Updated : Brian Rodrigues Fraga
 * Date : 15.03.2018
 */

require "modele/modele.php";

// Affichage de la page de l'accueil
function accueil()
{
  require "vue/vue_accueil.php";
}

function contact()
{
    require "vue/vue_contact.php";
}

//Affichage de la page contact

function erreur($e)
{
  $_SESSION['erreur']=$e;
  require "vue/vue_erreur.php";
}

// ----------------- Fonctions en lien avec login -------------------------

function login(){
    if (isset ($_POST['fLogin']) && isset ($_POST['fPass'])) {
        $resultat = getLogin($_POST);
        if($resultat == 0){
          $idClient = $_SESSION['idClient'];
          $cltName = $_SESSION['cltName'];
          $cltSurname = $_SESSION['cltSurname'];
          $email = $_SESSION['email'];
        }
        require "vue/vue_login.php";
    } else {
        // détruit la session de la personne connectée après appuyé sur Logout
        if (isset($_SESSION['login'])) {
            session_destroy();
            require "vue/vue_accueil.php";
        } else
            require "vue/vue_login.php";
    }
}

function inscription()
{
    require 'vue/vue_inscription.php';
}

function enregistrer()
{
    create_membre();
    if (@$_POST['erreur'] > 0){
      require 'vue/vue_inscription.php';
    }else{
      $resultat = 0;
      require "vue/vue_login.php";
    }
}

function profil(){
    require "vue/vue_profil.php";
}
// ----------------- Fonctions en lien avec les appartements ---------------------

function appartement()
{
  require 'vue/vue_appartement.php';
}

function details()
{
    require 'vue/vue_appartement_details.php';
}

function ajouter()
{
    require 'vue/vue_ajout_appartement.php';
}