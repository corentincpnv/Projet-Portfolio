<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 16.04.2018
 * Time: 11:39
 * vue dans laquelle on verra des exemples de portfolio
 */
$titre ='Exemple Portfolio';
ob_start();
$res=aproposUtilisateur();
$fkPortfolio = $res['fkPortfolio'];
$firstNameApropos = $res['firstName'];
$lastNameApropos = $res['lastName'];
$postalCodeApropos = $res['postalCode'];
$addressApropos = $res['address'];
$addressNumberApropos = $res['addressNumber'];
$phoneNumberApropos = $res['phoneNumber'];
$mailAddressApropos = $res['mailAddress'];

$res=competencesUtilisateur();
$ambitiousQuality = $res['ambitious'];
$calmQuality = $res['calm'];
$confidentQuality = $res['confident'];
$disciplinedQuality = $res['disciplined'];
$discreetQuality = $res['discreet'];
$dynamicQuality = $res['dynamic'];
$methodicalQuality = $res['methodical'];
$optimistQuality = $res['optimist'];
$fastQuality = $res['fast'];
$sensibleQuality = $res['sensible'];
$tidyQuality = $res['tidy'];
$voluntaryQuality = $res['voluntary'];

$artInterest = $res['art'];
$litteratureInterest = $res['litterature'];
$cinemaInterest = $res['cinema'];
$sportInterest = $res['sport'];
$travelInterest = $res['travel'];
$musicInterest = $res['music'];
?>
    <div class="formulaire">
        <form>
            <table id="apropos">
                <input disabled="disabled" id="fkPortfolio" type="hidden" value="<?php echo $fkPortfolio; ?>">
                <tr>
                    <td>Nom :</td>
                    <td><input disabled="disabled" id="prenom" type="text" value="<?php echo $firstNameApropos; ?>" name="prenom"></td>
                </tr>
                <tr>
                    <td>Prénom :</td>
                    <td><input disabled="disabled" id="nom" type="text" value="<?php echo $lastNameApropos; ?>" name="nom"></td>
                </tr>
                <tr>
                    <td>Code postal :</td>
                    <td><input disabled="disabled" id="codepostal" type="text" value="<?php echo $postalCodeApropos; ?>" name="codepostal"></td>
                </tr>
                <tr>
                    <td>Adresse :</td>
                    <td><input disabled="disabled" id="address" type="text" value="<?php echo $addressApropos; ?>" name="address"></td>
                </tr>
                <tr>
                    <td>Numéro :</td>
                    <td><input disabled="disabled" id="numero" type="text" value="<?php echo $addressNumberApropos; ?>" name="numero"></td>
                </tr>
                <tr>
                    <td>Numéro de téléphone :</td>
                    <td><input disabled="disabled" id="numerodetelephone" type="text" value="<?php echo $phoneNumberApropos; ?>" name="numerodetelephone"></td>
                </tr>
                <tr>
                    <td>Adresse e-mail :</td>
                    <td><input disabled="disabled" id="email" type="text" value="<?php echo $mailAddressApropos; ?>" name="email"></td>
                </tr>
            </table>
            <div class="modifydroite">
                <fieldset id="competences">
                    <p id="competences"><label>Compétences :</label><br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="ambitieux" <?php echo ($ambitiousQuality==1 ? 'checked' : '');?> >Ambitieux<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="calme" <?php echo ($calmQuality==1 ? 'checked' : '');?> >Calme<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="confiant" <?php echo ($confidentQuality==1 ? 'checked' : '');?> >Confiant<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="discipline" <?php echo ($disciplinedQuality==1 ? 'checked' : '');?> >Discipliné<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="discret" <?php echo ($discreetQuality==1 ? 'checked' : '');?> >Discret<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="dynamique" <?php echo ($dynamicQuality==1 ? 'checked' : '');?> >Dynamique<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="methodique" <?php echo ($methodicalQuality==1 ? 'checked' : '');?> >Méthodique<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="optimiste" <?php echo ($optimistQuality==1 ? 'checked' : '');?> >Optimiste<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="rapide" <?php echo ($fastQuality==1 ? 'checked' : '');?> >Rapide<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="sensible" <?php echo ($sensibleQuality==1 ? 'checked' : '');?> >Sensible<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="soigneux" <?php echo ($tidyQuality==1 ? 'checked' : '');?> >Soigneux<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="volontaire" <?php echo ($voluntaryQuality==1 ? 'checked' : '');?> >Volontaire<br />
                    </p>
                </fieldset>
                <fieldset id="interets">
                    <p id="interets"><label>Intérets :</label><br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="art" <?php echo ($artInterest==1 ? 'checked' : '');?> >L'art<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="litterature" <?php echo ($litteratureInterest==1 ? 'checked' : '');?> >La littérature<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="cinema" <?php echo ($cinemaInterest==1 ? 'checked' : '');?> >Le cinéma<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="sport" <?php echo ($sportInterest==1 ? 'checked' : '');?> >Le sport<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="voyage" <?php echo ($travelInterest==1 ? 'checked' : '');?> >Le voyage<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="musique" <?php echo ($musicInterest==1 ? 'checked' : '');?> >La musique<br />
                    </p>
                </fieldset>
                <p id="buttons">
                    <input type="button" onclick='window.location.reload(false)' value="Autre Portfolio" />
                </p>
            </div>
        </form>
    </div>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
