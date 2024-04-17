<?php
require_once __DIR__ . '/../../models/Module_Data.php';
require_once __DIR__ . '/../../models/Module_Status.php';

try {
    $viewModule = true;

    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $getModule = ModuleData::getAll($id, "DESC");
    $moduleStatus = ModuleStatus::get($id);
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/view.php';
include __DIR__ . '/../../views/templates/footer.php';
