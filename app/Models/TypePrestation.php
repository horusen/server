<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Shared\ApiRequest\ApiRequestConsumer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypePrestation
 * 
 * @property int $id
 * @property string $libelle
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TypePrestation extends Model
{
	use ApiRequestConsumer;
	protected $table = 'type_prestations';

	protected $casts = [
		'inscription' => 'int'
	];

	protected $fillable = [
		'libelle',
		'inscription'
	];
}
