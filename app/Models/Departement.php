<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Shared\ApiRequest\ApiRequestConsumer;

/**
 * Class Departement
 *
 * @property int $id
 * @property string $libelle
 * @property int $region
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Departement extends Model
{
    use ApiRequestConsumer;
    protected $table = 'departements';

    protected $casts = [
        'region' => 'int',
        'inscription' => 'int'
    ];

    protected $fillable = [
        'libelle',
        'region',
        'inscription'
    ];


    public function region()
    {
        return $this->belongsTo(Region::class, 'region');
    }
}
