<?php

namespace App\Models;
use App\Libraries\Database;
use PDO;

class ReviewModel extends Model
{
    protected ?int $id_review = null;
    protected ?string $name_review = null;
    protected ?int $grade_review = null;
    protected ?string $comment_review = null;
    protected ?int $accept_review = 1;

    public function __construct()
    {
        $this->table = 'review';
    }

    /**
     * Get the value of id_review
     */ 
    public function getId_review()
    {
        return $this->id_review;
    }

    /**
     * Set the value of id_review
     *
     * @return  self
     */ 
    public function setId_review($id_review)
    {
        $this->id_review = $id_review;

        return $this;
    }

    /**
     * Get the value of name_review
     */ 
    public function getName_review()
    {
        return $this->name_review;
    }

    /**
     * Set the value of name_review
     *
     * @return  self
     */ 
    public function setName_review($name_review)
    {
        $this->name_review = $name_review;

        return $this;
    }

    /**
     * Get the value of grade_review
     */ 
    public function getGrade_review()
    {
        return $this->grade_review;
    }

    /**
     * Set the value of grade_review
     *
     * @return  self
     */ 
    public function setGrade_review($grade_review)
    {
        $this->grade_review = $grade_review;

        return $this;
    }

    /**
     * Get the value of comment_review
     */ 
    public function getComment_review()
    {
        return $this->comment_review;
    }

    /**
     * Set the value of comment_review
     *
     * @return  self
     */ 
    public function setComment_review($comment_review)
    {
        $this->comment_review = $comment_review;

        return $this;
    }
/**
     * Get the value of accept_review
     */ 
    public function getAccept_review()
    {
        return $this->accept_review;
    }

    /**
     * Set the value of accept_review
     *
     * @return  self
     */ 
    public function setAccept_review($accept_review)
    {
        $this->accept_review = $accept_review;

        return $this;
    }

    public function create(array $data):bool
    {
        $sql = "INSERT INTO {$this->table} (name_review, surname_review, grade_review, comment_review, accept_review)
                VALUES (:name_review, :surname_review, :grade_review, :comment_review, :accept_review)";
        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'name_review' => $data['name_review'],
            'surname_review' => $data['surname_review'],
            'grade_review' => $data['grade_review'],
            'comment_review' => $data['comment_review'],
            'accept_review' => $data['accept_review'],
        ]);
        return true;
    }

    public function getReviews()
    {
        $db = new Database(); // Créez une nouvelle instance de la classe Database
        $query = "SELECT * FROM review WHERE accept_review = 2";
        $result = $db->query($query);
    
        $reviews = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $review = new ReviewModel();
            $review->setId_review($row['id_review']);
            $review->setName_review($row['name_review']);
            $review->setGrade_review($row['grade_review']);
            $review->setComment_review($row['comment_review']);
            $reviews[] = $review;
        }
        return $reviews;
    }

    public function updateAcceptReview($id_review, $accept_review)
    {
        $sql = "UPDATE review SET accept_review = :accept_review WHERE id_review = :id_review";
        $query = Database::getInstance()->prepare($sql);
        $query->execute([
            'accept_review' => $accept_review,
            'id_review' => $id_review,
            ]);
        return $query->rowCount() > 0;
    }

    public function delete(int $id_review)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id_review = ?", [$id_review]);
    }
} 