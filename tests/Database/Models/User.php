<?php

namespace Datalogix\HashFields\Tests\Database\Models;

use Datalogix\HashFields\HashFields;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    use HashFields;
}
