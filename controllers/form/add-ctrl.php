<?php 

require_once __DIR__ . '/../../models/Module.php';
require_once __DIR__ . '/../../config/config.php';

try {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($name)) {
        $errors['name'] = 'Veuillez rentrer un nom';
    } else {
        $isOk = filter_var($name, FILTER_DEFAULT);
        if(!$isOk) {
            $errors['name'] = 'Nom invalide';
        }
    }

    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($location)) {
        $errors['location'] = 'Veuillez rentrer une localisation';
    } else {
        $isOk = filter_var($location, FILTER_DEFAULT);
        if(!$isOk) {
            $errors['location'] = 'Localisation invalide';
        }
    }

    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);

    if(empty($date)) {
        $errors['date'] = 'Veuillez rentrer une date';
    } else {
        $isOk = filter_var($date, FILTER_VALIDATE_INT);
        if(!$isOk) {
            $errors['date'] = 'Date invalide';
        }
    }

    if(empty($errors)) {
        $module = new Module();

        $module->setName($name);
        $module->setLocation($location);

        $result = $module->insert();

        if($result) {
            $alert['success'] = 'La donnée a bien été ajouté !';
        }
    }
} catch (PDOException $e) {
    die('error : ' . $e->getMessage());
}






include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/form/add.php';
include __DIR__ . '/../../views/templates/footer.php';
