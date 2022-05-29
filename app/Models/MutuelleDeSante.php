<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Shared\ApiRequest\ApiRequestConsumer;

/**
 * Class MutuelleDeSante
 *
 * @property int $id
 * @property string $libelle
 * @property int $type
 * @property int $commune
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class MutuelleDeSante extends Model
{
    use ApiRequestConsumer;
    protected $table = 'mutuelle_de_santes';

    protected $casts = [
        'type' => 'int',
        'commune' => 'int',
        'inscription' => 'int'
    ];

    protected $fillable = [
        'libelle',
        'type',
        'commune',
        'inscription'
    ];

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune');
    }

    public function getDepartementAttribute()
    {
        return $this->commune()->departement;
    }

    public function type()
    {
        return $this->belongsTo(TypeMutuelleDeSante::class, 'type');
    }
}
