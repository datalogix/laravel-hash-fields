<?php

namespace Datalogix\HashFields\Tests;

use Datalogix\HashFields\Tests\Database\Models\User;
use Illuminate\Support\Facades\Hash;

class HashFieldsTest extends TestCase
{
    public function testHashFieldsOnCreate()
    {
        $model = User::create(['name' => 'foo', 'email' => 'email@email.com', 'password' => 'foo']);

        $this->assertTrue(Hash::check('foo', $model->password));
    }

    public function testHashFieldsOnUpdate()
    {
        $model = User::create(['name' => 'foo', 'email' => 'email@email.com', 'password' => 'foo']);
        $model->update(['password' => 'bar']);

        $this->assertTrue(Hash::check('bar', $model->password));
    }

    public function testAlreadyHashedFields()
    {
        $model = User::create(['name' => 'foo', 'email' => 'email@email.com', 'password' => Hash::make('foo')]);

        $this->assertTrue(Hash::check('foo', $model->password));
    }

    public function testMultipleHashFields()
    {
        User::setFieldsToHash(['email', 'password']);

        $model = User::create(['name' => 'foo', 'email' => 'email@email.com', 'password' => Hash::make('foo')]);

        $this->assertTrue(Hash::check('email@email.com', $model->email));
        $this->assertTrue(Hash::check('foo', $model->password));
    }
}
