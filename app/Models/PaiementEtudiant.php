<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaiementEtudiant
 * 
 * @property int $id_paiement_etudiant
 * @property float $montant_paye
 * @property float $montant_restant
 * @property Carbon $created_at
 * @property int $etudiants_id_etudiant
 * @property int $frais_id_frais
 * 
 * @property Frais $frais
 * @property Etudiant $etudiant
 *
 * @package App\Models
 */
class PaiementEtudiant extends Model
{
	protected $table = 'paiement_etudiants';
	protected $primaryKey = 'id_paiement_etudiant';
	public $timestamps = false;

	protected $casts = [
		'montant_paye' => 'float',
		'montant_restant' => 'float',
		'etudiants_id_etudiant' => 'int',
		'frais_id_frais' => 'int'
	];

	protected $fillable = [
		'montant_paye',
		'montant_restant',
		'etudiants_id_etudiant',
		'frais_id_frais'
	];

	public function frais()
	{
		return $this->belongsTo(Frais::class, 'frais_id_frais');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'etudiants_id_etudiant');
	}
}
