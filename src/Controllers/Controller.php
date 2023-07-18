<?php
namespace App\Controllers;

abstract class Controller
{
    public function render(string $files, array $data = [])
    {
        //On extrait le contenue de $data
        extract($data);
        //View
        require_once ROOT.'/Views/'.$files.'.php';
    }

    // Upload des fichier :
    protected function upload(?array $files): ?array
    {
        $uploaded = [];
        if (!empty($files['name'][0])) {
            $uploadDirectory = "upload/";
            for ($i = 0; $i < count($files['name']); $i++) {
                $filename = uniqid() . '_' . $files['name'][$i];
                $destination = $uploadDirectory . $filename;
                if (move_uploaded_file($files['tmp_name'][$i], $destination)) {
                    $uploaded[] = $destination;
                } else {
                    $_SESSION['erreur'] = "Erreur sur l'upload des images";
                    return null;
                }
            }
        }
        return $uploaded;
    }
}
