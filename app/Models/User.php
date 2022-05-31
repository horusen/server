<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Notifications\ValidationInscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Shared\ApiRequest\ApiRequestConsumer;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use ApiRequestConsumer, HasApiTokens, MustVerifyEmail, Notifiable;
    protected $table = 'inscriptions';
    protected $with = ['etat'];

    protected $dates = [
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'name',
        'email',
        'etat',
        'email_verified_at',
        'password',
        'inscription',
        'remember_token'
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new ValidationInscription($this->inscription()->first()));
    }

    public function inscription()
    {
        return $this->belongsTo(User::class, 'inscription');
    }

    public function etat()
    {
        return $this->belongsTo(EtatUser::class, 'etat');
    }
}
