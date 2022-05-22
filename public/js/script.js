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
    document.getElementById("supprimerFonctionSuprimerLabel").value = id;
};
