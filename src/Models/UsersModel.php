<?php

namespace App\Models;
use App\Libraries\Database;


class UsersModel extends Model
{
    protected ?int $id = null;
    protected ?string $email_users = null;
    protected ?string $password_users =null;
    protected ?int $id_role = null;

    public function __construct()
    {
        $this->table = 'users';
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email_users
     */ 
    public function getEmail_users()
    {
        return $this->email_users;
    }

    /**
     * Set the value of email_users
     *
     * @return  self
     */ 
    public function setEmail_users($email_users)
    {
        $this->email_users = $email_users;

        return $this;
    }

    /**
     * Get the value of password_users
     */ 
    public function getPassword_users()
    {
        return $this->password_users;
    }

    /**
     * Set the value of password_users
     *
     * @return  self
     */ 
    public function setPassword_users($password_users)
    {
        $this->password_users = $password_users;

        return $this;
    }

    /**
     * Get the value of id_role
     */ 
    public function getId_role()
    {
        return $this->id_role;
    }

    /**
     * Set the value of id_role
     *
     * @return  self
     */ 
    public function setId_role($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }

    //function create correspondant la table users de la bdd
    public function create(array $data):bool
    {
        $sql = "INSERT INTO {$this->table} (email_users, password_users, id_role )
                VALUES (:email_users, :password_users, :id_role)";
        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'email_users' => $data['email_users'],
            'password_users' => $data['password_users'],
            'id_role' => $data['id_role'],
        ]);
        return true;
    }

        //function update correspondant la table users de la bdd
    public function update($id, array $data): bool
    {
        $sql = "UPDATE {$this->table} SET 
        email_users = :email_users, 
        password_users = :password_users
        WHERE id = :id";

        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'email_users' => $data['email_users'],
            'password_users' => $data['password_users'],
            'id' => $id,
        ]);
    return true;
}

    //function delete correspondant la table users de la bdd
    public function delete(int $id)
        {
            return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        }
}