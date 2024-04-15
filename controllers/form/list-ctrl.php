<?php 
require_once __DIR__ . '/../../models/Module.php';
require_once __DIR__ . '/../../models/Module_Data.php';

$listPage = true;
try {
    // on récupère la liste de tous les modules 
    $lists = Module::getAll();

} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/list.php';
include __DIR__ . '/../../views/templates/footer.php';