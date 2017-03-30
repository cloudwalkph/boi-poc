<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $birthday
 * @property string $height
 * @property string $weight
 * @property string $birth_country
 * @property string $civil_status
 * @property string $profile_picture
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $full_name
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereBirthCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereCivilStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereMiddleName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereProfilePicture($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereWeight($value)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->attributes['first_name'] . ' ' . $this->attributes['last_name']);
    }
}
