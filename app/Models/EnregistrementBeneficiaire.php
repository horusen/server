<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Shared\ApiRequest\ApiRequestConsumer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EnregistrementBeneficiaire
 *
 * @property int $id
 * @property int $mutuelle
 * @property Carbon $date
 * @property string|null $nombre_adherent
 * @property string|null $nombre_beneficiaire
 * @property string|null $nombre_beneficiaire_a_jour
 * @property string|null $dette_etat
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class EnregistrementBeneficiaire extends Model
{
    use ApiRequestConsumer;
    protected $table = 'enregistrement_beneficiaires';

    protected $casts = [
        'mutuelle' => 'int',
        'inscription' => 'int'
    ];

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'mutuelle',
        'date',
        'nombre_adherent',
        'nombre_beneficiaire',
        'nombre_beneficiaire_a_jour',
        'dette_etat',
        'inscription'
    ];


    public function mutuelle()
    {
        return $this->belongsTo(MutuelleDeSante::class, 'mutuelle');
    }
}
