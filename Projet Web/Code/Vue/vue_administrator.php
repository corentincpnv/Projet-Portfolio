<?php
// ouverture de la session
session_start();
$titre ='Administrer Portfolio';
ob_start();
if(empty($_SESSION['login']))
{
    require "index.php";
    exit();
}
?>
    <table>
        <tr>
            <th>Login</th>
            <th>Mot De Passe</th>
            <th>Visible</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td><?php echo ($utilisateur['Login']); ?></td>
                <td><?php echo ($utilisateur['Mot De Passe']); ?></td>
                <td><input type="checkbox" value="<?php echo ($utilisateur['Visible']==1 ? 'checked' : ''); ?>" /></td>
                <td>
                    <form action="." method="get">
                        <input type="hidden" name="action" value="vue_update" />
                        <input type="hidden" name="customerID" value="<?php echo $utilisateur['idLogin']; ?>" />
                        <input type="submit" value="Update" />
                    </form>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_login" />
                        <input type="hidden" name="idLogin" value="<?php echo $utilisateur['idLogin']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
$contenu = ob_get_clean();
require "gabarit.php";?>