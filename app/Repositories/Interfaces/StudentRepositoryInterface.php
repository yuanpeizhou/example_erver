<?php

namespace App\Repositories\Interfaces;

/**Repository层接口 */
interface StudentRepositoryInterface
{   
    /**查询表单所有数据 */
    public function all();

    /**
     * 分页查询
     * @param int $limit 分页大小
     * @param string keyword 搜索关键词(学生姓名) 
     * @return object
     */
    public function page($limit,$keyword);

    /**
     * 单条查询
     * @param int $id 数据id 
     * @return object|null
     */
    public function find($id);

    /**
     * 单条新增
     * @param array $insertData 新增数据 
     * @return boolean
     */
    public function insert($insertData);

    /**
     * 单条编辑
     * @param int id 数据id 
     * @param array updateData 编辑数据 
     * @return boolean|null
     */
    public function update($id,$updateData);

    /**
     * 单条删除
     * @param int id 数据id 
     * @param boolean is_physics 是否物理删除 true是 false否  
     * @return boolean|null
     */
    public function delete($id,$is_physics = false);
}