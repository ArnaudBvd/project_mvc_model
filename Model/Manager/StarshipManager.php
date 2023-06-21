<?php
    class StarshipManager extends DBManager {

        public function getAll(){
            $query = $this->bdd->prepare("SELECT * FROM starship");
            $query->execute();

            $results = $query->fetchAll();

            $starships = [];
            foreach ($results as $res){
                $starships[] = new Starship($res['id'], $res['name'], $res['picture'],
                $res['taille'], $res['fonction']);
            }

            return $starships;
        }

        public function getOne($id) {
            $query = $this->bdd->prepare('SELECT * FROM starship WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $res = $query->fetch();

            $planet = null;

            if($res){
                $starship = new Starship($res['id'], $res['name'], $res['picture'], $res['taille'], $res['fonction']);
            }

            return $starship;
        }


        public function add(Starship $starship){
            $name = $starship->getName();
            $picture = $starship->getPicture();
            $taille = $starship->getTaille();
            $fonction = $starship->getFonction();

            $query = $this->bdd->prepare(
                'INSERT INTO starship ( name, picture, taille, fonction) VALUES ( :name, :picture, :taille, :fonction)'
            );

            $query->bindParam(':name', $name);
            $query->bindParam(':picture', $picture);
            $query->bindParam(':taille', $taille);
            $query->bindParam(':fonction', $fonction);

            $query->execute();

            $starship->setId($this->bdd->lastInsertId());

            return $starship;

        }
    }
