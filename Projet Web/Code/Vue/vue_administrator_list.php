<?php
// ouverture de la session
session_start();
$titre ='Administrer Portfolio';
ob_start();
?>
<h2> Liste des utilisateurs</h2>
    <table>
        <tr>
            <th>Login</th>
            <th>Mot De Passe</th>
            <th>Visible</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo ($user['loginName']); ?></td>
                <td><?php echo ($user['password']); ?></td>
                <td><input type="checkbox" value="<?php echo ($user['Visible']==1 ? 'checked' : ''); ?>" /></td>
                <td>
                    <form action="." method="get">
                        <input type="hidden" name="action" value="vue_userData" />
                        <input type="hidden" name="idLogin" value="<?php echo $user['idLogin']; ?>" />
                        <input type="submit" value="Update" />
                    </form>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_login" />
                        <input type="hidden" name="idLogin" value="<?php echo $user['idLogin']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
$contenu = ob_get_clean();
require "gabarit.php";?>