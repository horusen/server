<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Shared\ApiRequest\ApiRequestConsumer;

/**
 * Class Region
 *
 * @property int $id
 * @property string $libelle
 * @property int $inscription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Region extends Model
{
	use ApiRequestConsumer;
	protected $table = 'regions';

	protected $casts = [
		'inscription' => 'int'
	];

	protected $fillable = [
		'libelle',
		'inscription'
	];
}
