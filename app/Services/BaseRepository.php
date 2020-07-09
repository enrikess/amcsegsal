<?php

namespace App\Services;

abstract class BaseRepository {

    abstract public function getModel();

    public function find($id){
        return $this->getModel()->find($id);
    }


    public function getAll(){
        return $this->getModel()->all();
    }

    public function create($data){
        return $this->getModel()->create($data);
    }

    public function update($object,$data){
        $object->fill($data);
        $object->save();
        return $object;
    }

    public function delete($object){
        $object->delete();
    }
}
