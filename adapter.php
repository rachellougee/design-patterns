<?php 

/*  To translate one interface for a class into a compatible interface. 
     Examples
     - DB Client libraries adapter
     - normalize data so that the outcome is the same for all
   */
  class Storage {
    private $source;
    
    public function __constructor(AdapterInterface $source) {
        $this->source = $source;
    }
    public function getOne(int $id){
        return $this->source->find($id);
    }
    
    public function getAll(array $criteria = []){
        return $this->source->findAll($criteria);
    }
}

interface AdapterInterface {
    public function find(int $id);
    public function findAll(array $criteria = []);
}

class MySqlAdapter implements AdapterInterface {

    public function find(int $id){
        
       return $this->mysql->fetchRow(['id' => $id]);
    }
    public function findAll(array $criteria = []){
             
        return $this->mysql->fetchAll($criteria);

    }
}

$storage = new Storage(new MySqlAdapter($mysql));