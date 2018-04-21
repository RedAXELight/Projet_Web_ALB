<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 13.04.2018
 * Time: 22:03
 */

ob_start();
$titre = 'BLAColoc - Ajout appartement';
?>

<div class="rows">
  <div class="span9">
      <form>
    <table class="table table-hover" style="width: 100%;">

        <tr>
            <td style="text-align: center;vertical-align: middle; width: 20%;">Adresse : </td>
            <td><input style="margin-bottom: 0px; width: 60%;" type="text" name="adresse"></td>
            <td style="text-align: center;vertical-align: middle; width: 20%;">Date de début : </td>
            <td><input style="margin-bottom: 0px; width: 60%;" type="date" name="ddate"></td>
        </tr>

      <tr>
        <td style="text-align: center;vertical-align: middle; width: 20%;">Ville : </td>
        <td><input style="margin-bottom: 0px; width: 60%;" type="text" name="ville"></td>
        <td style="text-align: center;vertical-align: middle; width: 20%;">Date de fin : </td>
        <td><input style="margin-bottom: 0px; width: 60%;" type="date" name="fdate"></td>
      </tr>

      <tr>
        <td style="text-align: center;padding-top: 10px;width: 20%;">Description de l'appartement : </td>
        <td colspan="2"><textarea class="form-control" style="min-width: 98%; resize: vertical;" rows="10" maxlength="1000" name="message" id="contactMessageAppart"></textarea></td>
      </tr>

    </table>
  </div>
  <div class="span3">
    <table class="table table-bordered table-hover">

        <tr>
            <td>
                Nombre de pièces :
                <select>
                    <option>1</option>
                    <option>1 1/2</option>
                    <option>2</option>
                    <option>2 1/2</option>
                    <option>3</option>
                    <option>3 1/2</option>
                    <option>4</option>
                    <option>4 1/2</option>
                    <option>5</option>
                    <option>5 1/2</option>
                    <option>6</option>
                    <option>6 1/2</option>2
                </select>
            </td>
        </tr>
        <tr><td>Insérer des images : <input type="file" name="AppImg"/></td></tr>
        <tr>
            <td><input type="submit" name="Valider"/>
            <input type="reset" name="Annuler"/></td>
        </tr>
    </table>
      </form>
  </div>
</div>



<?php
$contenu = ob_get_clean();
require "gabarit.php";
