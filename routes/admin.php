<?php

/**后台接口路由分组 */
Route::namespace('Admin')->group(function () {
    /**学生管理路由 */
    Route::get('/student/list', 'StudentController@studentList');//学生列表
    Route::get('/student/info', 'StudentController@studentInfo');//学生详情
    Route::post('/student/insert', 'StudentController@studentInsert');//新增学生
    Route::post('/student/update', 'StudentController@studentUpdate');//编辑学生
    Route::post('/student/delete', 'StudentController@studentDelete');//删除学生
});