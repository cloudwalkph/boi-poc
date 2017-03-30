<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TravelInformation
 *
 * @property int $id
 * @property int $user_id
 * @property string $passport_number
 * @property string $expiration_date
 * @property string $place_of_issuance
 * @property string $latest_arrival
 * @property string $flight_number
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereExpirationDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereFlightNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereLatestArrival($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation wherePassportNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation wherePlaceOfIssuance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TravelInformation whereUserId($value)
 * @mixin \Eloquent
 */
class TravelInformation extends Model
{
    use SoftDeletes;
}
