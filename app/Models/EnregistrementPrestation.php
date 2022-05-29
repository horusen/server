<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Shared\ApiRequest\ApiRequestConsumer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EnregistrementPrestation
 *
 * @property int $id
 * @property int $mutuelle
 * @property int $type_prestation
 * @property Carbon $date
 * @property int $cas_classique_nombre_h
 * @property int $cas_classique_nombre_f
 * @property int $cas_bsf_nombre_h
 * @property int $cas_bsf_nombre_f
 * @property int $cas_cec_nombre_h
 * @property int $cas_cec_nombre_f
 * @property int $cas_eleve_nombre_h
 * @property int $cas_eleve_nombre_f
 * @property int $cas_ndongo_daara_nombre_h
 * @property int $cas_ndongo_daara_nombre_f
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class EnregistrementPrestation extends Model
{
    use ApiRequestConsumer;
    protected $table = 'enregistrement_prestations';
    protected $appends = [
        'cas_classique_nombre_total',
        'cas_bsf_nombre_total',
        'cas_cec_nombre_total',
        'cas_eleve_nombre_total',
        'cas_ndongo_daara_nombre_total',
    ];

    protected $casts = [
        'mutuelle' => 'int',
        'type_prestation' => 'int',
        'cas_classique_nombre_h' => 'int',
        'cas_classique_nombre_f' => 'int',
        'cas_bsf_nombre_h' => 'int',
        'cas_bsf_nombre_f' => 'int',
        'cas_cec_nombre_h' => 'int',
        'cas_cec_nombre_f' => 'int',
        'cas_eleve_nombre_h' => 'int',
        'cas_eleve_nombre_f' => 'int',
        'cas_ndongo_daara_nombre_h' => 'int',
        'cas_ndongo_daara_nombre_f' => 'int',
        'inscription' => 'int'
    ];

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'mutuelle',
        'type_prestation',
        'date',
        'cas_classique_nombre_h',
        'cas_classique_nombre_f',
        'cas_bsf_nombre_h',
        'cas_bsf_nombre_f',
        'cas_cec_nombre_h',
        'cas_cec_nombre_f',
        'cas_eleve_nombre_h',
        'cas_eleve_nombre_f',
        'cas_ndongo_daara_nombre_h',
        'cas_ndongo_daara_nombre_f',
        'inscription'
    ];


    public function type_prestation()
    {
        return $this->belongsTo(TypePrestation::class, 'type_prestation');
    }

    public function mutuelle()
    {
        return $this->belongsTo(MutuelleDeSante::class, 'mutuelle');
    }

    public function getCasClassiqueNombreTotalAttribute()
    {
        return $this->cas_classique_nombre_h + $this->cas_classique_nombre_f;
    }

    public function getCasBsfNombreTotalAttribute()
    {
        return $this->cas_bsf_nombre_h + $this->cas_bsf_nombre_f;
    }

    public function getCasCecNombreTotalAttribute()
    {
        return $this->cas_cec_nombre_h + $this->cas_cec_nombre_f;
    }

    public function getCasEleveNombreTotalAttribute()
    {
        return $this->cas_eleve_nombre_h + $this->cas_eleve_nombre_f;
    }
    public function getCasNdongoDaaraNombreTotalAttribute()
    {
        return $this->cas_ndongo_daara_nombre_h + $this->cas_ndongo_daara_nombre_f;
    }
}
