<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property string $address
 * @property string $cep
 * @property string $number
 * @property string|null $complement
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereUserId($value)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{
    protected $fillable = [
        'address',
        'cep',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
    ];

}
