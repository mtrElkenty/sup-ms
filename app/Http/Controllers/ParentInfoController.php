<?php
namespace App\Http\Controllers;

use App\Models\ParentsInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ParentInfoController extends Controller {
    public static function index(): Collection {
        return ParentsInfo::all();
    }

    public function create(Request $request): RedirectResponse {
        $new_parent = $request->validate([
            'nom_pere' => ['required'],
            'prenom_pere' => ['required'],
            'nom_mere' => ['required'],
            'prenom_mere' => ['required'],
            'contact' => ['required']
        ]);
        ParentsInfo::create($new_parent);
        return  back()->with('message', 'Parents Ajoutes Avec Succee');
    }
}
