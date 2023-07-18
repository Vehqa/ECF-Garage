<?php

namespace App\Models;
use App\Libraries\Database;

use PDO;

class ServicesModel extends Model
{
    protected ?int $id_service = null;
    protected ?string $title_service = null; 
    protected ?string $description_service = null;
    protected ?int $price_service = null;
    protected ?string $image_service = null;

    public function __construct()
    {
        $this->table = 'service';
    }

    /**
     * Get the value of id_service
     */ 
    public function getId_service()
    {
        return $this->id_service;
    }

    /**
     * Set the value of id_service
     *
     * @return  self
     */ 
    public function setId_service($id_service)
    {
        $this->id_service = $id_service;

        return $this;
    }

    /**
     * Get the value of title_service
     */ 
    public function getTitle_service()
    {
        return $this->title_service;
    }

    /**
     * Set the value of title_service
     *
     * @return  self
     */ 
    public function setTitle_service($title_service)
    {
        $this->title_service = $title_service;

        return $this;
    }

    /**
     * Get the value of description_service
     */ 
    public function getDescription_service()
    {
        return $this->description_service;
    }

    /**
     * Set the value of description_service
     *
     * @return  self
     */ 
    public function setDescription_service($description_service)
    {
        $this->description_service = $description_service;

        return $this;
    }

    /**
     * Get the value of price_service
     */ 
    public function getPrice_service()
    {
        return $this->price_service;
    }

    /**
     * Set the value of price_service
     *
     * @return  self
     */ 
    public function setPrice_service($price_service)
    {
        $this->price_service = $price_service;

        return $this;
    }
/**
     * Get the value of image_service
     */ 
    public function getImage_service()
    {
        return $this->image_service;
    }

    /**
     * Set the value of image_service
     *
     * @return  self
     */ 
    public function setImage_service($image_service)
    {
        $this->image_service = $image_service;

        return $this;
    }


    //function update correspondant la table service de la bdd
    public function update($id, array $data): bool
    {
        $sql = "UPDATE {$this->table} SET 
            title_service = :title_service, 
            description_service = :description_service, 
            price_service = :price_service
            WHERE id_service = :id";

        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'title_service' => $data['title_service'],
            'description_service' => $data['description_service'],
            'price_service' => $data['price_service'],
            'id' => $id,
        ]);
    return true;
    }

    public function getServices()
    {
        $db = Database::getInstance(); // Utilisez la méthode getInstance() pour obtenir l'instance de la classe Database

        $query = "SELECT * FROM service";
        $result = $db->query($query);

        $services = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $service = new ServicesModel();
            $service->setImage_service($row['image_service']);
            $service->setId_service($row['id_service']);
            $service->setTitle_service($row['title_service']);
            $service->setDescription_service($row['description_service']);
            $service->setPrice_service($row['price_service']);
            $services[] = $service;
        }
        return $services;
    }
}





