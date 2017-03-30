<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CharacterReference
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $street
 * @property string $city
 * @property string $country
 * @property string $zip_code
 * @property string $landline_number
 * @property string $mobile_numbeer
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereLandlineNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereMiddleName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereMobileNumbeer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CharacterReference whereZipCode($value)
 * @mixin \Eloquent
 */
class CharacterReference extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
