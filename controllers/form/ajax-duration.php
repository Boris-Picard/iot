<?php
session_start();

require_once __DIR__ . '/../../models/Module_Status.php';


try {
    $ids = $_SESSION['ids'] ?? [];
    foreach ($ids as $id) {
        ModuleStatus::updateDuration($id);
        $getModule = ModuleStatus::get($id);
    }
    echo json_encode($getModule);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
}
