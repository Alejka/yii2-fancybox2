<?php
namespace alejka\fancybox2;

use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * FancyBox Widget
 *
 * @version 0.0.2
 * @author Aleksey Samokhvalov <samohvalov.aleksey@gmail.com>
 * @link http://alejka.ru
 * @package alejka\fancybox2
 */
class FancyBox extends Widget
{
    public $target; 
    public $options = [];
    public $callbacks = [
        'onCancel',
        'beforeLoad',
        'afterLoad',
        'beforeShow',
        'afterShow',
        'beforeClose',
        'afterClose',
        'onUpdate',
        'onPlayStart',
        'onPlayEnd',
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!$this->target) {
            throw new InvalidConfigException('The "target" property is required.');
        }
         if (!is_array($this->options)) {
            throw new InvalidConfigException('The "options" property must be an array');
        }
        foreach ($this->callbacks as $callbackName) {
            if (isset($this->options[$callbackName]) && !($this->options[$callbackName] instanceof JsExpression)) {
                $this->options[$callbackName] = new JsExpression($this->options[$callbackName]);
            }
        }
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
    }
    
    /**
     * Registers the client script required for the plugin
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        FancyBoxAsset::register($view);
        
        $config = !empty($this->options) ? Json::encode($this->options) : null;
        $view->registerJs("jQuery('{$this->target}').fancybox({$config});");
    }
    
}
