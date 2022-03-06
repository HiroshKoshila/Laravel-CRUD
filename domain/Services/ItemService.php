<?php

namespace domain\Services;
use App\Models\Item;

class ItemService{

    protected $task;

     public function __construct(){
         $this->task = new Item;
     }


     //edit
     public function get($it_id){
         return $this->task->find($it_id);
     }

    //update
     public function update(array $data, $it_id){
        $task = $this->task->find($it_id);
        $task->update($this->edit($task, $data));

        //$task->titile = $data['name'];
        //$task->update();
     }

     protected function edit(Item $task, $data){
        return array_merge($task->toArray(), $data);
     }



    public function all(){
        return $this->task->all();
    }

    public function store($data){
        $this->task->create($data);
    }

    public function delete($it_id){
        $task = $this->task->find($it_id);
        $task->delete();
    }

    public function active($it_id){
        $task = $this->task->find($it_id);
        $task->status = 1;
        $task->update();
    }
}
