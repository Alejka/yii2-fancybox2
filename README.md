Fancybox2 Widget for Yii2
=======================

[Yii2](http://www.yiiframework.com) extension for [fancyapps.com/fancybox](http://www.fancyapps.com/fancybox/)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "alejka/yii2-fancybox2" "*"
```
or add

```json
"alejka/yii2-fancybox2" : "*"
```

to the require section of your application's `composer.json` file.


Usage
-----

```
use alejka\fancybox2\FancyBox;

FancyBox::widget([
    'target' => '.fancybox',
    'options' => [
        'loop' => false,
        'padding' => 0,
        'margin' => [15, 15, 60, 15],
        'afterLoad' => new JsExpression("
            function() {
                var list = $('#links');
                if (!list.length) {    
                    list = $('<ul id=\"links\">');
                    for (var i = 0; i < this.group.length; i++) {
                        $('<li data-index=\"' + i + '\"><label></label></li>').click(function() { $.fancybox.jumpto( $(this).data('index'));}).appendTo( list );
                    }
                    list.appendTo('body');
                }
                list.find('li').removeClass('active').eq( this.index ).addClass('active');
            }
        "),
        'beforeClose' => "function() {
            $('#links').remove();
        }",
    ],
]);
```
