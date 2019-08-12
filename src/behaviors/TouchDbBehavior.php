<?php

namespace diecoding\yii2\behaviors;

use Yii;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use diecoding\yii2\helpers\Date as DateHelper;

/**
 * {@inheritDoc}
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2019 Die Coding
 * @license MIT
 * @link https://www.diecoding.com
 * @since 2.0.14
 */
class TouchDbBehavior extends Behavior
{
    /**
     * 
     */
    public $createdAt = 'created_at';

    /**
     * 
     */
    public $updatedAt = 'updated_at';

    /**
     * 
     */
    public $createdUser = 'created_user';

    /**
     * 
     */
    public $updatedUser = 'updated_user';

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'createLog',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'updateLog',
        ];
    }

    /**
     * @param \yii\base\Event $event
     */
    public function createLog(Event $event)
    {
        /**
         * @var ActiveRecord $owner
         */
        $owner = $this->owner;

        $createdAt   = $this->createdAt;
        $updatedAt   = $this->updatedAt;
        $createdUser = $this->createdUser;
        $updatedUser = $this->updatedUser;

        if ($createdAt)
            $owner->$createdAt = DateHelper::currentDateTime();

        if ($updatedAt)
            $owner->$updatedAt = DateHelper::currentDateTime();

        if ($createdUser)
            $owner->$createdUser = @Yii::$app->user->id;

        if ($updatedUser)
            $owner->$updatedUser = @Yii::$app->user->id;

        return $owner;
    }

    /**
     * @param \yii\base\Event $event
     */
    public function updateLog(Event $event)
    {
        /**
         * @var ActiveRecord $owner
         */
        $owner = $this->owner;

        $updatedAt   = $this->updatedAt;
        $updatedUser = $this->updatedUser;

        if ($updatedAt)
            $owner->$updatedAt = DateHelper::currentDateTime();

        if ($updatedUser)
            $owner->$updatedUser = @Yii::$app->user->id;

        return $owner;
    }
}
