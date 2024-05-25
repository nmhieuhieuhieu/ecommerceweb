<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/dbhelper.php');
if (!empty($_POST) || !empty($_GET)) {
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];

        switch ($action) {
            case 'delete':
                if (isset($_POST['id_user'])) {
                    $id_user = $_POST['id_user'];
                    $sql = 'DELETE FROM user WHERE id_user = ' . $id_user;
                    execute($sql);
                }
                break;

            case 'checkRole':
                if (isset($_GET['id_user'])) {
                    $id_user = $_GET['id_user'];
                    $sql = 'SELECT role FROM user WHERE id_user = ' . $id_user;
                    $result = executeSingleResult($sql);
                    echo isset($result['role']) ? $result['role'] : '';
                }
                break;
        }
    }
}
?>
