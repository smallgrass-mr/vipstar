<?php

namespace app\common\model;

use think\Model;

/**
 * 信息模型
 */
class Information extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'datetime';
    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    /**
     * 获取个人URL
     * @param   string $value
     * @param   array  $data
     * @return string
     */
    public function getUrlAttr($value, $data)
    {
        return "/u/" . $data['id'];
    }

    /**
     * 获取图片
     * @param   string $value
     * @param   array  $data
     * @return string
     */
    public function getImageAttr($value, $data)
    {
        if (!$value) {
            //如果不需要启用首字母头像，请使用
            //$value = '/assets/img/avatar.png';
            $value = letter_avatar($data['image']);
        }
        return $value;
    }


}
