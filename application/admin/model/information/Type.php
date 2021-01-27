<?php

namespace app\admin\model\information;

use think\Model;


class Type extends Model
{

    

    

    // 表名
    protected $name = 'information_type';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

    







}
