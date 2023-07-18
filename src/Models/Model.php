<?php
namespace App\Models;
use App\Libraries\Database;

class Model extends Database
{
    // Table de la base de données 
    protected $table;

    // Instance de db 
    private $db;

    public function findAll()
    {
        $query = $this->requete('SELECT * FROM '. $this->table);
        return $query->fetchAll();
    }

    public function findBy(array $criteres)
    {
        $champs =[];
        $valeurs = [];

        foreach($criteres as $champ => $valeur){
            // SELECT * FROM ad WHERE Actif = ? AND signale = 0
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        // Transforme le tableau champs en une chaine de caracteres 
        $list_champs = implode(' AND ', $champs);
        //execute la requete 
        return $this->requete("SELECT * FROM {$this->table} WHERE $list_champs", $valeurs)->fetchAll();
    }

    public function find(string $id_item, int $id)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE $id_item = $id")->fetch();
    }

    public function requete(string $sql, array $attributs = null)
    {
        $this->db = Database::getInstance();

        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            return $this->db->query($sql);
        }
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value){
            //On récupere le nom du setters qui correspond a la clé (key)
            //titre = setTitre
            $setter = 'set'.ucfirst($key);
            // On vérifie si le setter existe :
            if(method_exists($this, $setter)){
                //On apelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }
}