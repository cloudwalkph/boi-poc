<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string $street
 * @property string $city
 * @property string $country
 * @property string $zip_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAddress whereZipCode($value)
 * @mixin \Eloquent
 */
class UserAddress extends Model
{
    use SoftDeletes;
}
