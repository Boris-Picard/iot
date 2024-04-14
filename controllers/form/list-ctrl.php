<?php 
require_once __DIR__ . '/../../models/Module.php';

try {
    $lists = Module::getAll();

} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/list.php';
include __DIR__ . '/../../views/templates/footer.php';