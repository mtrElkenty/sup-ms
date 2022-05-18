<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $id_employee
 * @property string $nom
 * @property string $prenom
 * @property string $NNI
 * @property string $telephone_1
 * @property string|null $telephone_2
 * @property string|null $email
 * @property string $adress
 * @property string $ville
 * @property string $pays
 * @property string $sexe
 * @property Carbon $date_naissance
 * @property string $lieu_naissance
 * @property Carbon $created_at
 * @property int $fonctions_id_fonction
 * 
 * @property Fonction $fonction
 * @property Collection|Avi[] $avis
 * @property Collection|Professeur[] $professeurs
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	protected $primaryKey = 'id_employee';
	public $timestamps = false;

	protected $casts = [
		'fonctions_id_fonction' => 'int'
	];

	protected $dates = [
		'date_naissance'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'NNI',
		'telephone_1',
		'telephone_2',
		'email',
		'adress',
		'ville',
		'pays',
		'sexe',
		'date_naissance',
		'lieu_naissance',
		'fonctions_id_fonction'
	];

	public function fonction()
	{
		return $this->belongsTo(Fonction::class, 'fonctions_id_fonction');
	}

	public function avis()
	{
		return $this->hasMany(Avi::class, 'employeesid_employee');
	}

	public function professeurs()
	{
		return $this->hasMany(Professeur::class, 'employees_id_employee');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'employees_id_employee');
	}
}
