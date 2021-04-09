<?php


namespace brucebnu\widgets\adminlte3;

use \yii\web\AssetBundle;

class JsCookieAsset extends AssetBundle
{
    public $sourcePath = '@bower/js-cookie';
    
    public $js
        = [
            'src/js.cookie.js',
        ];
    
    public $depends
        = [
            'yii\web\YiiAsset',
        ];
}

