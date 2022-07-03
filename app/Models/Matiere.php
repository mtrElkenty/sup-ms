<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matiere
 *
 * @property int $id_matiere
 * @property string $code_matiere
 * @property string $libelle_matiere
 * @property int $coefficient
 * @property Carbon $created_at
 * @property int $modules_id_modules
 *
 * @property Module $module
 * @property Collection|Evaluation[] $evaluations
 * @property Collection|MatieresPofesseur[] $matieres_pofesseurs
 * @property Collection|Note[] $notes
 * @property Collection|Seance[] $seances
 * @property Collection|SessionsRattrapage[] $sessions_rattrapages
 *
 * @package App\Models
 */
class Matiere extends Model
{
    protected $table = 'matieres';
    protected $primaryKey = 'id_matiere';
    public $timestamps = false;

    protected $casts = [
        'coefficient' => 'int',
        'modules_id_modules' => 'int'
    ];

    protected $fillable = [
        'code_matiere',
        'libelle_matiere',
        'coefficient',
        'modules_id_modules'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'modules_id_modules');
    }

    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class, 'matieres_evaluations', 'matieres_id_matiere', 'evaluations_id_evaluation')
            ->withPivot('id_matiere_evaluation', 'jours_id_jour', 'horaires_id_horaire');
    }

    public function matieres_pofesseurs()
    {
        return $this->hasMany(MatieresPofesseur::class, 'matieres_id_matiere');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'matieres_id_matiere');
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, 'matieres_id_matiere');
    }

    public function sessions_rattrapages()
    {
        return $this->hasMany(SessionsRattrapage::class, 'matieres_id_matiere');
    }
}