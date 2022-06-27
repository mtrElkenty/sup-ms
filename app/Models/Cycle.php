<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Cycle
 *
 * @property int $id_cycle
 * @property string $libelle_cycle
 * @property int $nombre_annees
 * @property Carbon $created_at
 *
 * @property Collection|Filiere[] $filieres
 * @property Collection|Frais[] $frais
 * @property Collection|Niveau[] $niveaux
 *
 * @package App\Models
 * @method static create(array $formFields)
 */
class Cycle extends Model
{
	protected $table = 'cycles';
	protected $primaryKey = 'id_cycle';
	public $timestamps = false;

	protected $casts = [
		'nombre_annees' => 'int'
	];

	protected $fillable = [
		'libelle_cycle',
		'nombre_annees'
	];

    public function filieres(): HasMany
    {
		return $this->hasMany(Filiere::class, 'cycles_id_cycle');
	}

	public function frais(): HasMany
	{
		return $this->hasMany(Frais::class, 'cycles_id_cycle');
	}

	public function niveaux(): HasMany
	{
		return $this->hasMany(Niveau::class, 'cycles_id_cycle');
	}
}
