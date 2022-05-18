CREATE TABLE `employees` (
  `id_employee`           int(10) NOT NULL AUTO_INCREMENT, 
  `nom`                   varchar(255) NOT NULL, 
  `prenom`                varchar(255) NOT NULL, 
  `NNI`                   char(10) NOT NULL UNIQUE, 
  `telephone_1`           varchar(255) NOT NULL UNIQUE, 
  `telephone_2`           varchar(255), 
  `email`                 varchar(255) UNIQUE, 
  `adress`                varchar(255) NOT NULL, 
  `ville`                 varchar(255) NOT NULL, 
  `pays`                  varchar(255) NOT NULL, 
  `sexe`                  varchar(255) NOT NULL, 
  `date_naissance`        date NOT NULL, 
  `lieu_naissance`        varchar(255) NOT NULL, 
  `created_at`            timestamp DEFAULT current_timestamp NOT NULL, 
  `fonctions_id_fonction` int(10) NOT NULL, 
  PRIMARY KEY (`id_employee`));
CREATE TABLE `professeurs` (
  `id_professeur`         int(10) NOT NULL AUTO_INCREMENT, 
  `created_at`            timestamp DEFAULT current_timestamp NULL, 
  `employees_id_employee` int(10) NOT NULL, 
  PRIMARY KEY (`id_professeur`));
CREATE TABLE `annees_scolaires` (
  `id_annee_scolaire` int(10) NOT NULL AUTO_INCREMENT, 
  `created_at`        timestamp NULL, 
  PRIMARY KEY (`id_annee_scolaire`));
CREATE TABLE `semestres` (
  `id_semestre`       int(10) NOT NULL AUTO_INCREMENT, 
  `libelle_semestre`  varchar(255) NOT NULL UNIQUE, 
  `created_at`        timestamp NULL, 
  `niveaus_id_niveau` int(10) NOT NULL, 
  PRIMARY KEY (`id_semestre`));
CREATE TABLE `fonctions` (
  `id_fonction` int(10) NOT NULL AUTO_INCREMENT, 
  `fonction`    varchar(255) NOT NULL UNIQUE, 
  `description` text, 
  `created_at`  timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (`id_fonction`));
CREATE TABLE `users` (
  `id_user`               int(11) NOT NULL AUTO_INCREMENT, 
  `username`              varchar(255) NOT NULL UNIQUE, 
  `password`              text NOT NULL, 
  `created_at`            timestamp DEFAULT current_timestamp() NULL, 
  `employees_id_employee` int(10) NOT NULL, 
  `roles_id_role`         int(10) NOT NULL, 
  PRIMARY KEY (`id_user`));
CREATE TABLE `roles` (
  `id_role`     int(10) NOT NULL AUTO_INCREMENT, 
  `role`        varchar(255) NOT NULL UNIQUE, 
  `description` text, 
  `created_at`  timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (`id_role`));
CREATE TABLE `parents_infos` (
  `id_parent`  int(10) NOT NULL AUTO_INCREMENT, 
  `created_at` timestamp NULL, 
  PRIMARY KEY (`id_parent`));
CREATE TABLE `etudiants` (
  `id_etudiant`             bigint(19) NOT NULL AUTO_INCREMENT, 
  `matricule`               varchar(255) NOT NULL UNIQUE, 
  `nom`                     varchar(255) NOT NULL, 
  `prenom`                  varchar(255) NOT NULL, 
  `NNI`                     char(10) NOT NULL UNIQUE, 
  `telephone`               varchar(255) NOT NULL UNIQUE, 
  `email`                   varchar(255) UNIQUE, 
  `adress`                  varchar(255) NOT NULL, 
  `ville`                   varchar(255) NOT NULL, 
  `pays`                    varchar(255) NOT NULL, 
  `sexe`                    varchar(255) NOT NULL, 
  `date_naissance`          date NOT NULL, 
  `lieu_naissance`          varchar(255) NOT NULL, 
  `situation_famille`       varchar(255) NOT NULL, 
  `created_at`              timestamp DEFAULT current_timestamp NOT NULL, 
  `parents_infos_id_parent` int(10) NOT NULL, 
  `niveaus_id_niveau`       int(10) NOT NULL, 
  `filieres_id_filiere`     int(10) NOT NULL, 
  PRIMARY KEY (`id_etudiant`));
