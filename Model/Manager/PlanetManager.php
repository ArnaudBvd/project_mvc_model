<?php
    class PlanetManager extends DBManager {

        public function getAll(){
            $query = $this->bdd->prepare("SELECT * FROM planet");
            $query->execute();

            $results = $query->fetchAll();

            $planets = [];
            foreach ($results as $res){
                $planets[] = new Planet($res['id'], $res['name'], $res['description'],
                $res['terrain'], $res['picture']);
            }

            return $planets;
        }

        public function getOne($id) {
            $querry = $this->bdd->prepare('SELECT * FROM planet WHERE id = :id');
            $querry->bindParam(':id', $id);
            $querry->execute();
            $res = $querry->fetch();

            $planet = null;
            if ($res) {
                $planet = new Planet($res['id'], $res['name'], $res['description'], $res['terrain'], $res['picture']);
            return $planet;
            }            
        }


        public function add(Planet $planet){
            $name = $planet->getName();
            $description = $planet->getDescription();
            $terrain = $planet->getTerrain();
            $picture = $planet->getPicture();

            $query = $this->bdd->prepare(
                'INSERT INTO planet ( name, description, terrain, picture) VALUES ( :name, :description, :terrain, :picture)'
            );

            $query->bindParam(':name', $name);
            $query->bindParam(':description', $description);
            $query->bindParam(':terrain', $terrain);
            $query->bindParam(':picture', $picture);

            $query->execute();

            $planet->setId($this->bdd->lastInsertId());

            return $planet;

        }
    }
?>
