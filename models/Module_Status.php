<?php

require_once __DIR__ . '/../helpers/Database.php';

class ModuleStatus
{
    private int $id_module_status;
    private bool $is_operational;
    private int $duration;
    private int $data_count;
    private ?DATETIME $updated_at;
    private int $id_modules;

    public function setIdModulesStatus(int $id_module_status)
    {
        $this->id_module_status = $id_module_status;
    }
    public function getIdModulesStatus(): int
    {
        return $this->id_module_status;
    }

    public function setIsOperational(bool $is_operational)
    {
        $this->is_operational = $is_operational;
    }
    public function getIsOperational(): bool
    {
        return $this->is_operational;
    }

    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }
    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDataCount(int $data_count)
    {
        $this->data_count = $data_count;
    }
    public function getDataCount(): int
    {
        return $this->data_count;
    }

    public function setUpdatedAt(?DATETIME $updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): ?DATETIME
    {
        return $this->updated_at;
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

        $sql = 'INSERT INTO `module_status` (`is_operational`, `duration`, `data_count`, `id_modules`)
        VALUES (:is_operational, :duration, :data_count, :id_modules);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':is_operational', $this->getIsOperational());
        $sth->bindValue(':duration', $this->getDuration(), PDO::PARAM_INT);
        $sth->bindValue(':data_count', $this->getDataCount(), PDO::PARAM_INT);
        $sth->bindValue(':id_modules', $this->getIdModules(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
