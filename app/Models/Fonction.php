<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fonction
 *
 * @property int $id_fonction
 * @property string $fonction
 * @property string|null $description
 * @property Carbon $created_at
 *
 * @property Collection|Employe[] $employes
 *
 * @package App\Models
 * @method static create(array $formFields)
 */
class Fonction extends Model
{
	protected $table = 'fonctions';
	protected $primaryKey = 'id_fonction';
	public $timestamps = false;

	protected $fillable = [
		'fonction',
		'description'
	];

	public function employes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
		return $this->hasMany(Employe::class, 'fonctions_id_fonction');
	}
}
