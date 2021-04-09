<?php


namespace brucebnu\widgets\adminlte3;

use yii\web\AssetBundle;

/**
 * Class CollapseBoxAsset
 *
 * @package insolita\wgadminlte
 */
class CollapseBoxAsset extends AssetBundle
{
    /**
     * @var string
     */
    // public $sourcePath = '@vendor/insolita/yii2-adminlte-widgets/js';
    
    /**
     * @var array
     */
    public $js
        = [
            'js/collapsebox24.2.js',
        ];
    
    /**
     * @var array
     */
    public $depends
        = [
            'yii\web\YiiAsset',
            'brucebnu\widgets\adminlte3\JsCookieAsset',
        ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/';
//        $this->setSourcePath(__DIR__ . '/');
//        $this->setupAssets('css', ['css/']);
//        $this->setupAssets('js', ['js/']);
        parent::init();
    }
}

