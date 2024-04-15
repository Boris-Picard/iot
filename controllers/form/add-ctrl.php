<?php

require_once __DIR__ . '/../../models/Module.php';
require_once __DIR__ . '/../../models/Module_Data.php';
require_once __DIR__ . '/../../models/Module_Status.php';
require_once __DIR__ . '/../../config/config.php';

$addPage = true;
try {
    $valid = [];

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (empty($name)) {
            $errors['name'] = 'Veuillez rentrer un nom';
        } else {
            $isOk = filter_var($name, FILTER_DEFAULT);
            $valid['name'] = true;
            if (!$isOk) {
                $errors['name'] = 'Nom invalide';
            }
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $errors['description'] = 'Veuillez rentrer une description';
        } else {
            $isOk = filter_var($description, FILTER_DEFAULT);
            $valid['description'] = true;
            if (!$isOk) {
                $errors['description'] = 'Description invalide';
            }
            if (strlen($description) > 500) {
                $errors['description'] = 'Description trop longue pas plus de 500 caractères';
            }
            if (strlen($description) < 5) {
                $errors['description'] = 'Description trop courte pas moins de 5 caractères';
            }
        }

        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($type)) {
            $errors['type'] = 'Veuillez rentrer un type';
        } else {
            $isOk = filter_var($type, FILTER_DEFAULT);
            $valid['type'] = true;
            if (!$isOk) {
                $errors['type'] = 'Type invalide';
            }
        }

        if (empty($errors)) {
            try {
                $pdo = Database::connect();
                $pdo->beginTransaction();

                $module = new Module();

                $module->setName($name);
                $module->setDescription($description);
                $module->setMeasurementType($type);

                $resultModule = $module->insert();

                $id_modules = $pdo->lastInsertId();

                $moduleData = new ModuleData();

                $randomInt = rand(10, 1000);
                $randomDec = $randomInt / 100;
                $moduleData->setModuleValue($randomDec);
                $moduleData->setIdModules($id_modules);

                $data = $moduleData->insert();

                $moduleStatus = new ModuleStatus();

                $moduleStatus->setIsOperational(true);
                $moduleStatus->setDuration(0);
                $moduleStatus->setDataCount(0);
                $moduleStatus->setIdModules($id_modules);

                $status = $moduleStatus->insert();

                $pdo->commit();

                if ($resultModule || $data || $status) {
                    $alert['success'] = 'La donnée a bien été ajouté !';
                }
            } catch (PDOException $e) {
                $pdo->rollback();
            }
        }
    }
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}






include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/add.php';
include __DIR__ . '/../../views/templates/footer.php';
