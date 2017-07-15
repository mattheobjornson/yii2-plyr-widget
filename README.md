yii2-plyr-widget
================

Usage
-----

Insert audio

```php
<?php
echo \mattheobjornson\plyr\PlyrWidget::widget([
    'options' => [
        'type' => 'audio',
        'preload' => 'none',
    ],
    'tags' => [
        'source' => [
            ['src' => 'https://cdn.selz.com/plyr/1.5/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3', 'type' => 'audio/mp3']
        ],
    ]
]);
?>
```

Insert video

```php
<?php
echo \mattheobjornson\plyr\PlyrWidget::widget([
    'options' => [
        'type' => 'video',
        'preload' => 'none',
    ],
    'tags' => [
        'source' => [
            ['src' => 'https://cdn.selz.com/plyr/1.5/View_From_A_Blue_Moon_Trailer-HD.mp4', 'type' => 'video/mp4'],
            ['src' => 'https://cdn.selz.com/plyr/1.5/View_From_A_Blue_Moon_Trailer-HD.webm', 'type' => 'video/webm']
        ],
    ]
]);
?>
```