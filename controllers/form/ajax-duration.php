<?php
session_start();

require_once __DIR__ . '/../../models/Module_Status.php';


try {
    $ids = $_SESSION['ids'] ?? [];
    $getModule = ModuleStatus::get(60); 
    foreach ($ids as $id) {
        ModuleStatus::updateDuration($id);
    }
    echo json_encode($getModule);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
}
