<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserAlias
 *
 * @property int $id
 * @property int $user_id
 * @property string $alias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAlias whereAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAlias whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAlias whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAlias whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAlias whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAlias whereUserId($value)
 * @mixin \Eloquent
 */
class UserAlias extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
