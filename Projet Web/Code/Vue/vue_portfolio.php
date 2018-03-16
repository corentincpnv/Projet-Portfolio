<?php
$titre ='Portfolio';
ob_start();
$res=aproposUtilisateur();
$firstNameApropos = $res['firstName'];
$lastNameApropos = $res['lastName'];
$postalCodeApropos = $res['postalCode'];
$addressApropos = $res['address'];
$addressNumberApropos = $res['addressNumber'];
$phoneNumberApropos = $res['phoneNumber'];
$mailAddressApropos = $res['mailAddress'];
?>
    <div class="formulaire">
        <form method="post" action="" >
            <table id="apropos">
                <tr>
                    <td>Nom :</td>
                    <td><input id="prenom" type="text" value="<?php echo $firstNameApropos; ?>" name="prenom"></td>
                </tr>
                <tr>
                    <td>Prénom :</td>
                    <td><input id="nom" type="text" value="<?php echo $lastNameApropos; ?>" name="nom"></td>
                </tr>
                <tr>
                    <td>Code postal :</td>
                    <td><input id="codepostal" type="text" value="<?php echo $postalCodeApropos; ?>" name="codepostal"></td>
                </tr>
                <tr>
                    <td>Adresse :</td>
                    <td><input id="address" type="text" value="<?php echo $addressApropos; ?>" name="address"></td>
                </tr>
                <tr>
                    <td>Numéro :</td>
                    <td><input id="numero" type="text" value="<?php echo $addressNumberApropos; ?>" name="numero"></td>
                </tr>
                <tr>
                    <td>Numéro de téléphone :</td>
                    <td><input id="numerodetelephone" type="text" value="<?php echo $phoneNumberApropos; ?>" name="numerodetelephone"></td>
                </tr>
                <tr>
                    <td>Adresse e-mail :</td>
                    <td><input id="email" type="text" value="<?php echo $mailAddressApropos; ?>" name="email"></td>
                </tr>
            </table>
            <div class="modifydroite">
                <fieldset id="competences">
                    <p id="competences"><label>Compétences :</label><br />
                        <input type="checkbox" name="competences[]" value="ambitieux" />Ambitieux<br />
                        <input type="checkbox" name="competences[]" value="calme" />Calme<br />
                        <input type="checkbox" name="competences[]" value="confiant" />Confiant<br />
                        <input type="checkbox" name="competences[]" value="discipline" />Discipliné<br />
                        <input type="checkbox" name="competences[]" value="discret" />Discret<br />
                        <input type="checkbox" name="competences[]" value="dynamique" />Dynamique<br />
                        <input type="checkbox" name="competences[]" value="methodique" />Méthodique<br />
                        <input type="checkbox" name="competences[]" value="optimiste" />Optimiste<br />
                        <input type="checkbox" name="competences[]" value="rapide" />Rapide<br />
                        <input type="checkbox" name="competences[]" value="sensible" />Sensible<br />
                        <input type="checkbox" name="competences[]" value="soigneux" />Soigneux<br />
                        <input type="checkbox" name="competences[]" value="volontaire" />Volontaire<br />
                    </p>
                </fieldset>
                <fieldset id="interets">
                    <p id="interets"><label>Intérets :</label><br />
                        <input type="checkbox" name="interets[]" value="art" />l'art<br />
                        <input type="checkbox" name="interets[]" value="litterature" />La littérature<br />
                        <input type="checkbox" name="interets[]" value="cinema" />Le cinéma<br />
                        <input type="checkbox" name="interets[]" value="sport" />Le sport<br />
                        <input type="checkbox" name="interets[]" value="voyage" />Le voyage<br />
                        <input type="checkbox" name="interets[]" value="musique" />La musique<br />
                    </p>
                </fieldset>
                <p id="buttons">
                    <input type="submit" value="Envoyer" />
                    <input type="reset" value="Recommencer" />
                </p>
            </div>
        </form>
    </div>
<?php
$contenu = ob_get_clean();
require "gabarit.php";