<?php

namespace brucebnu\yii2Adminlte3Widgets;

use yii\widgets\Breadcrumbs;
use function ob_end_clean;
use function ob_get_contents;
use function ob_start;
use function strtr;

class LteBreadcrumbs extends Breadcrumbs
{
    public $tag = 'ol';
    
    public $options = ['class' => 'breadcrumb float-sm-right'];
    
    public $itemTemplate = "<li class=\"breadcrumb-item\">{link}</li>";
    
    public $activeItemTemplate = "<li class=\"breadcrumb-item active\">{link}</li>";
    
    public $wrapTemplate = '<nav aria-label="breadcrumb">{breadcrumbs}</nav>';
    
    public function run()
    {
        ob_start();
        parent::run();
        $breadcrumbs = ob_get_contents();
        ob_end_clean();
        echo strtr($this->wrapTemplate, ['{breadcrumbs}' => $breadcrumbs]);
    }
}
