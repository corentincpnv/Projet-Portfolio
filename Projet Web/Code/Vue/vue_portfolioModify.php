<?php
$titre ='Modifier Portfolio';
ob_start();
?>
<div class="formulaire">
    <div method="post" action="vue_portfolio.php">
            <fieldset id="apropos">
                <label>Nom : </label>
                <input type="text" name="nom" size="30" /><br />
                <label>Prénom : </label>
                <input type="text" name="prenom" size="30" /><br />
                <label>Code postal : </label>
                <input type="text" name="codepostal" size="30" /><br />
                <label>Adresse : </label>
                <input type="text" name="adresse" size="30" /><br />
                <label>Numéro : </label>
                <input type="text" name="numero" size="30" /><br />
                <label>Numéro de téléphone: </label>
                <input type="text" name="numerodetelephone" size="30" /><br />
                <label>Email : </label>
                <input type="text" name="email" size="30" /><br />
            </fieldset>
        </div>
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