CREATE TABLE `matieres` (
  `id_matiere`         int(10) NOT NULL AUTO_INCREMENT, 
  `code_matiere`       varchar(255) NOT NULL UNIQUE, 
  `libelle_matiere`    varchar(255) NOT NULL, 
  `coefficient`        int(10) NOT NULL, 
  `created_at`         timestamp NOT NULL, 
  `modules_id_modules` int(10) NOT NULL, 
  PRIMARY KEY (`id_matiere`));
CREATE TABLE `notes` (
  `id_note`                           int(10) NOT NULL AUTO_INCREMENT, 
  `cc`                                float DEFAULT 0, 
  `cp`                                float DEFAULT 0, 
  `moyenne_generale`                  float DEFAULT 0, 
  `cp_ratrapage`                      float DEFAULT 0, 
  `created_at`                        timestamp NULL, 
  `semestres_id_semestre`             int(10) NOT NULL, 
  `etudiants_id_etudiant`             bigint(19) NOT NULL, 
  `matieres_id_matiere`               int(10) NOT NULL, 
  `annees_scolairesid_annee_scolaire` int(10) NOT NULL, 
  PRIMARY KEY (`id_note`));
CREATE TABLE `modules` (
  `libelle_module`       varchar(255) NOT NULL UNIQUE, 
  `id_modules`           int(10) NOT NULL AUTO_INCREMENT, 
  `created_at`           timestamp NOT NULL, 
  `code_module`          varchar(255) NOT NULL UNIQUE, 
  `filieresid_filiere`   int(10) NOT NULL, 
  `semestresid_semestre` int(10) NOT NULL, 
  PRIMARY KEY (`id_modules`));
CREATE TABLE `filieres` (
  `id_filiere`      int(10) NOT NULL AUTO_INCREMENT, 
  `code_filiere`    varchar(255) NOT NULL UNIQUE, 
  `libelle_filiere` varchar(255) NOT NULL UNIQUE, 
  `created_at`      timestamp NOT NULL, 
  `cyclesid_cycle`  int(10) NOT NULL, 
  PRIMARY KEY (`id_filiere`));
CREATE TABLE `niveaus` (
  `id_niveau`      int(10) NOT NULL AUTO_INCREMENT, 
  `libelle_niveau` varchar(255) NOT NULL UNIQUE, 
  `created_at`     timestamp NULL, 
  `cyclesid_cycle` int(10) NOT NULL, 
  PRIMARY KEY (`id_niveau`));
CREATE TABLE `matieres_pofesseurs` (
  `id_matiere_pofesseur`      int(10) NOT NULL AUTO_INCREMENT, 
  `matieres_id_matiere`       int(10) NOT NULL, 
  `professeurs_id_professeur` int(10) NOT NULL, 
  `created_at`                timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (`id_matiere_pofesseur`));
CREATE TABLE `presences` (
  `id_presence`           int(10) NOT NULL AUTO_INCREMENT, 
  `present`               tinyint(3) DEFAULT 1 NOT NULL, 
  `created_at`            timestamp DEFAULT current_timestamp NOT NULL, 
  `etudiants_id_etudiant` bigint(19) NOT NULL, 
  `seances_id_seance`     int(10) NOT NULL, 
  CONSTRAINT `id_presence` 
    PRIMARY KEY (`id_presence`));
CREATE TABLE `cycles` (
  `id_cycle`      int(10) NOT NULL AUTO_INCREMENT, 
  `libelle_cycle` varchar(255) NOT NULL UNIQUE, 
  `nombre_annees` int(10) DEFAULT 1 NOT NULL, 
  `created_at`    timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (`id_cycle`));
