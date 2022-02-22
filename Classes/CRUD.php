<?php

require __DIR__ . '/Config.php';
require __DIR__ . '/DBSingleton.php';

class CRUD
{
    /**
     * @param $name
     * @param $surname
     * @param $age
     * @return bool
     */
    public static function Create($name, $surname, $age):bool
    {
        $pdo = DBSingleton::PDO();
        $stm = $pdo->prepare("
            INSERT INTO students (name, surname, age)
            VALUES ('$name', '$surname', '$age')
        ");

        if ($stm->execute()) {
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public static function Read():array {
        $pdo = DBSingleton::PDO();

        $stm = $pdo->prepare("
            SELECT * FROM students
        ");

        if ($stm->execute()) {
            return $stm->fetchAll();
        }

        return ["ERROR"];
    }

    /**
     * @param $surname
     * @param $name
     * @param $age
     * @param $studentID
     * @return bool
     */
    public static function Update($surname, $name, $age, $studentID) : bool {
        $pdo = DBSingleton::PDO();

        $stm = $pdo->prepare("
            UPDATE students SET name = :name, surname = :surname, age = :age WHERE id = :id
        ");

        $stm->bindParam(':name', $name);
        $stm->bindParam(':surname', $surname);
        $stm->bindParam(':age', $age);
        $stm->bindParam(':id', $studentID);

        if ($stm->execute()) {
            return true;
        }
        return false;
    }


    /**
     * @param $studentID
     * @return bool
     */
    public static function Delete ($studentID) : bool {
        $pdo = DBSingleton::PDO();

        $stm = $pdo->prepare("
            DELETE FROM students WHERE id = :id
        ");

        $stm->bindParam(':id', $studentID);

        if ($stm->execute()) {
            return true;
        }
        return false;
    }
}