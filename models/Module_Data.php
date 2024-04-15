<?php

require_once __DIR__ . '/../config/config.php';

class ModuleData
{
    private int $id_module_data;
    private string $module_value;
    private ?DATETIME $module_timestamp;
    private int $id_modules;

    public function setIdModulesData(int $id_module_data)
    {
        $this->id_module_data = $id_module_data;
    }
    public function getIdModulesData(): int
    {
        return $this->id_module_data;
    }

    public function setModuleValue(string $module_value)
    {
        $this->module_value = $module_value;
    }
    public function getModuleValue(): string
    {
        return $this->module_value;
    }

    public function setModuleTimestamp(?DATETIME $module_timestamp)
    {
        $this->module_timestamp = $module_timestamp;
    }
    public function getModuleTimestamp(): DATETIME
    {
        return $this->module_timestamp;
    }

    public function setIdModules(int $id_modules)
    {
        $this->id_modules = $id_modules;
    }
    public function getIdModules(): int
    {
        return $this->id_modules;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `module_data`(`module_value`, `id_modules`)
        VALUES (:module_value, :id_modules);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':module_value', $this->getModuleValue());
        $sth->bindValue(':id_modules', $this->getIdModules());

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
