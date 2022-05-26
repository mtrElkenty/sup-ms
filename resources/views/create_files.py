import os

dirs = [
    'annees_scolaires',
    'avis',
    'cycles',
    'employes',
    'etudiants',
    'evaluations',
    'filieres',
    'fonctions',
    'frais',
    'heures_effectuees',
    'horaires',
    'jours',
    'matieres',
    'matieres_evaluations',
    'matieres_pofesseurs',
    'modules',
    'niveaux',
    'notes',
    'paiement_etudiants',
    'parents_infos',
    'presences',
    'professeurs',
    'roles',
    'seances',
    'semestres',
    'sessions_rattrapages',
    'users'
]

script_path = os.path.dirname(os.path.realpath(__file__))
for dir in dirs:
    new_abs_path = os.path.join(script_path, dir)
    print(new_abs_path)
    if not os.path.exists(new_abs_path):
        os.mkdir(new_abs_path)
        open(os.path.join(new_abs_path, 'index.blade.php'), 'w')
        open(os.path.join(new_abs_path, 'new.blade.php'), 'w')
