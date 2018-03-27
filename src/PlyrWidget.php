<?php

namespace mattheobjornson\plyr;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

class PlyrWidget extends \yii\base\Widget
{
    /**
     * @var array
     */
    public $options = [];
    /**
     * @var array
     */
    public $jsOptions = [];
    /**
     * @var array
     */
    public $tags = [];

    private $type = "video";

    private $view;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initOptions();

        $this->view = $this->getView();
        PlyrAsset::register($this->view);

        $this->runWidget();
    }

    /**
     * Initializes the widget options
     */
    protected function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = 'plyr-' . $this->getId();
        }
        if(isset($this->options['type']) && $this->options['type'] === 'audio')
            $this->type = 'audio';
        else
            $this->type = 'video';
    }

    public function runWidget()
    {

        echo "\n" . Html::beginTag($this->type, $this->options);
        if (!empty($this->tags) && is_array($this->tags)) {
            foreach ($this->tags as $tagName => $tags) {
                if (is_array($this->tags[$tagName])) {
                    foreach ($tags as $tagOptions) {
                        $tagContent = '';
                        if (isset($tagOptions['content'])) {
                            $tagContent = $tagOptions['content'];
                            unset($tagOptions['content']);
                        }
                        echo "\n" . Html::tag($tagName, $tagContent, $tagOptions);
                    }
                } else {
                    throw new InvalidConfigException("Invalid config for 'tags' property.");
                }
            }
        }
        echo "\n" .Html::endTag($this->type);

        if (!empty($this->jsOptions)) {
            $js = 'new Plyr("#' . $this->options['id'] . '", ' . Json::encode($this->jsOptions). ');';
            $this->view->registerJs($js);
        }
        else {
            $js = 'new Plyr("#' . $this->options['id'] . '");';
            $this->view->registerJs($js);
        }
    }
}
