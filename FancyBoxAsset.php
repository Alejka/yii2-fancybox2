<?php
namespace alejka\fancybox2;

use yii\web\AssetBundle;

/**
 * FancyBoxAsset
 *
 * @author Aleksey Samokhvalov <samohvalov.aleksey@gmail.com>
 * @link http://alejka.ru
 * @package alejka\fancybox2
 */
class FancyBoxAsset extends AssetBundle
{
    public $sourcePath = '@vendor/alejka/yii2-fancybox2/assets/';

    public $css = [
        'source/jquery.fancybox.css?v=2.1.5',
    ];

    public $js = [
        'lib/jquery.mousewheel-3.0.6.pack.js',
        'source/jquery.fancybox.pack.js?v=2.1.5'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
