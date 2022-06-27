const preparerModifierFonctionModel = (id) => {
    let fonction = document.getElementById(id + "-fonction").innerText,
        description = document.getElementById(id + "-description").innerText;

    document.getElementById("modifierFonctionForm").action += id;
    document.getElementById("modifierFonctionModifierLabel").value = id;
    document.getElementById("fonctionFonctionModel").value = fonction;
    document.getElementById("descriptionFonctionModel").value = description;
};

const preparerSuprimerFonctionModel = (id) => {
    document.getElementById("supprimerFonctionForm").action += id;
    document.getElementById("idFonctionSupprimerModel").value = id;
};

const preparerSuprimerEmployeModel = (id) => {
    document.getElementById("supprimerEmployeForm").action += id;
    document.getElementById("idEmployeSupprimerModel").value = id;
};

const preparerSuprimerEtudiantModel = (id) => {
    document.getElementById("supprimerEtudiantForm").action += id;
    document.getElementById("idEtudiantSupprimerModel").value = id;
};

const preparerModifierCycleModel = (id) => {
    let libelle_cycle = document.getElementById(id + "-libelle_cycle").innerText,
        nombre_annees = document.getElementById(id + "-nombre_annees").innerText;

    document.getElementById("modifierCycleForm").action += id;
    document.getElementById("idCycleModifierModel").value = id;
    document.getElementById("libelleCycleModel").value = libelle_cycle;
    document.getElementById("NombreAnneeCycleModel").value = nombre_annees;
};

const preparerSuprimerCycleModel = (id) => {
    document.getElementById("supprimerCycleForm").action += id;
};

const preparerModifierFiliereModel = (id) => {
    let code_filiere = document.getElementById(id + "-code_filiere").innerText,
        libelle_filiere = document.getElementById(id + "-libelle_filiere").innerText,
        cycles_id_cycle = document.getElementById(id + "-cycles_id_cycle").innerText;

    document.getElementById("modifierFiliereForm").action += id;
    document.getElementById("idFiliereModifierModel").value = id;
    document.getElementById("codeFiliereModifierModel").value = code_filiere;
    document.getElementById("libelleFiliereModifierModel").value = libelle_filiere;
    document.getElementById("CyclesIdCycleModifierModel").value = cycles_id_cycle;

};

const preparerSuprimerFiliereModel = (id) => {
    document.getElementById("supprimerFiliereForm").action += id;
};

const preparerModifierNiveauModel = (id) => {
    let libelle_niveau = document.getElementById(id + "-libelle_niveau").innerText,
        cycles_id_cycle = document.getElementById(id + "-cycles_id_cycle").innerText;

    document.getElementById("modifierNiveauForm").action += id;
    document.getElementById("idNiveauModifierModel").value = id;
    document.getElementById("libelleNiveauModifierModel").value = libelle_niveau;
    document.getElementById("CyclesIdCycleModifierModel").value = cycles_id_cycle;
};

const preparerSuprimerNiveauModel = (id) => {
    document.getElementById("supprimerNiveauForm").action += id;
}
