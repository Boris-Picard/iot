<?php

require_once __DIR__ . '/../helpers/Database.php';

class Module
{
    private int $id_modules;
    private string $name;
    private string $location;

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

    public function setLocation(string $location)
    {
        $this->location = $location;
    }
    public function getLocation(): string
    {
        return $this->location;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `modules` (`name`, `location`)
        VALUES (:name, :location);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':location', $this->getLocation());

        $sth->execute();

        return (int) $sth->rowCount() > 0;
    }

    public static function getAll(): array|null
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `modules`';

        $sth = $pdo->query($sql);

        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get(int $id): object|null
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `modules` WHERE `id_modules`=:id';

        $sth= $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function delete(int $id) {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `modules` WHERE `id_modules`=:id;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
