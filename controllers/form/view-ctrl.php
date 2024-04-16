<?php 
require_once __DIR__ . '/../../models/Module.php';

try {
    $viewModule = true;

    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $getModule = Module::get($id);
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/view.php';
include __DIR__ . '/../../views/templates/footer.php';