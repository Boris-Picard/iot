<?php
session_start();

require_once __DIR__ . '/../../models/Module_Data.php';
require_once __DIR__ . '/../../helpers/Database.php';


try {
    $ids = $_SESSION['ids'] ?? [];

    $pdo = Database::connect();
    $newData = new ModuleData();
    $randomInt = rand(10, 1000);
    $randomDec = $randomInt / 10;
    $newData->setModuleValue($randomDec);
    foreach ($ids as $id) {
        $newData->setIdModules($id);
        $result = $newData->insert();
    }
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
}
