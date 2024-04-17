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

    public static function get(int $id): array|null
    {
        $pdo = Database::connect();

        $sql = 'SELECT * 
        FROM `module_status`
        INNER JOIN `modules` ON `modules`.`id_modules`= `module_status`.`id_modules`
        WHERE `module_status`.`id_modules`=:id;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function updateDuration(int $id): bool
    {
        $pdo = Database::connect();
        $pdo->beginTransaction();

        try {
            // Récupérer la valeur actuelle du compteur duration
            $sqlSelect = 'SELECT `duration` FROM `module_status` WHERE `id_modules` = :id FOR UPDATE';
            $sthSelect = $pdo->prepare($sqlSelect);
            $sthSelect->bindValue(':id', $id, PDO::PARAM_INT);
            $sthSelect->execute();
            $current = $sthSelect->fetchColumn();

            // Incrémenter la valeur du compteur de 1
            $newDuration = $current + 1;

            // Mettre à jour le compteur duration dans la base de données
            $sqlUpdate = 'UPDATE `module_status` SET `duration` = :duration WHERE `id_modules` = :id';
            $sthUpdate = $pdo->prepare($sqlUpdate);
            $sthUpdate->bindValue(':id', $id, PDO::PARAM_INT);
            $sthUpdate->bindValue(':duration', $newDuration, PDO::PARAM_INT);
            $sthUpdate->execute();

            $pdo->commit();
            return true;
        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;
        }
    }

    public static function updateDataValue(int $id): bool
    {
        $pdo = Database::connect();
        $pdo->beginTransaction();

        try {
            $sqlSelect = 'SELECT `data_count` FROM `module_status` WHERE `id_modules` = :id FOR UPDATE';
            $sthSelect = $pdo->prepare($sqlSelect);
            $sthSelect->bindValue(':id', $id, PDO::PARAM_INT);
            $sthSelect->execute();
            $current = $sthSelect->fetchColumn();

            $newDataCount = $current + 1;

            $sqlUpdate = 'UPDATE `module_status` SET `data_count` = :data_count WHERE `id_modules` = :id';
            $sthUpdate = $pdo->prepare($sqlUpdate);
            $sthUpdate->bindValue(':id', $id, PDO::PARAM_INT);
            $sthUpdate->bindValue(':data_count', $newDataCount, PDO::PARAM_INT);
            $sthUpdate->execute();

            $pdo->commit();
            return true;
        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;
        }
    }

    public static function updateOperational(int $id, bool $op = true): bool
    {
        $pdo = Database::connect();
        $pdo->beginTransaction();

        try {
            $sqlSelect = 'SELECT `is_operational` FROM `module_status` WHERE `id_modules` = :id FOR UPDATE';
            $sthSelect = $pdo->prepare($sqlSelect);
            $sthSelect->bindValue(':id', $id, PDO::PARAM_INT);
            $sthSelect->execute();
            $current = $sthSelect->fetchColumn();

            $sqlUpdate = 'UPDATE `module_status` SET `is_operational` = :op WHERE `id_modules` = :id';
            $sthUpdate = $pdo->prepare($sqlUpdate);
            $sthUpdate->bindValue(':id', $id, PDO::PARAM_INT);
            $sthUpdate->bindValue(':is_operational', $op);
            $sthUpdate->execute();

            $pdo->commit();
            return true;
        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;
        }
    }
}
