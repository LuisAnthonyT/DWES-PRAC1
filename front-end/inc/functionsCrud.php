<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
    include_once(__DIR__ . '/connection.inc.php');

    //---------------------------------------------------------USUARIOS---------------------------------------------------------//

    function createUser (string $user, string $hashedPass, string $email) {
        $connection = connectionBD();

        $sql = $connection->prepare('INSERT INTO USERS (usuario, contrasenya, email) VALUES (?,?,?);');
        
        $sql->bindParam(1, $user);
        $sql->bindParam(2, $hashedPass);
        $sql->bindParam(3, $email);
        $sql->execute();
    }

    function login (string $user, string $password) {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT COUNT(*) as count FROM users WHERE usuario=:user');
        $sql->bindParam(':user', $user);
        $sql->execute();
        $result = $sql->fetch();

        if ($result['count'] > 0) {
            $sql = $connection->prepare('SELECT id, contrasenya FROM users WHERE usuario=:user');
            $sql->bindParam(':user', $user);
            $sql->execute();
            $userData = $sql->fetch();

            $passwordDataBase = $userData['contrasenya'];
            $userId = $userData['id'];

            if (password_verify($password, $passwordDataBase)) {
                return $userId;

            } else {
                return null; //Contraseña incorrecta
            }
        } else {
            return null; //Usuario no encontrado
        }
    }

    function getRevelsById (int $id) {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT id, texto, fecha FROM revels WHERE userid=:id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        $revelsUser = $sql->fetchAll();

        return $revelsUser;
    }
?>