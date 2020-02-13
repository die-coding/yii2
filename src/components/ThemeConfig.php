<?php

namespace diecoding\components;

use diecoding\base\BaseDiecoding;
use Yii;

/**
 * Config Theme
 *
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2020 Die Coding
 * @license BSD-3-Clause
 * @link https://www.diecoding.com
 * @since 2.0.14
 */
class ThemeConfig extends BaseDiecoding
{
    /**
     * @var string $themePath
     */
    public $themePath;

    /**
     * 
     */
    private $_publisedUrl;
    private $_commonAssetsUrl;

    /**
     * @inheritDoc
     */
    public function init()
    {
        if (!$this->themePath) {
            $dirSystem       = dirname(Yii::getAlias("@common"));
            $this->themePath = "{$dirSystem}/themes";
        }

        parent::init();
    }

    /**
     * 
     */
    public function getPublishedUrl($themeName, $type = null)
    {
        if (!$this->_publisedUrl) {
            $type      = $type ? "/{$type}" : "";
            $path      = "{$this->themePath}/{$themeName}{$type}/assets";
            $options   = [
                'except' => [
                    '*.php',
                ],
            ];
            Yii::$app->assetManager->publish($path, $options);

            $this->_publisedUrl = Yii::$app->assetManager->getPublishedUrl($path);
        }

        return $this->_publisedUrl;
    }

    /**
     *
     */
    public function getCommonAssetsUrl()
    {
        if (!$this->_commonAssetsUrl) {
            $path    = "{$this->themePath}/common/assets";
            $options = [
                'except' => [
                    '*.php',
                ],
            ];
            Yii::$app->assetManager->publish($path, $options);

            $this->_commonAssetsUrl = Yii::$app->assetManager->getPublishedUrl($path);
        }

        return $this->_commonAssetsUrl;
    }
}
