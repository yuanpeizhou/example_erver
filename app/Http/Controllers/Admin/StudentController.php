<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StuedntFormRequest;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\StudentRepositoryInterface;

/**
 * 学生控制器
 */
class StudentController extends CommonController
{
    /**数据实现仓库 */
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * 获取学生列表(带分页)
     * @param int $page 当前页
     * @param int $limit 分页大小
     * @param string $keyword 搜索关键词(学生姓名)
     */
    public function studentList(Request $request){
        
        $limit = $request->limit ? $request->limit : 10;
        $keyword = $request->keyword;

        $res = $this->studentRepository->page($limit,$keyword);

        return $this->returnApi(200,'ok',$res->toArray());
    }

    /**
     * 获取学生详情
     * @param int $id 学生id
     */
    public function studentInfo(Request $request){
        $id = $request->id;

        $res = $this->studentRepository->find($id);

        if(!$res){
            return $this->returnApi(201,'参数传递错误');
        }

        return $this->returnApi(200,'ok',$res->toArray());
    }

    /**
     * 新增学生
     * @param string $username  学生姓名
     * @param string $tel  学生电话
     * @param int $age  学生年龄
     * @param int $sex 学生性别 1男 2女
     */
    public function studentInsert(StuedntFormRequest $request){

        $username = $request->username;
        $tel = $request->tel;
        $age = $request->age;
        $sex = $request->sex;

        $insertData = [
            'username' => $username,
            'tel' => $tel,
            'age' => $age,
            'sex' => $sex,
        ];

        $res = $this->studentRepository->insert($insertData);

        if($res === false){
            return $this->returnApi(202,'新增学生失败');
        }

        return $this->returnApi(200,'新增学生成功');
    }

    /**
     * 编辑学生
     * @param int id 学生id
     * @param string $username  学生姓名
     * @param string $tel  学生电话
     * @param int $age  学生年龄
     * @param int $sex 学生性别 1男 2女
     */
    public function studentUpdate(StuedntFormRequest $request){
        $id = $request->id;
        $username = $request->username;
        $tel = $request->tel;
        $age = $request->age;
        $sex = $request->sex;

        $updateData = [
            'username' => $username,
            'tel' => $tel,
            'age' => $age,
            'sex' => $sex,
        ];

        $res = $this->studentRepository->update($id,$updateData);

        if(is_null($res)){
            return $this->returnApi(201,'参数传递错误');
        }

        if($res === false){
            return $this->returnApi(202,'编辑学生失败');
        }

        return $this->returnApi(200,'编辑学生成功');
    }

    /**
     * 删除学生
     * @param int id 学生id
     */
    public function studentDelete(Request $request){
        $id = $request->id;

        $res = $this->studentRepository->delete($id);

        if(is_null($res)){
            return $this->returnApi(201,'参数传递错误');
        }

        if($res === false){
            return $this->returnApi(202,'删除失败');
        }

        return $this->returnApi(200,'删除成功');
    }
}