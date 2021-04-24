<?php
namespace brucebnu\widgets\components\viewer;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{
    // public $CssOptions = [
    //     'position' => \yii\web\View::POS_HEAD
    // ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

    public $js = [
        'js/viewer.js',
    ];
    public $css = [
        'css/viewer.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}