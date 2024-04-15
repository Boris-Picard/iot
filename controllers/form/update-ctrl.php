<?php 
require_once __DIR__ . '/../../models/Module.php';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $getModule = Module::get($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

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
            $update = new Module();

            $update->setIdModules($id);
            $update->setName($name);
            $update->setDescription($description);
            $update->setMeasurementType($type);

            $result = $update->update();

            if($result) {
                $alert['success'] = 'Valeur modifié avec succès !';
            }
        }

        $getModule = Module::get($id);
    }
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/update.php';
include __DIR__ . '/../../views/templates/footer.php';