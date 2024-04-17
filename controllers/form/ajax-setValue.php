<?php
session_start();

require_once __DIR__ . '/../../models/Module_Data.php';
require_once __DIR__ . '/../../models/Module_Status.php';


try {
    $ids = $_SESSION['ids'] ?? [];

    $newData = new ModuleData();

    $randomInt = rand(10, 1000);
    $randomDec = $randomInt / 10;
    $newData->setModuleValue($randomDec);
    foreach ($ids as $id) {
        $newData->setIdModules($id);
        $result = $newData->insert();
        if ($result) {
            foreach ($ids as $id) {
                if ($randomDec > 50) {
                    ModuleStatus::updateOperational($id, false);
                } else {
                    ModuleStatus::updateOperational($id);
                }
                ModuleStatus::updateDataValue($id);
                $getModuleData = ModuleData::get($id);
            }
        }
    }

    if (isset($getModuleData)) {
        echo json_encode($getModuleData);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
}