CREATE TABLE `jours` (
  `id_jour`    int(10) NOT NULL AUTO_INCREMENT, 
  `jour`       varchar(255) NOT NULL UNIQUE, 
  `created_at` timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (`id_jour`));
CREATE TABLE `horaires` (
  `id_horaire` int(10) NOT NULL AUTO_INCREMENT, 
  `du`         time NOT NULL UNIQUE, 
  `a`          time NOT NULL UNIQUE, 
  `created_at` timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (`id_horaire`));
CREATE TABLE `seances` (
  `id_seance`                 int(10) NOT NULL AUTO_INCREMENT, 
  `seance_rattrapage`         tinyint(3) DEFAULT 0 NOT NULL, 
  `created_at`                timestamp DEFAULT current_timestamp NOT NULL, 
  `horaires_id_horaire`       int(10) NOT NULL, 
  `jours_id_jour`             int(10) NOT NULL, 
  `professeurs_id_professeur` int(10) NOT NULL, 
  `niveaus_id_niveau`         int(10) NOT NULL, 
  `filieres_id_filiere`       int(10) NOT NULL, 
  `matieres_id_matiere`       int(10) NOT NULL, 
  CONSTRAINT `id_seance` 
    PRIMARY KEY (`id_seance`));
CREATE TABLE `sessions_rattrapages` (
  `id_session_rattrapage` int(10) NOT NULL AUTO_INCREMENT, 
  `created_at`            timestamp DEFAULT current_timestamp NOT NULL, 
  `matieres_id_matiere`   int(10) NOT NULL, 
  `etudiants_id_etudiant` bigint(19) NOT NULL, 
  PRIMARY KEY (`id_session_rattrapage`));
CREATE TABLE `evaluations` (
  `id_evaluation`        int(10) NOT NULL AUTO_INCREMENT, 
  `type`                 varchar(255) NOT NULL, 
  `libelle_evaluation`   varchar(255) NOT NULL, 
  `date_debut`           date NOT NULL, 
  `date_fin`             date NOT NULL, 
  `created_at`           timestamp DEFAULT current_timestamp NOT NULL, 
  `filieres_id_filiere`  int(10) NOT NULL, 
  `niveaus_id_niveau`    int(10) NOT NULL, 
  `semestresid_semestre` int(10) NOT NULL, 
  CONSTRAINT `evaluations` 
    PRIMARY KEY (`id_evaluation`));
CREATE TABLE `matieres_evaluations` (
  `id_matiere_evaluation`     int(10) NOT NULL AUTO_INCREMENT, 
  `matieres_id_matiere`       int(10) NOT NULL, 
  `evaluations_id_evaluation` int(10) NOT NULL, 
  `jours_id_jour`             int(10) NOT NULL, 
  `horaires_id_horaire`       int(10) NOT NULL, 
  `created_at`                timestamp DEFAULT current_timestamp NULL, 
  PRIMARY KEY (`id_matiere_evaluation`));
CREATE TABLE `heures_effectuees` (
  `id_heure_effectuee`       int(10) NOT NULL AUTO_INCREMENT, 
  `created_at`               timestamp DEFAULT current_timestamp NOT NULL, 
  `professeursid_professeur` int(10) NOT NULL, 
  PRIMARY KEY (`id_heure_effectuee`));
CREATE TABLE `frais` (
  `id_frais`                                  int(10) NOT NULL AUTO_INCREMENT, 
  `frais`                                     int(10) NOT NULL, 
  `libelle_frais`                             varchar(255) NOT NULL UNIQUE, 
  `created_at`                                timestamp DEFAULT current_timestamp NOT NULL, 
  `matieres_evaluationsid_matiere_evaluation` int(10) NOT NULL, 
  `etudiantsid_etudiant`                      bigint(19) NOT NULL, 
  `cyclesid_cycle`                            int(10) NOT NULL, 
  PRIMARY KEY (`id_frais`));
