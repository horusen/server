<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Shared\ApiRequest\ApiRequestConsumer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeMutuelleDeSante
 * 
 * @property int $id
 * @property string $libelle
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TypeMutuelleDeSante extends Model
{
	use ApiRequestConsumer;
	protected $table = 'type_mutuelle_de_santes';

	protected $casts = [
		'inscription' => 'int'
	];

	protected $fillable = [
		'libelle',
		'inscription'
	];
}
