<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    const ACCEPTED = 1;
    const PENDING = 2;
    const REJECTED = 3;
}
