<?php

session_start();

require_once __DIR__ . '/../../models/Module_Data.php';

try {
    $ids = $_SESSION['ids'] ?? [];
    $allData = [];

    foreach ($ids as $id) {
        $getData = ModuleData::getAllList($id, 'DESC');
        $allData[] = $getData;
    }
    echo json_encode($allData);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
}