CREATE TABLE `paiement_etudiants` (
  `id_paiement_etudiant`  int(10) NOT NULL AUTO_INCREMENT, 
  `montant_paye`          float DEFAULT 0 NOT NULL, 
  `montant_restant`       float DEFAULT 0 NOT NULL, 
  `created_at`            timestamp DEFAULT current_timestamp NOT NULL, 
  `etudiants_id_etudiant` bigint(19) NOT NULL, 
  `frais_id_frais`        int(10) NOT NULL, 
  PRIMARY KEY (`id_paiement_etudiant`));
CREATE TABLE `avis` (
  `id_avis`              int(10) NOT NULL AUTO_INCREMENT, 
  `titre_avis`           varchar(255), 
  `description_avis`     text, 
  `created_at`           timestamp DEFAULT current_timestamp NOT NULL, 
  `employeesid_employee` int(10) NOT NULL, 
  `filieresid_filiere`   int(10) NOT NULL, 
  `niveausid_niveau`     int(10) NOT NULL, 
  PRIMARY KEY (`id_avis`));
ALTER TABLE `professeurs` ADD CONSTRAINT `FKprofesseur740848` FOREIGN KEY (`employees_id_employee`) REFERENCES `employees` (`id_employee`);
ALTER TABLE `employees` ADD CONSTRAINT `FKemployees688295` FOREIGN KEY (`fonctions_id_fonction`) REFERENCES `fonctions` (`id_fonction`);
ALTER TABLE `users` ADD CONSTRAINT `FKusers175237` FOREIGN KEY (`employees_id_employee`) REFERENCES `employees` (`id_employee`);
ALTER TABLE `users` ADD CONSTRAINT `FKusers917132` FOREIGN KEY (`roles_id_role`) REFERENCES `roles` (`id_role`);
ALTER TABLE `matieres_pofesseurs` ADD CONSTRAINT `FKmatieres_p174722` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`);
ALTER TABLE `matieres_pofesseurs` ADD CONSTRAINT `FKmatieres_p729565` FOREIGN KEY (`professeurs_id_professeur`) REFERENCES `professeurs` (`id_professeur`);
ALTER TABLE `matieres` ADD CONSTRAINT `FKmatieres572677` FOREIGN KEY (`modules_id_modules`) REFERENCES `modules` (`id_modules`);
ALTER TABLE `etudiants` ADD CONSTRAINT `FKetudiants563462` FOREIGN KEY (`parents_infos_id_parent`) REFERENCES `parents_infos` (`id_parent`);
ALTER TABLE `modules` ADD CONSTRAINT `FKmodules7677` FOREIGN KEY (`filieresid_filiere`) REFERENCES `filieres` (`id_filiere`);
ALTER TABLE `modules` ADD CONSTRAINT `FKmodules283234` FOREIGN KEY (`semestresid_semestre`) REFERENCES `semestres` (`id_semestre`);
ALTER TABLE `semestres` ADD CONSTRAINT `FKsemestres416517` FOREIGN KEY (`niveaus_id_niveau`) REFERENCES `niveaus` (`id_niveau`);
ALTER TABLE `notes` ADD CONSTRAINT `FKnotes982867` FOREIGN KEY (`semestres_id_semestre`) REFERENCES `semestres` (`id_semestre`);
ALTER TABLE `etudiants` ADD CONSTRAINT `FKetudiants847096` FOREIGN KEY (`niveaus_id_niveau`) REFERENCES `niveaus` (`id_niveau`);
ALTER TABLE `notes` ADD CONSTRAINT `FKnotes623834` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`);
ALTER TABLE `etudiants` ADD CONSTRAINT `FKetudiants135037` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`);
ALTER TABLE `notes` ADD CONSTRAINT `FKnotes299100` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`);
ALTER TABLE `presences` ADD CONSTRAINT `FKpresences345745` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`);
ALTER TABLE `niveaus` ADD CONSTRAINT `FKniveaus198742` FOREIGN KEY (`cyclesid_cycle`) REFERENCES `cycles` (`id_cycle`);
ALTER TABLE `filieres` ADD CONSTRAINT `FKfilieres144308` FOREIGN KEY (`cyclesid_cycle`) REFERENCES `cycles` (`id_cycle`);
ALTER TABLE `seances` ADD CONSTRAINT `FKseances35255` FOREIGN KEY (`horaires_id_horaire`) REFERENCES `horaires` (`id_horaire`);
ALTER TABLE `seances` ADD CONSTRAINT `FKseances716533` FOREIGN KEY (`jours_id_jour`) REFERENCES `jours` (`id_jour`);
ALTER TABLE `seances` ADD CONSTRAINT `FKseances163979` FOREIGN KEY (`professeurs_id_professeur`) REFERENCES `professeurs` (`id_professeur`);
ALTER TABLE `seances` ADD CONSTRAINT `FKseances498737` FOREIGN KEY (`niveaus_id_niveau`) REFERENCES `niveaus` (`id_niveau`);
ALTER TABLE `seances` ADD CONSTRAINT `FKseances483396` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`);
ALTER TABLE `seances` ADD CONSTRAINT `FKseances903323` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`);
ALTER TABLE `notes` ADD CONSTRAINT `FKnotes33897` FOREIGN KEY (`annees_scolairesid_annee_scolaire`) REFERENCES `annees_scolaires` (`id_annee_scolaire`);
ALTER TABLE `sessions_rattrapages` ADD CONSTRAINT `FKsessions_r253830` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`);
ALTER TABLE `sessions_rattrapages` ADD CONSTRAINT `FKsessions_r794825` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`);
ALTER TABLE `evaluations` ADD CONSTRAINT `FKevaluation303770` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`);
ALTER TABLE `evaluations` ADD CONSTRAINT `FKevaluation685686` FOREIGN KEY (`niveaus_id_niveau`) REFERENCES `niveaus` (`id_niveau`);
ALTER TABLE `matieres_evaluations` ADD CONSTRAINT `FKmatieres_e863964` FOREIGN KEY (`evaluations_id_evaluation`) REFERENCES `evaluations` (`id_evaluation`);
ALTER TABLE `matieres_evaluations` ADD CONSTRAINT `FKmatieres_e718083` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`);
ALTER TABLE `matieres_evaluations` ADD CONSTRAINT `FKmatieres_e904873` FOREIGN KEY (`jours_id_jour`) REFERENCES `jours` (`id_jour`);
ALTER TABLE `matieres_evaluations` ADD CONSTRAINT `FKmatieres_e314928` FOREIGN KEY (`horaires_id_horaire`) REFERENCES `horaires` (`id_horaire`);
ALTER TABLE `evaluations` ADD CONSTRAINT `FKevaluation294129` FOREIGN KEY (`semestresid_semestre`) REFERENCES `semestres` (`id_semestre`);
ALTER TABLE `heures_effectuees` ADD CONSTRAINT `FKheures_eff664733` FOREIGN KEY (`professeursid_professeur`) REFERENCES `professeurs` (`id_professeur`);
ALTER TABLE `presences` ADD CONSTRAINT `FKpresences591900` FOREIGN KEY (`seances_id_seance`) REFERENCES `seances` (`id_seance`);
ALTER TABLE `paiement_etudiants` ADD CONSTRAINT `FKpaiement_e920434` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`);
ALTER TABLE `paiement_etudiants` ADD CONSTRAINT `FKpaiement_e657389` FOREIGN KEY (`frais_id_frais`) REFERENCES `frais` (`id_frais`);
ALTER TABLE `frais` ADD CONSTRAINT `FKfrais163605` FOREIGN KEY (`cyclesid_cycle`) REFERENCES `cycles` (`id_cycle`);
ALTER TABLE `avis` ADD CONSTRAINT `FKavis407633` FOREIGN KEY (`employeesid_employee`) REFERENCES `employees` (`id_employee`);
ALTER TABLE `avis` ADD CONSTRAINT `FKavis535321` FOREIGN KEY (`filieresid_filiere`) REFERENCES `filieres` (`id_filiere`);
ALTER TABLE `avis` ADD CONSTRAINT `FKavis19820` FOREIGN KEY (`niveausid_niveau`) REFERENCES `niveaus` (`id_niveau`);
