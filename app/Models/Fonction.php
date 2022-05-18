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
 * @property Collection|Employee[] $employees
 *
 * @package App\Models
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

	public function employees()
	{
		return $this->hasMany(Employee::class, 'fonctions_id_fonction');
	}
}
