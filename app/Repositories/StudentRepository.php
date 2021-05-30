<?php

namespace App\Repositories;

use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Models\StudentModel;

class StudentRepository implements StudentRepositoryInterface
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = New StudentModel();
    }

    public function all(){
        return $this->studentModel->all();
    }

    public function page($limit,$keyword){
        $res = $this->studentModel
        ->select('id','username','tel','age','sex','created_at','updated_at');

        if($keyword){
            $res = $res->where('username','like',"%$keyword%");
        }

        $res = $res->paginate($limit);

        return $res;
    }

    public function find($id){
        $res = $this->studentModel->find($id);

        $res->sex_origin = $res->getSexOriginalAttribute();

        return $res;
    }

    public function insert($insertData){
        $this->studentModel->fill($insertData);
        return $this->studentModel->save();
    }

    public function update($id,$updateData){
        $student = $this->studentModel->find($id);

        if(!$student){
            return null;
        }

        $student->fill($updateData);

        return $student->save();
    }

    public function delete($id,$is_physics = false){
        if($is_physics){
            $student = $this->studentModel->find($id);

            if(!$student){
                return null;
            }

            return $student->forceDelete();
        }else{
            return $this->studentModel->destroy($id);
        }
        
    }
}