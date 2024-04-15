<?php

require_once __DIR__ . '/../helpers/Database.php';

class Module
{
    private int $id_modules;
    private string $name;
    private string $description;
    private string $measurement_type;

    public function setIdModules(int $id_modules)
    {
        $this->id_modules = $id_modules;
    }
    public function getIdModules(): int
    {
        return $this->id_modules;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setMeasurementType(string $measurement_type)
    {
        $this->measurement_type = $measurement_type;
    }
    public function getMeasurementType(): string
    {
        return $this->measurement_type;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `modules` (`name`, `description`, `measurement_type`)
        VALUES (:name, :description, :measurement_type);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':measurement_type', $this->getMeasurementType());

        $sth->execute();

        return (int) $sth->rowCount() > 0;
    }

    public static function getAll(): array|null
    {
        $pdo = Database::connect();

        $sql = 'SELECT * 
        FROM `modules`
        INNER JOIN `module_data` ON `modules`.`id_modules`= `module_data`.`id_modules`
        INNER JOIN `module_status` ON `modules`.`id_modules`=`module_status`.`id_modules`;';

        $sth = $pdo->query($sql);

        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get(int $id): object|null
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `modules` WHERE `id_modules`=:id';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function delete(int $id)
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `modules` WHERE `id_modules`=:id;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
