<?php

require_once __DIR__ . '/../../models/Module_Data.php';

$idData = intval(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT));

$getData = ModuleData::getAll($idData);

echo json_encode($getData);
