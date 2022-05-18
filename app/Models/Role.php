<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id_role
 * @property string $role
 * @property string|null $description
 * @property Carbon $created_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'id_role';
	public $timestamps = false;

	protected $fillable = [
		'role',
		'description'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'roles_id_role');
	}
}
