<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cycle
 * 
 * @property int $id_cycle
 * @property string $libelle_cycle
 * @property int $nombre_annees
 * @property Carbon $created_at
 * 
 * @property Collection|Filiere[] $filieres
 * @property Collection|Frai[] $frais
 * @property Collection|Niveau[] $niveaux
 *
 * @package App\Models
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

	public function filieres()
	{
		return $this->hasMany(Filiere::class, 'cyclesid_cycle');
	}

	public function frais()
	{
		return $this->hasMany(Frai::class, 'cyclesid_cycle');
	}

	public function niveaux()
	{
		return $this->hasMany(Niveau::class, 'cyclesid_cycle');
	}
}
