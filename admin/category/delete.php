<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('..database/dbhelper.php');
?>
<?php
if (isset($POST['id'])) {
    $id = $POST['id'];


$sql = 'delete from category where id=' . $id;
execute($sql);
header('Location: index.php');
die();
}

?>