<?php 
require_once __DIR__ . '/../../models/Module.php';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $deleteModule = Module::delete($id);

    if($deleteModule) {
        header('location: /controllers/form/list-ctrl.php');
    }
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}
