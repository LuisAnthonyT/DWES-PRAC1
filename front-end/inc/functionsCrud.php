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

    function getRevelsById (int $id):array {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT id, texto, fecha FROM revels WHERE userid=:id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        $revelsUser = $sql->fetchAll();

        return $revelsUser;
    }

    function getNumberCommentsbyRevel (int $revelId):int {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT COUNT(*) as count FROM comments WHERE revelid=:revelId');
        $sql->bindParam(':revelId', $revelId);
        $sql->execute();
        $numberComments = $sql->fetch();

        return $numberComments['count'];
    }

    function getFollowersByUser(int $userId):array {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT u.usuario FROM follows f JOIN users u ON f.userfollowed = u.id  WHERE f.userid=:userId');
        $sql->bindParam(':userId', $userId);
        $sql->execute();
        $followedUsers = $sql->fetchAll();

        return $followedUsers;
    }
?>