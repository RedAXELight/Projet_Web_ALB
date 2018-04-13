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



<h1>Nom de l'appartement</h1>
<hr/>
<div class="row-fluid">
  <!-- ________ SLIDER_ Appartements____________-->
  <div class="camera_full_width">
    <div id="camera_wrap">
      <div data-src="contenu/slider-images/1.jpg">
        <!--Pas oublier de lier les images du slider avec l'appart concerné -->
      </div>
      <div data-src="contenu/slider-images/2.jpg">
      </div>
      <div data-src="contenu/slider-images/3.jpg">
      </div>
    </div>
    <br style="clear:both"/>
    <div style="margin-bottom:40px"></div>
  </div>
  <div id="headerSeparator2"></div>
</div>
<!-- ________ details appartement_____________-->
<table class="table table-bordered">
  <tr>
    <td style="width: 25%;"><strong>Nombre de pièces :</strong> 5.5</td>
    <td style="width: 25%;"><strong>Adresse :</strong> Route de la choucroute 69</td>
    <td style="width: 25%;"><strong>Ville :</strong> Corcelles-près-Payerne</td>
    <td style="width: 25%;"><strong>CP :</strong> 1562</td>
  </tr>
</table>
<h4>Description : </h4>
<pre>Description blapoaijgropiajergeoagrij<!--Description de l'appartement--></pre>
<br/>
<!-- asdf -->
<div class="rows">
  <div class="span9">
    <table class="table table-hover" style="width: 100%;">
      <tr>
        <th colspan="3">
          <h3>Contacter l'annonceur :</h3>
        </th>
      </tr>
      <tr>
        <td style="text-align: center;vertical-align: middle; width: 20%;">Votre e-mail : </td>
        <td><input style="margin-bottom: 0px; width: 60%;" type="text" name="mail"></td>
        <td style="text-align: center;"><input class="btn" value="Envoyer" type="submit" id="contactSubmit"></td>
      </tr>
      <tr>
        <td style="text-align: center;padding-top: 10px;width: 20%;">Votre message : </td>
        <td colspan="2"><textarea class="form-control" style="min-width: 98%; resize: vertical;" rows="10" maxlength="1000" name="message" id="contactMessageAppart"></textarea></td>
      </tr>
    </table>
  </div>
  <div class="span3">
    <table class="table table-bordered table-hover">
        <tr>
          <th class="text-center"><h4><strong>Infos de utilisateur :</strong></h4></th>
        </tr>
        <tr><td>Nom Prénom</td></tr>
        <tr><td>Email</td></tr>
        <tr><td>N° téléphone (faculatif)</td></tr>
        <tr><td>Date du début</td></tr>
        <tr><td>Date du fin</td></tr>
    </table>
  </div>
</div>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
