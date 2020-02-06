<?php

namespace diecoding\components;

use Yii;
use yii\base\Component;

/**
 * Config Theme
 *
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2020 Die Coding
 * @license BSD-3-Clause
 * @link https://www.diecoding.com
 * @since 2.0.14
 */
class ThemeConfig extends Component
{
    /**
     * @var string $themePath
     */
    public $themePath;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $dirSystem       = dirname(Yii::getAlias("@common"));
        $this->themePath = "{$dirSystem}/themes";

        parent::init();
    }

    /**
     * 
     */
    public function getPublishedUrl($themeName, $type = null)
    {
        $type      = $type ? "/{$type}" : "";
        $path      = "{$this->themePath}/{$themeName}{$type}/assets";
        $options   = [
            'except' => [
                '*.php',
            ],
        ];
        Yii::$app->assetManager->publish($path, $options);

        return Yii::$app->assetManager->getPublishedUrl($path);
    }

    /**
     *
     */
    public function getCommonAssetsUrl()
    {
        $path    = "{$this->themePath}/common/assets";
        $options = [
            'except' => [
                '*.php',
            ],
        ];
        Yii::$app->assetManager->publish($path, $options);

        return Yii::$app->assetManager->getPublishedUrl($path);
    }
}
