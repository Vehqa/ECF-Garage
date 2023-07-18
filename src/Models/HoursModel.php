<?php

namespace App\Models;
use App\Libraries\Database;
use PDO;

class HoursModel extends Model{
    protected ?int $id_hour = null;
    protected ?string $monday_hour = null;
    protected ?string $saturday_hour = null;
    protected ?string $sunday_hour = null;

    public function __construct()
    {
        $this->table = 'hour';
    }

    /**
     * Get the value of id_hour
     */ 
    public function getId_hour()
    {
        return $this->id_hour;
    }

    /**
     * Set the value of id_hour
     *
     * @return  self
     */ 
    public function setId_hour($id_hour)
    {
        $this->id_hour = $id_hour;

        return $this;
    }

    /**
     * Get the value of monday_hour
     */ 
    public function getMonday_hour()
    {
        return $this->monday_hour;
    }

    /**
     * Set the value of monday_hour
     *
     * @return  self
     */ 
    public function setMonday_hour($monday_hour)
    {
        $this->monday_hour = $monday_hour;

        return $this;
    }
    /**
     * Get the value of saturday_hour
     */ 
    public function getSaturday_hour()
    {
        return $this->saturday_hour;
    }

    /**
     * Set the value of saturday_hour
     *
     * @return  self
     */ 
    public function setSaturday_hour($saturday_hour)
    {
        $this->saturday_hour = $saturday_hour;

        return $this;
    }

    /**
     * Get the value of sunday_hour
     */ 
    public function getSunday_hour()
    {
        return $this->sunday_hour;
    }

    /**
     * Set the value of sunday_hour
     *
     * @return  self
     */ 
    public function setSunday_hour($sunday_hour)
    {
        $this->sunday_hour = $sunday_hour;

        return $this;
    }

    public function update($id, array $data): bool
    {
        $sql = "UPDATE {$this->table} SET 
        monday_hour = :monday_hour, 
        saturday_hour = :saturday_hour,
        sunday_hour = :sunday_hour
        WHERE id_hour = :id";

        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'monday_hour' => $data['monday_hour'],
            'saturday_hour' => $data['saturday_hour'],
            'sunday_hour' => $data['sunday_hour'],
            'id' => $id,
        ]);
    return true;
}

public function getHours()
    {
        $db = Database::getInstance(); // Utilisez la méthode getInstance() pour obtenir l'instance de la classe Database
        $query = "SELECT * FROM hour";
        $result = $db->query($query);

        $hours = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $hour = new HoursModel();
            $hour->setMonday_hour($row['monday_hour']);
            $hour->setSaturday_hour($row['saturday_hour']);
            $hour->setSunday_hour($row['sunday_hour']);
            $hours[] = $hour;
        }
    return $hours;
    }
}