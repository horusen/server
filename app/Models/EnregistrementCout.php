<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Shared\ApiRequest\ApiRequestConsumer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EnregistrementCout
 *
 * @property int $id
 * @property int $mutuelle
 * @property Carbon $date
 * @property int $cas_classique_nombre_h
 * @property int $cas_classique_nombre_f
 * @property int $cas_classique_cout_f
 * @property int $cas_classique_cout_h
 * @property int $cas_bsf_nombre_h
 * @property int $cas_bsf_nombre_f
 * @property int $cas_bsf_cout_f
 * @property int $cas_bsf_cout_h
 * @property int $cas_cec_nombre_h
 * @property int $cas_cec_nombre_f
 * @property int $cas_cec_cout_f
 * @property int $cas_cec_cout_h
 * @property int $cas_eleve_nombre_h
 * @property int $cas_eleve_nombre_f
 * @property int $cas_eleve_cout_f
 * @property int $cas_eleve_cout_h
 * @property int $cas_ndongo_daara_nombre_h
 * @property int $cas_ndongo_daara_nombre_f
 * @property int $cas_ndongo_daara_cout_f
 * @property int $cas_ndongo_daara_cout_h
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class EnregistrementCout extends Model
{
    use ApiRequestConsumer;
    protected $table = 'enregistrement_couts';
    protected $appends = [
        'cas_classique_cout_total',
        'cas_bsf_cout_total',
        'cas_cec_cout_total',
        'cas_eleve_cout_total',
        'cas_ndongo_daara_cout_total',
    ];

    protected $casts = [
        'mutuelle' => 'int',
        'cas_classique_nombre_h' => 'int',
        'cas_classique_nombre_f' => 'int',
        'cas_classique_cout_f' => 'int',
        'cas_classique_cout_h' => 'int',
        'cas_bsf_nombre_h' => 'int',
        'cas_bsf_nombre_f' => 'int',
        'cas_bsf_cout_f' => 'int',
        'cas_bsf_cout_h' => 'int',
        'cas_cec_nombre_h' => 'int',
        'cas_cec_nombre_f' => 'int',
        'cas_cec_cout_f' => 'int',
        'cas_cec_cout_h' => 'int',
        'cas_eleve_nombre_h' => 'int',
        'cas_eleve_nombre_f' => 'int',
        'cas_eleve_cout_f' => 'int',
        'cas_eleve_cout_h' => 'int',
        'cas_ndongo_daara_nombre_h' => 'int',
        'cas_ndongo_daara_nombre_f' => 'int',
        'cas_ndongo_daara_cout_f' => 'int',
        'cas_ndongo_daara_cout_h' => 'int',
        'inscription' => 'int'
    ];

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'mutuelle',
        'date',
        'cas_classique_nombre_h',
        'cas_classique_nombre_f',
        'cas_classique_cout_f',
        'cas_classique_cout_h',
        'cas_bsf_nombre_h',
        'cas_bsf_nombre_f',
        'cas_bsf_cout_f',
        'cas_bsf_cout_h',
        'cas_cec_nombre_h',
        'cas_cec_nombre_f',
        'cas_cec_cout_f',
        'cas_cec_cout_h',
        'cas_eleve_nombre_h',
        'cas_eleve_nombre_f',
        'cas_eleve_cout_f',
        'cas_eleve_cout_h',
        'cas_ndongo_daara_nombre_h',
        'cas_ndongo_daara_nombre_f',
        'cas_ndongo_daara_cout_f',
        'cas_ndongo_daara_cout_h',
        'inscription'
    ];


    public function mutuelle()
    {
        return $this->belongsTo(MutuelleDeSante::class, 'mutuelle');
    }

    public function getCasClassiqueCoutTotalAttribute()
    {
        return $this->cas_classique_cout_h + $this->cas_classique_cout_f;
    }

    public function getCasBsfCoutTotalAttribute()
    {
        return $this->cas_bsf_cout_h + $this->cas_bsf_cout_f;
    }

    public function getCasCecCoutTotalAttribute()
    {
        return $this->cas_cec_cout_h + $this->cas_cec_cout_f;
    }

    public function getCasEleveCoutTotalAttribute()
    {
        return $this->cas_eleve_cout_h + $this->cas_eleve_cout_f;
    }
    public function getCasNdongoDaaraCoutTotalAttribute()
    {
        return $this->cas_ndongo_daara_cout_h + $this->cas_ndongo_daara_cout_f;
    }
}
