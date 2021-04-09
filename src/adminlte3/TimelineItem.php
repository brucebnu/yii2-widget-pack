<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 3:45
 */

namespace brucebnu\widgets\adminlte3;

use yii\base\BaseObject;

/**
 * You can extend this object with any other property, getters and setters
 **/
class TimelineItem extends BaseObject
{
    public $time = '';
    
    public $header = '';
    
    public $body = '';
    
    public $footer = '';
    
    public $iconClass = '';
    
    public $iconBg = '';
    
}