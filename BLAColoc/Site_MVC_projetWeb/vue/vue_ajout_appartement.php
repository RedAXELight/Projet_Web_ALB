<?php
ob_start();
$titre = 'BLAColoc - Ajout appartement';
?>
<h1>Ajouter un appartement :</h1>
<br/>
<?php
if (isset($erreur)){
    echo "<div class='alert alert-danger'>";
    echo $erreur;
    echo "</div>";
}
?>
<div class="rows">
    <div class="span9">
        <form class='form' enctype="multipart/form-data" method='POST' action="index.php?action=ajouter_appartement">
            <table class="table table-hover" style="width: 100%;"> <!-- variable formulaire : adresse, ddate, ville, fdate, description, pieces, AppImg -->
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">Adresse : </td>
                    <td><input style="margin-bottom: 0px; width: 60%;" type="text" name="adresse" value="<?=@$_POST['adresse'] ?>"/></td>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">Date de début : </td>
                    <td><input style="margin-bottom: 0px; width: 60%;" type="date" name="ddate" value="<?=@$_POST['ddate'] ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">Ville : </td>
                    <td><input style="margin-bottom: 0px; width: 60%;" type="text" name="ville" value="<?=@$_POST['ville'] ?>"></td>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">Date de fin : </td>
                    <td><input style="margin-bottom: 0px; width: 60%;" type="date" name="fdate" value="<?=@$_POST['fdate'] ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">NPA : </td>
                    <td><input style="margin-bottom: 0px; width: 60%;" type="number" name="NPA" value="<?=@$_POST['NPA'] ?>"></td>
                    <td style="text-align: center;vertical-align: middle; width: 20%;">Superficie [m²] : </td>
                    <td><input style="margin-bottom: 0px; width: 60%;" type="number" name="superficie" value="<?=@$_POST['superficie'] ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center;padding-top: 10px;width: 20%;">Description de l'appartement : </td>
                    <td colspan="3"><textarea class="form-control" style="min-width: 98%; resize: vertical;" rows="10" maxlength="1000" name="description"><?=@$_POST['description'] ?></textarea></td>
                </tr>
            </table>
        </div>
        <div class="span3">
            <table class="table table-bordered table-hover" style="width: 100%;">
                <tr>
                    <td>
                        Nombre de pièces :
                        <select name="pieces" value="<?=@$_POST['pieces'] ?>">
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
                            <option>6 1/2</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Prix/mois [CHF] : <input type="number" name="prix" value="<?=@$_POST['prix'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="MAX_FILE_SIZE" value="10000000">Insérer des images : <input type="file" name="AppImg[]" multiple/></td>
                </tr>
                <tr>
                    <td><input class="btn" type="submit" name="Valider"/>
                        <input class="btn" type="reset" name="Annuler"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php
    $contenu = ob_get_clean();
    require "gabarit.php";
