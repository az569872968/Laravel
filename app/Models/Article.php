<?php
/**
 * Created by PhpStorm.
 * User: zoudan916@163.com
 * Date: 2016/8/23
 * Time: 23:49
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{

    /* 数据库表名 */
    protected $table        = 'article';
    /* 不需要默认时间戳 */
    public $timestamps      = false;
    /* 表字段 */
    public $fields = [
        'title' => '',
        'bewrite' => '',
        'author' => '',
        'scan_num' => 0,
        'user_id' => '',
        'sort' => 0,
        'remark' => '',
    ];

    /**
     * 获取当前时间
     *
     * @return int
     */
    public function freshTimestamp() {
        return time();
    }

    /**
     * 避免转换时间戳为时间字符串
     *
     * @param DateTime|int $value
     * @return DateTime|int
     */
    public function fromDateTime($value) {
        return $value;
    }


    /**
     * select的时候避免转换时间为Carbon
     *
     * @param mixed $value
     * @return mixed
     */
//      protected function asDateTime($value) {
//          return $value;
//      }

    /**
     * 从数据库获取的为获取时间戳格式
     *
     * @return string
     */
    public function getDateFormat() {
        return 'U';
    }
}