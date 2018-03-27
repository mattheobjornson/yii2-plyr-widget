<?php

namespace mattheobjornson\plyr;

class PlyrAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/plyr/dist';

    public $css = [
        'plyr.css',
    ];

    public $js = [
        'plyr.min.js',
    ];

    public $depends = [
    ];
}
