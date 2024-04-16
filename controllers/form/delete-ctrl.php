<?php
session_start();
require_once __DIR__ . '/../../models/Module.php';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $deleteModule = Module::delete($id);

    if ($deleteModule) {
        if (in_array($id, $_SESSION['ids'])) {
            $index = array_search($id, $_SESSION['ids']);
            unset($_SESSION['ids'][$index]);
        }
        header('location: /controllers/form/list-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}
