<?php

namespace App\Models;
use App\Libraries\Database;

class LoginModel {
    // Récupérer l'utilisateur par email et mot de passe
    public function getUserByEmailAndPassword($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email_users = :email_users AND password_users = :password_users";
        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'email_users' => $email,
            'password_users' => $password,
            ]);
        $user = $query->fetch(); // Récupérer la ligne correspondante de la base de données
        return $user;
    }
}