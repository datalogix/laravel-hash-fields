<?php

namespace Datalogix\HashFields;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

trait HashFields
{
    /**
     * The model's fields to hash.
     *
     * @var array
     */
    protected static $fieldsToHash = [
        'password',
    ];

    /**
     * Boot hash fields.
     *
     * @return void
     */
    protected static function bootHashFields()
    {
        static::creating(function ($model) {
            $model->hashFields();
        });

        static::updating(function ($model) {
            $model->hashFields();
        });
    }

    /**
     * Set fields to hash.
     *
     * @param  array  $fieldsToHash
     * @return void
     */
    public static function setFieldsToHash(array $fieldsToHash)
    {
        static::$fieldsToHash = $fieldsToHash;
    }

    /**
     * Hash fields.
     *
     * @return void
     */
    protected function hashFields()
    {
        foreach (Arr::wrap(static::$fieldsToHash) as $field) {
            $this->hashField($field);
        }
    }

    /**
     * Hash field.
     *
     * @param  string  $field
     * @return void
     */
    protected function hashField($field)
    {
        $value = $this->getAttribute($field);

        if (! Hash::needsRehash($value)) {
            return;
        }

        $this->setAttribute($field, Hash::make($value));
    }
}
