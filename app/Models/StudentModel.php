<?php
namespace App\Models;

/**学生model */
class StudentModel extends BaseModel
{
    public $table = 'student';

    protected $guarded = [];

    public function getSexOriginalAttribute()
    {
        return $this->attributes['sex'];
    }

    /**
     * 获取用户的性别
     * @param  int  $value
     * @return string
     */
    public function getSexAttribute($value)
    {
        return $value == 1 ? '男' : '女';
    }



//     /**
//      * 修改用户的性别
//      * @param  string  $value
//      * @return int
//      */
//     public function setSexAttribute($value)
//     {
//         return $value == 1 ? '男' : '女';
//     }
}