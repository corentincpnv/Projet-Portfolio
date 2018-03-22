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
<div class="tableauAdmin">
    <td><?php echo $this->$colonne;?></td>
</div>
<?php
$contenu = ob_get_clean();
require "gabarit.php";?>