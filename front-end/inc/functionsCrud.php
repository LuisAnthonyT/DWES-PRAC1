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

        $sql = $connection->prepare('SELECT u.id, u.usuario FROM follows f JOIN users u ON f.userfollowed = u.id  WHERE f.userid=:userId');
        $sql->bindParam(':userId', $userId);
        $sql->execute();
        $followedUsers = $sql->fetchAll();

        return $followedUsers;
    }

    function getRevelsByFollowedUsers(int $userId): array {
        $connection = connectionBD();
        
        // Obtener usuarios seguidos por el usuario logueado
        $followedUsers = getFollowersByUser($userId);

        if (!empty($followedUsers)) {
            // Crear una lista de IDs de usuarios seguidos
        $followedUserIds = array_column($followedUsers, 'id');
        
        // Obtener revels de los usuarios seguidos, ordenados por fecha descendente
        $sql = $connection->prepare('
            SELECT r.*, u.id AS id_usuario, u.usuario AS nombre_usuario
            FROM revels r
            JOIN users u ON r.userid = u.id
            WHERE r.userid IN (' . implode(',', $followedUserIds) . ')
            ORDER BY r.fecha DESC
        ');
        $sql->execute();
        $revelsByFollowedUsers = $sql->fetchAll();
        
        return $revelsByFollowedUsers;

        } else {
            return array();
        }
    }

    function getInfoByUser (int $id):array {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT id,usuario,email  FROM users WHERE id=:id');
        $sql->bindParam(':id', $id);
        $sql->execute();

        $infoUser = $sql->fetch(PDO::FETCH_ASSOC);

        return $infoUser;
    }

    function getNumberFollowersByUser (int $id):int {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT COUNT(*) as count FROM follows WHERE userfollowed=:id');
        $sql->bindParam('id', $id);
        $sql->execute();
        $numberFollowers = $sql->fetch();

        return $numberFollowers['count'];
    }

    function getNumberLikesByRevel (int $idRevel):int {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT COUNT(*) as count FROM likes WHERE revelid=:idRevel');
        $sql->bindParam('idRevel', $idRevel);
        $sql->execute();
        $numberLikes = $sql->fetch();

        return $numberLikes['count'];
    }

    function getNumberDislikesByRevel (int $idRevel):int {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT COUNT(*) as count FROM dislikes WHERE revelid=:idRevel');
        $sql->bindParam('idRevel', $idRevel);
        $sql->execute();
        $numberdislikes = $sql->fetch();

        return $numberdislikes['count'];
    }

    function getRevelById (int $idRevel) {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT texto, fecha FROM revels WHERE id=:idRevel');
        $sql->bindParam(':idRevel', $idRevel);
        $sql->execute();
        $revel = $sql->fetchObject();

        return $revel;
    }

    function getCommentsByRevel (int $idRevel):array {
        $connection = connectionBD();

        $sql = $connection->prepare('SELECT texto, fecha FROM comments WHERE revelid=:idRevel');
        $sql->bindParam(':idRevel', $idRevel);
        $sql->execute();
        $comments = $sql->fetchAll();

        return $comments;
    }

    function postComment (int $revelId, int $userId, string $comment) {
        $connection = connectionBD();
        $date = date('Y-m-d H:i:s');  // Obtener la fecha actual

        $sql = $connection->prepare('INSERT INTO comments (revelid, userid, texto, fecha) VALUES (:revelid, :userid, :texto, :fecha)');
        $sql->bindParam(':revelid', $revelId);
        $sql->bindParam(':userid', $userId);
        $sql->bindParam(':texto', $comment);
        $sql->bindParam(':fecha', $date);
        $sql->execute();

    }

    function postRevel (int $userId, string $texto) {
        $connection = connectionBD();
        $date = date('Y-m-d H:i:s');  // Obtener la fecha actual

        $sql = $connection->prepare('INSERT INTO revels (userid, texto, fecha) VALUES (:userid, :texto, :fecha)');
        $sql->bindParam(':userid', $userId);
        $sql->bindParam(':texto', $texto);
        $sql->bindParam(':fecha', $date);
        $sql->execute();
    }

    function deleteRevelById (int $revelId) {
        $connection = connectionBD();

        $sql = $connection->prepare('DELETE FROM revels WHERE id=:revelId');
        $sql->bindParam(':revelId', $revelId);
        $sql->execute();
    }

    function updateUser (string $user, string $email, int $userId) {
        $connection = connectionBD();

        $sql = $connection->prepare('UPDATE users SET  usuario=:user, email=:email WHERE id=:id');
        $sql->bindParam(':user', $user);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':id', $userId);
        $sql->execute();
    }

    function addLike (int $revelId, int $userId) {
        $connection = connectionBD();

        $sql = $connection->prepare('INSERT INTO likes (revelid, userid) VALUES (:revelid, :userid) ');
        $sql->bindParam(':revelid', $revelId);
        $sql->bindParam(':userid', $userId);
        $sql->execute();
    }
    
?>