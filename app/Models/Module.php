<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 *
 * @property string $libelle_module
 * @property int $id_modules
 * @property Carbon $created_at
 * @property string $code_module
 * @property int $filieres_id_filiere
 * @property int $semestres_id_semestre
 *
 * @property Semestre $semestre
 * @property Filiere $filiere
 * @property Collection|Matiere[] $matieres
 *
 * @package App\Models
 */
class Module extends Model
{
    protected $table = 'modules';
    protected $primaryKey = 'id_modules';
    public $timestamps = false;

    protected $casts = [
        'filieres_id_filiere' => 'int',
        'semestres_id_semestre' => 'int'
    ];

    protected $fillable = [
        'libelle_module',
        'code_module',
        'filieres_id_filiere',
        'semestres_id_semestre'
    ];

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'semestres_id_semestre');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filieres_id_filiere');
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class, 'modules_id_modules');
    }
}