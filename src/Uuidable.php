<?php

namespace Janyk\LaravelUuidable;

use Ramsey\Uuid\Uuid;

trait Uuidable
{
    /**
     * Cast the primary key type as a string.
     *
     * @return void
     */
    public function initializeUuidable(): void
    {
        $this->setKeyType('string');
    }

    /**
     * Set the model to none incrementing.
     *
     * @return bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Set the key of the model to a UUIDable identifier.
     *
     * @return void
     */
    public static function bootUuidable(): void
    {
        static::creating(function ($model) {
            if (! isset($model->attributes[$model->getKeyName()])) {
                $model->incrementing = false;
                $uuid = Uuid::uuid4();
                $model->attributes[$model->getKeyName()] = $uuid->toString();
            }
        }, 0);
    }
}