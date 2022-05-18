<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Avi
 * 
 * @property int $id_avis
 * @property string|null $titre_avis
 * @property string|null $description_avis
 * @property Carbon $created_at
 * @property int $employeesid_employee
 * @property int $filieresid_filiere
 * @property int $niveausid_niveau
 * 
 * @property Niveau $niveau
 * @property Employee $employee
 * @property Filiere $filiere
 *
 * @package App\Models
 */
class Avi extends Model
{
	protected $table = 'avis';
	protected $primaryKey = 'id_avis';
	public $timestamps = false;

	protected $casts = [
		'employeesid_employee' => 'int',
		'filieresid_filiere' => 'int',
		'niveausid_niveau' => 'int'
	];

	protected $fillable = [
		'titre_avis',
		'description_avis',
		'employeesid_employee',
		'filieresid_filiere',
		'niveausid_niveau'
	];

	public function niveau()
	{
		return $this->belongsTo(Niveau::class, 'niveausid_niveau');
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employeesid_employee');
	}

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieresid_filiere');
	}
}
