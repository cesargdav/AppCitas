<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Match
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $matchMaker
 * @property int $matched
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereMatchMaker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereMatched($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereUpdatedAt($value)
 */
class Match extends Model
{
    const ACCEPTED = 1;
    const PENDING = 2;
    const REJECTED = 3;
}
