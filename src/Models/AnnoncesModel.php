<?php
namespace App\Models;
use App\Libraries\Database;

class AnnoncesModel extends Model
{
    protected ?int $id_car = null;
    protected ?string $title_car = null;
    protected ?float $price_car = null;
    protected ?string $model_car = null;
    protected ?int $km_car = null;
    protected ?int $year_car = null;
    protected ?string $image_car = null;
    
    public function __construct()
    {
        $this->table = 'ad';
    }

    /**
     * Get the value of id_car
     */ 
    public function getId_car()
    {
        return $this->id_car;
    }

    /**
     * Set the value of id_car
     *
     * @return  self
     */ 
    public function setId_car($id_car)
    {
        $this->id_car = $id_car;

        return $this;
    }

    /**
     * Get the value of title_car
     */ 
    public function getTitle_car():?string
    {
        return $this->title_car;
    }

    /**
     * Set the value of title_car
     *
     * @return  self
     */ 
    public function setTitle_car($title_car)
    {
        $this->title_car = $title_car;

        return $this;
    }

    /**
     * Get the value of price_car
     */ 
    public function getPrice_car()
    {
        return $this->price_car;
    }

    /**
     * Set the value of price_car
     *
     * @return  self
     */ 
    public function setPrice_car($price_car)
    {
        $this->price_car = $price_car;

        return $this;
    }

    /**
     * Get the value of model_car
     */ 
    public function getModel_car()
    {
        return $this->model_car;
    }

    /**
     * Set the value of model_car
     *
     * @return  self
     */ 
    public function setModel_car($model_car)
    {
        $this->model_car = $model_car;

        return $this;
    }

    /**
     * Get the value of km_car
     */ 
    public function getKm_car()
    {
        return $this->km_car;
    }

    /**
     * Set the value of km_car
     *
     * @return  self
     */ 
    public function setKm_car($km_car)
    {
        $this->km_car = $km_car;

        return $this;
    }

    /**
     * Get the value of year_car
     */ 
    public function getYear_car()
    {
        return $this->year_car;
    }

    /**
     * Set the value of year_car
     *
     * @return  self
     */ 
    public function setYear_car($year_car)
    {
        $this->year_car = $year_car;

        return $this;
    }

    /**
     * Get the value of image_car
     */ 
    public function getImage_car()
    {
        return $this->image_car;
    }

    /**
     * Set the value of image_car
     *
     * @return  self
     */ 
    public function setImage_car($image_car)
    {
        $this->image_car = $image_car;

        return $this;
    }

    public function create(array $data):bool
    {
        $sql = "INSERT INTO {$this->table} (title_car, price_car, model_car, km_car, year_car, image_car )
                VALUES (:title_car, :price_car, :model_car, :km_car, :year_car, :image_car)";
        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'title_car' => $data['title_car'],
            'price_car' => $data['price_car'],
            'model_car' => $data['model_car'],
            'km_car' => $data['km_car'],
            'year_car' => $data['year_car'],
            'image_car' => $data['image_car'],
        ]);
        return true;
    }

    public function update($id, array $data): bool
    {
        $sql = "UPDATE {$this->table} SET 
            title_car = :title_car, 
            price_car = :price_car, 
            model_car = :model_car, 
            km_car = :km_car, 
            year_car = :year_car, 
            image_car = :image_car
            WHERE id_car = :id";

        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'title_car' => $data['title_car'],
            'price_car' => $data['price_car'],
            'model_car' => $data['model_car'],
            'km_car' => $data['km_car'],
            'year_car' => $data['year_car'],
            'image_car' => $data['image_car'],
            'id' => $id,
        ]);
    return true;
    }

public function delete(int $id_car)
    {
        $sql = 'SELECT image_car FROM ad WHERE id_car = :id_car';
        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'id_car' => $id_car,
        ]);
        $image = $query->fetch();
        if ($image && isset($image->image_car)) {
            $path = $image->image_car;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return $this->requete("DELETE FROM {$this->table} WHERE id_car = ?", [$id_car]);
    }
}