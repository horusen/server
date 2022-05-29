<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Shared\ApiRequest\ApiRequestConsumer;

/**
 * Class Commune
 *
 * @property int $id
 * @property string $libelle
 * @property int $departement
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Commune extends Model
{
    use ApiRequestConsumer;
    protected $table = 'communes';


    protected $casts = [
        'departement' => 'int',
        'inscription' => 'int'
    ];

    protected $fillable = [
        'libelle',
        'departement',
        'inscription'
    ];


    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement');
    }
}
