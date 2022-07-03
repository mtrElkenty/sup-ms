const preparerModifierFonctionModel = (id) => {
    let fonction = document.getElementById(id + "-fonction").innerText,
        description = document.getElementById(id + "-description").innerText;

    document.getElementById("modifierFonctionForm").action = "/fonctions/" + id;
    document.getElementById("modifierFonctionModifierLabel").value = id;
    document.getElementById("fonctionFonctionModel").value = fonction;
    document.getElementById("descriptionFonctionModel").value = description;
};

const preparerSuprimerFonctionModel = (id) => {
    document.getElementById("supprimerFonctionForm").action =
        "/fonctions/" + id;
    document.getElementById("idFonctionSupprimerModel").value = id;
};

const preparerSuprimerEmployeModel = (id) => {
    document.getElementById("supprimerEmployeForm").action = "/fonctions/" + id;
    document.getElementById("idEmployeSupprimerModel").value = id;
};

const preparerSuprimerEtudiantModel = (id) => {
    document.getElementById("supprimerEtudiantForm").action =
        "/etudiants/" + id;
};

const preparerModifierCycleModel = (id) => {
    let libelle_cycle = document.getElementById(
            id + "-libelle_cycle"
        ).innerText,
        nombre_annees =
            document.getElementById(id + "-nombre_annees").innerText / 1;

    document.getElementById("modifierCycleForm").action = "/cycles/" + id;
    document.getElementById("idCycleModifierModel").value = id;
    document.getElementById("libelleCycleModel").value = libelle_cycle;
    document.getElementById("NombreAnneeCycleModel").value = nombre_annees;
};

const preparerSuprimerCycleModel = (id) => {
    document.getElementById("supprimerCycleForm").action = "/cycles/" + id;
};

const preparerModifierFiliereModel = (id) => {
    let code_filiere = document.getElementById(id + "-code_filiere").innerText,
        libelle_filiere = document.getElementById(
            id + "-libelle_filiere"
        ).innerText,
        cycles_id_cycle =
            document.getElementById("filiere-" + id + "-cycles_id_cycle")
                .innerText / 1;
    console.log(cycles_id_cycle);
    document.getElementById("modifierFiliereForm").action = "/filieres/" + id;
    document.getElementById("idFiliereModifierModel").value = id;
    document.getElementById("codeFiliereModifierModel").value = code_filiere;
    document.getElementById("libelleFiliereModifierModel").value =
        libelle_filiere;
    document.getElementById("CyclesIdCycleFiliereModifierModel").value =
        cycles_id_cycle;
};

const preparerSuprimerFiliereModel = (id) => {
    document.getElementById("supprimerFiliereForm").action = "/filieres/" + id;
};

const preparerModifierNiveauModel = (id) => {
    let libelle_niveau = document.getElementById(
            id + "-libelle_niveau"
        ).innerText,
        cycles_id_cycle =
            document.getElementById("niveau-" + id + "-cycles_id_cycle")
                .innerText / 1;
    document.getElementById("modifierNiveauForm").action = "/niveaux/" + id;
    document.getElementById("idNiveauModifierModel").value = id;
    document.getElementById("libelleNiveauModifierModel").value =
        libelle_niveau;
    document.getElementById("CyclesIdCycleNiveauModifierModel").value =
        cycles_id_cycle;
};

const preparerSuprimerNiveauModel = (id) => {
    document.getElementById("supprimerNiveauForm").action = "/niveaux/" + id;
};

const preparerModifierSemestreModel = (id) => {
    let libelle_semestre = document.getElementById(
            id + "-libelle_semestre"
        ).innerText,
        niveaux_id_niveau =
            document.getElementById(id + "-niveaux_id_niveau").innerText / 1;

    document.getElementById("modifierSemestreForm").action = "/semestres/" + id;
    document.getElementById("idSemestreModifierModel").value = id;
    document.getElementById("libelleSemestreModifierModel").value =
        libelle_semestre;
    console.log(niveaux_id_niveau);
    document.getElementById("NiveauxIdNiveauModifierModel").value =
        niveaux_id_niveau;
};

const preparerSuprimerSemestreModel = (id) => {
    document.getElementById("supprimerSemestreForm").action =
        "/semestres/" + id;
};

const preparerModifierModuleModel = (id) => {
    let code_module = document.getElementById(id + "-code_module").innerText,
        libelle_module = document.getElementById(
            id + "-libelle_module"
        ).innerText,
        filieres_id_filiere =
            document.getElementById("module-" + id + "-filieres_id_filiere")
                .innerText / 1,
        semestres_id_semestre =
            document.getElementById("module-" + id + "-semestres_id_semestre")
                .innerText / 1;
    document.getElementById("modifierModuleForm").action = "/modules/" + id;
    document.getElementById("idModuleModifierModel").value = id;
    document.getElementById("codeModuleModifierModel").value = code_module;
    document.getElementById("libelleModuleModifierModel").value =
        libelle_module;
    document.getElementById("FilieresIdFiliereModuleModifierModel").value =
        filieres_id_filiere;
    document.getElementById("SemestresIdSemestreModuleModifierModel").value =
        semestres_id_semestre;
};

const preparerSuprimerModuleModel = (id) => {
    document.getElementById("supprimerModuleForm").action = "/modules/" + id;
};

const preparerModifierMatiereModel = async (id) => {
    let matiere = await fetch(`/matieres/${id}`)
        .then((res) => {
            return res.json();
        })
        .catch((e) => console.log(e));

    document.getElementById("modifierMatiereForm").action = "/matieres/" + id;

    document.getElementById("codeMatiereModifierModel").value =
        matiere.code_matiere;
    document.getElementById("libelleMatiereModifierModel").value =
        matiere.libelle_matiere;
    document.getElementById("coefficientMatiereModifierModel").value =
        matiere.coefficient;
    document.getElementById("ModulesIdModulesMatiereModifierModel").value =
        matiere.modules_id_modules;
};

const preparerSuprimerMatiereModel = (id) => {
    document.getElementById("supprimerMatiereForm").action = "/matieres/" + id;
};

const prepareAddSeanceModel = (id_horaire, id_jour) => {
    document.getElementById("ajouter_seance_form").reset();
    document.getElementById("horaires_id_horaire").value = id_horaire;
    document.getElementById("jours_id_jour").value = id_jour;
};

const prepareModifierSeance = async (id) => {
    let seance = await fetch(`/seances/${id}`)
        .then((res) => {
            return res.json();
        })
        .catch((err) => console.log(err));

    document.getElementById("modifierSeanceForm").action = "/seances/" + id;

    document.getElementById("seance_rattrapage_modifier_seance").checked =
        seance.seance_rattrapage == 1;
    document.getElementById("horaires_id_horaire_modifier_seance").value =
        seance.horaires_id_horaire;
    document.getElementById("jours_id_jour_modifier_seance").value =
        seance.jours_id_jour;
    document.getElementById("professeurs_id_professeur_modifier_seance").value =
        seance.professeurs_id_professeur;
    document.getElementById("niveaux_id_niveau_modifier_seance").value =
        seance.niveaux_id_niveau;
    document.getElementById("filieres_id_filiere_modifier_seance").value =
        seance.filieres_id_filiere;
    document.getElementById("matieres_id_matiere_modifier_seance").value =
        seance.matieres_id_matiere;
};

const preparerSupprimerSeance = (id) => {
    document.getElementById("supprimerSeanceForm").action = "/seances/" + id;
};
