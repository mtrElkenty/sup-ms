-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 01:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `sup_ms`
--
-- --------------------------------------------------------
--
-- Table structure for table `annees_scolaires`
--
CREATE TABLE `annees_scolaires` (
    `id_annee_scolaire` int(11) NOT NULL,
    `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `avis`
--
CREATE TABLE `avis` (
    `id_avis` int(11) NOT NULL,
    `titre_avis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description_avis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `employes_id_employe` int(11) NOT NULL,
    `filieres_id_filiere` int(11) NOT NULL,
    `niveaux_id_niveau` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `cycles`
--
CREATE TABLE `cycles` (
    `id_cycle` int(11) NOT NULL,
    `libelle_cycle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nombre_annees` int(11) NOT NULL DEFAULT 1,
    `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `employes`
--
CREATE TABLE `employes` (
    `id_employe` int(11) NOT NULL,
    `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `NNI` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
    `telephone_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `telephone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_naissance` date NOT NULL,
    `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `fonctions_id_fonction` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `etudiants`
--
CREATE TABLE `etudiants` (
    `id_etudiant` bigint(20) NOT NULL,
    `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `NNI` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
    `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_naissance` date NOT NULL,
    `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `situation_famille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `parents_infos_id_parent` int(11) NOT NULL,
    `niveaux_id_niveau` int(11) NOT NULL,
    `filieres_id_filiere` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `evaluations`
--
CREATE TABLE `evaluations` (
    `id_evaluation` int(11) NOT NULL,
    `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `libelle_evaluation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_debut` date NOT NULL,
    `date_fin` date NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `filieres_id_filiere` int(11) NOT NULL,
    `niveaux_id_niveau` int(11) NOT NULL,
    `semestres_id_semestre` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `failed_jobs`
--
CREATE TABLE `failed_jobs` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `filieres`
--
CREATE TABLE `filieres` (
    `id_filiere` int(11) NOT NULL,
    `code_filiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `libelle_filiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `cycles_id_cycle` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `fonctions`
--
CREATE TABLE `fonctions` (
    `id_fonction` int(11) NOT NULL,
    `fonction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `frais`
--
CREATE TABLE `frais` (
    `id_frais` int(11) NOT NULL,
    `frais` int(11) NOT NULL,
    `libelle_frais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `matieres_evaluations_id_matiere_evaluation` int(11) NOT NULL,
    `etudiants_id_etudiant` bigint(20) NOT NULL,
    `cycles_id_cycle` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `heures_effectuees`
--
CREATE TABLE `heures_effectuees` (
    `id_heure_effectuee` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `professeurs_id_professeur` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `horaires`
--
CREATE TABLE `horaires` (
    `id_horaire` int(11) NOT NULL,
    `du` time NOT NULL,
    `a` time NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `jours`
--
CREATE TABLE `jours` (
    `id_jour` int(11) NOT NULL,
    `jour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `matieres`
--
CREATE TABLE `matieres` (
    `id_matiere` int(11) NOT NULL,
    `code_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `libelle_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `coefficient` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `modules_id_modules` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `matieres_evaluations`
--
CREATE TABLE `matieres_evaluations` (
    `id_matiere_evaluation` int(11) NOT NULL,
    `matieres_id_matiere` int(11) NOT NULL,
    `evaluations_id_evaluation` int(11) NOT NULL,
    `jours_id_jour` int(11) NOT NULL,
    `horaires_id_horaire` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `matieres_pofesseurs`
--
CREATE TABLE `matieres_pofesseurs` (
    `id_matiere_pofesseur` int(11) NOT NULL,
    `matieres_id_matiere` int(11) NOT NULL,
    `professeurs_id_professeur` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `migrations`
--
CREATE TABLE `migrations` (
    `id` int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `modules`
--
CREATE TABLE `modules` (
    `id_modules` int(11) NOT NULL,
    `libelle_module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `code_module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `filieres_id_filiere` int(11) NOT NULL,
    `semestres_id_semestre` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `niveaux`
--
CREATE TABLE `niveaux` (
    `id_niveau` int(11) NOT NULL,
    `libelle_niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `cycles_id_cycle` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `notes`
--
CREATE TABLE `notes` (
    `id_note` int(11) NOT NULL,
    `cc` double(8, 2) NOT NULL DEFAULT 0.00,
    `cp` double(8, 2) NOT NULL DEFAULT 0.00,
    `moyenne_generale` double(8, 2) NOT NULL DEFAULT 0.00,
    `cp_rattrapage` double(8, 2) NOT NULL DEFAULT 0.00,
    `created_at` timestamp NULL DEFAULT NULL,
    `semestres_id_semestre` int(11) NOT NULL,
    `etudiants_id_etudiant` bigint(20) NOT NULL,
    `matieres_id_matiere` int(11) NOT NULL,
    `annees_scolaires_id_annee_scolaire` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `paiement_etudiants`
--
CREATE TABLE `paiement_etudiants` (
    `id_paiement_etudiant` int(11) NOT NULL,
    `montant_paye` double(8, 2) NOT NULL DEFAULT 0.00,
    `montant_restant` double(8, 2) NOT NULL DEFAULT 0.00,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `etudiants_id_etudiant` bigint(20) NOT NULL,
    `frais_id_frais` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `parents_infos`
--
CREATE TABLE `parents_infos` (
    `id_parent` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `password_resets`
--
CREATE TABLE `password_resets` (
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `personal_access_tokens`
--
CREATE TABLE `personal_access_tokens` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id` bigint(20) UNSIGNED NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `last_used_at` timestamp NULL DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `presences`
--
CREATE TABLE `presences` (
    `id_presence` int(11) NOT NULL,
    `present` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `etudiants_id_etudiant` bigint(20) NOT NULL,
    `seances_id_seance` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `professeurs`
--
CREATE TABLE `professeurs` (
    `id_professeur` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `employes_id_employe` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `roles`
--
CREATE TABLE `roles` (
    `id_role` int(11) NOT NULL,
    `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `seances`
--
CREATE TABLE `seances` (
    `id_seance` int(11) NOT NULL,
    `seance_rattrapage` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `horaires_id_horaire` int(11) NOT NULL,
    `jours_id_jour` int(11) NOT NULL,
    `professeurs_id_professeur` int(11) NOT NULL,
    `niveaux_id_niveau` int(11) NOT NULL,
    `filieres_id_filiere` int(11) NOT NULL,
    `matieres_id_matiere` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `semestres`
--
CREATE TABLE `semestres` (
    `id_semestre` int(11) NOT NULL,
    `libelle_semestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `niveaux_id_niveau` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `sessions_rattrapages`
--
CREATE TABLE `sessions_rattrapages` (
    `id_session_rattrapage` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `matieres_id_matiere` int(11) NOT NULL,
    `etudiants_id_etudiant` bigint(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
    `id_user` int(11) NOT NULL,
    `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `employes_id_employe` int(11) NOT NULL,
    `roles_id_role` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Indexes for table `annees_scolaires`
--
ALTER TABLE `annees_scolaires`
ADD PRIMARY KEY (`id_annee_scolaire`),
    ADD UNIQUE KEY `annees_scolaires_annee_scolaire_unique` (`annee_scolaire`);
--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
ADD PRIMARY KEY (`id_avis`),
    ADD KEY `FKavis19820` (`niveaux_id_niveau`),
    ADD KEY `FKavis407633` (`employes_id_employe`),
    ADD KEY `FKavis535321` (`filieres_id_filiere`);
--
-- Indexes for table `cycles`
--
ALTER TABLE `cycles`
ADD PRIMARY KEY (`id_cycle`),
    ADD UNIQUE KEY `libelle_cycle` (`libelle_cycle`);
--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
ADD PRIMARY KEY (`id_employe`),
    ADD UNIQUE KEY `NNI` (`NNI`),
    ADD UNIQUE KEY `telephone_1` (`telephone_1`),
    ADD UNIQUE KEY `email` (`email`),
    ADD KEY `FKemployes688295` (`fonctions_id_fonction`);
--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
ADD PRIMARY KEY (`id_etudiant`),
    ADD UNIQUE KEY `matricule` (`matricule`),
    ADD UNIQUE KEY `NNI` (`NNI`),
    ADD UNIQUE KEY `telephone` (`telephone`),
    ADD UNIQUE KEY `email` (`email`),
    ADD KEY `FKetudiants135037` (`filieres_id_filiere`),
    ADD KEY `FKetudiants563462` (`parents_infos_id_parent`),
    ADD KEY `FKetudiants847096` (`niveaux_id_niveau`);
--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
ADD PRIMARY KEY (`id_evaluation`),
    ADD KEY `FKevaluation294129` (`semestres_id_semestre`),
    ADD KEY `FKevaluation303770` (`filieres_id_filiere`),
    ADD KEY `FKevaluation685686` (`niveaux_id_niveau`);
--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);
--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
ADD PRIMARY KEY (`id_filiere`),
    ADD UNIQUE KEY `code_filiere` (`code_filiere`),
    ADD UNIQUE KEY `libelle_filiere` (`libelle_filiere`),
    ADD KEY `FKfilieres144308` (`cycles_id_cycle`);
--
-- Indexes for table `fonctions`
--
ALTER TABLE `fonctions`
ADD PRIMARY KEY (`id_fonction`),
    ADD UNIQUE KEY `fonction` (`fonction`);
--
-- Indexes for table `frais`
--
ALTER TABLE `frais`
ADD PRIMARY KEY (`id_frais`),
    ADD UNIQUE KEY `libelle_frais` (`libelle_frais`),
    ADD KEY `FKfrais163605` (`cycles_id_cycle`);
--
-- Indexes for table `heures_effectuees`
--
ALTER TABLE `heures_effectuees`
ADD PRIMARY KEY (`id_heure_effectuee`),
    ADD KEY `FKheures_eff664733` (`professeurs_id_professeur`);
--
-- Indexes for table `horaires`
--
ALTER TABLE `horaires`
ADD PRIMARY KEY (`id_horaire`),
    ADD UNIQUE KEY `du` (`du`),
    ADD UNIQUE KEY `a` (`a`);
--
-- Indexes for table `jours`
--
ALTER TABLE `jours`
ADD PRIMARY KEY (`id_jour`),
    ADD UNIQUE KEY `jour` (`jour`);
--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
ADD PRIMARY KEY (`id_matiere`),
    ADD UNIQUE KEY `code_matiere` (`code_matiere`),
    ADD KEY `FKmatieres572677` (`modules_id_modules`);
--
-- Indexes for table `matieres_evaluations`
--
ALTER TABLE `matieres_evaluations`
ADD PRIMARY KEY (`id_matiere_evaluation`),
    ADD KEY `FKmatieres_e314928` (`horaires_id_horaire`),
    ADD KEY `FKmatieres_e718083` (`matieres_id_matiere`),
    ADD KEY `FKmatieres_e863964` (`evaluations_id_evaluation`),
    ADD KEY `FKmatieres_e904873` (`jours_id_jour`);
--
-- Indexes for table `matieres_pofesseurs`
--
ALTER TABLE `matieres_pofesseurs`
ADD PRIMARY KEY (`id_matiere_pofesseur`),
    ADD KEY `FKmatieres_p174722` (`matieres_id_matiere`),
    ADD KEY `FKmatieres_p729565` (`professeurs_id_professeur`);
--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
ADD PRIMARY KEY (`id_modules`),
    ADD UNIQUE KEY `libelle_module` (`libelle_module`),
    ADD UNIQUE KEY `code_module` (`code_module`),
    ADD KEY `FKmodules283234` (`semestres_id_semestre`),
    ADD KEY `FKmodules7677` (`filieres_id_filiere`);
--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
ADD PRIMARY KEY (`id_niveau`),
    ADD UNIQUE KEY `libelle_niveau` (`libelle_niveau`),
    ADD KEY `FKniveaux198742` (`cycles_id_cycle`);
--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
ADD PRIMARY KEY (`id_note`),
    ADD KEY `FKnotes299100` (`matieres_id_matiere`),
    ADD KEY `FKnotes33897` (`annees_scolaires_id_annee_scolaire`),
    ADD KEY `FKnotes623834` (`etudiants_id_etudiant`),
    ADD KEY `FKnotes982867` (`semestres_id_semestre`);
--
-- Indexes for table `paiement_etudiants`
--
ALTER TABLE `paiement_etudiants`
ADD PRIMARY KEY (`id_paiement_etudiant`),
    ADD KEY `FKpaiement_e657389` (`frais_id_frais`),
    ADD KEY `FKpaiement_e920434` (`etudiants_id_etudiant`);
--
-- Indexes for table `parents_infos`
--
ALTER TABLE `parents_infos`
ADD PRIMARY KEY (`id_parent`);
--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
ADD KEY `password_resets_email_index` (`email`);
--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`);
--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
ADD PRIMARY KEY (`id_presence`),
    ADD KEY `FKpresences345745` (`etudiants_id_etudiant`),
    ADD KEY `FKpresences591900` (`seances_id_seance`);
--
-- Indexes for table `professeurs`
--
ALTER TABLE `professeurs`
ADD PRIMARY KEY (`id_professeur`),
    ADD KEY `FKprofesseur740848` (`employes_id_employe`);
--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
ADD PRIMARY KEY (`id_role`),
    ADD UNIQUE KEY `role` (`role`);
--
-- Indexes for table `seances`
--
ALTER TABLE `seances`
ADD PRIMARY KEY (`id_seance`),
    ADD KEY `FKseances163979` (`professeurs_id_professeur`),
    ADD KEY `FKseances35255` (`horaires_id_horaire`),
    ADD KEY `FKseances483396` (`filieres_id_filiere`),
    ADD KEY `FKseances498737` (`niveaux_id_niveau`),
    ADD KEY `FKseances716533` (`jours_id_jour`),
    ADD KEY `FKseances903323` (`matieres_id_matiere`);
--
-- Indexes for table `semestres`
--
ALTER TABLE `semestres`
ADD PRIMARY KEY (`id_semestre`),
    ADD UNIQUE KEY `libelle_semestre` (`libelle_semestre`),
    ADD KEY `FKsemestres416517` (`niveaux_id_niveau`);
--
-- Indexes for table `sessions_rattrapages`
--
ALTER TABLE `sessions_rattrapages`
ADD PRIMARY KEY (`id_session_rattrapage`),
    ADD KEY `FKsessions_r253830` (`matieres_id_matiere`),
    ADD KEY `FKsessions_r794825` (`etudiants_id_etudiant`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id_user`),
    ADD UNIQUE KEY `username` (`username`),
    ADD KEY `FKusers175237` (`employes_id_employe`),
    ADD KEY `FKusers917132` (`roles_id_role`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `annees_scolaires`
--
ALTER TABLE `annees_scolaires`
MODIFY `id_annee_scolaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cycles`
--
ALTER TABLE `cycles`
MODIFY `id_cycle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
MODIFY `id_employe` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
MODIFY `id_etudiant` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filieres`
--
ALTER TABLE `filieres`
MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fonctions`
--
ALTER TABLE `fonctions`
MODIFY `id_fonction` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;
--
-- AUTO_INCREMENT for table `frais`
--
ALTER TABLE `frais`
MODIFY `id_frais` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `heures_effectuees`
--
ALTER TABLE `heures_effectuees`
MODIFY `id_heure_effectuee` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `horaires`
--
ALTER TABLE `horaires`
MODIFY `id_horaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jours`
--
ALTER TABLE `jours`
MODIFY `id_jour` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matieres_evaluations`
--
ALTER TABLE `matieres_evaluations`
MODIFY `id_matiere_evaluation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matieres_pofesseurs`
--
ALTER TABLE `matieres_pofesseurs`
MODIFY `id_matiere_pofesseur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 31;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
MODIFY `id_modules` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paiement_etudiants`
--
ALTER TABLE `paiement_etudiants`
MODIFY `id_paiement_etudiant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parents_infos`
--
ALTER TABLE `parents_infos`
MODIFY `id_parent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
MODIFY `id_presence` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professeurs`
--
ALTER TABLE `professeurs`
MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `seances`
--
ALTER TABLE `seances`
MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `semestres`
--
ALTER TABLE `semestres`
MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessions_rattrapages`
--
ALTER TABLE `sessions_rattrapages`
MODIFY `id_session_rattrapage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
ADD CONSTRAINT `FKavis19820` FOREIGN KEY (`niveaux_id_niveau`) REFERENCES `niveaux` (`id_niveau`),
    ADD CONSTRAINT `FKavis407633` FOREIGN KEY (`employes_id_employe`) REFERENCES `employes` (`id_employe`),
    ADD CONSTRAINT `FKavis535321` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`);
--
-- Constraints for table `employes`
--
ALTER TABLE `employes`
ADD CONSTRAINT `FKemployes688295` FOREIGN KEY (`fonctions_id_fonction`) REFERENCES `fonctions` (`id_fonction`);
--
-- Constraints for table `etudiants`
--
ALTER TABLE `etudiants`
ADD CONSTRAINT `FKetudiants135037` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`),
    ADD CONSTRAINT `FKetudiants563462` FOREIGN KEY (`parents_infos_id_parent`) REFERENCES `parents_infos` (`id_parent`),
    ADD CONSTRAINT `FKetudiants847096` FOREIGN KEY (`niveaux_id_niveau`) REFERENCES `niveaux` (`id_niveau`);
--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
ADD CONSTRAINT `FKevaluation294129` FOREIGN KEY (`semestres_id_semestre`) REFERENCES `semestres` (`id_semestre`),
    ADD CONSTRAINT `FKevaluation303770` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`),
    ADD CONSTRAINT `FKevaluation685686` FOREIGN KEY (`niveaux_id_niveau`) REFERENCES `niveaux` (`id_niveau`);
--
-- Constraints for table `filieres`
--
ALTER TABLE `filieres`
ADD CONSTRAINT `FKfilieres144308` FOREIGN KEY (`cycles_id_cycle`) REFERENCES `cycles` (`id_cycle`);
--
-- Constraints for table `frais`
--
ALTER TABLE `frais`
ADD CONSTRAINT `FKfrais163605` FOREIGN KEY (`cycles_id_cycle`) REFERENCES `cycles` (`id_cycle`);
--
-- Constraints for table `heures_effectuees`
--
ALTER TABLE `heures_effectuees`
ADD CONSTRAINT `FKheures_eff664733` FOREIGN KEY (`professeurs_id_professeur`) REFERENCES `professeurs` (`id_professeur`);
--
-- Constraints for table `matieres`
--
ALTER TABLE `matieres`
ADD CONSTRAINT `FKmatieres572677` FOREIGN KEY (`modules_id_modules`) REFERENCES `modules` (`id_modules`);
--
-- Constraints for table `matieres_evaluations`
--
ALTER TABLE `matieres_evaluations`
ADD CONSTRAINT `FKmatieres_e314928` FOREIGN KEY (`horaires_id_horaire`) REFERENCES `horaires` (`id_horaire`),
    ADD CONSTRAINT `FKmatieres_e718083` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`),
    ADD CONSTRAINT `FKmatieres_e863964` FOREIGN KEY (`evaluations_id_evaluation`) REFERENCES `evaluations` (`id_evaluation`),
    ADD CONSTRAINT `FKmatieres_e904873` FOREIGN KEY (`jours_id_jour`) REFERENCES `jours` (`id_jour`);
--
-- Constraints for table `matieres_pofesseurs`
--
ALTER TABLE `matieres_pofesseurs`
ADD CONSTRAINT `FKmatieres_p174722` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`),
    ADD CONSTRAINT `FKmatieres_p729565` FOREIGN KEY (`professeurs_id_professeur`) REFERENCES `professeurs` (`id_professeur`);
--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
ADD CONSTRAINT `FKmodules283234` FOREIGN KEY (`semestres_id_semestre`) REFERENCES `semestres` (`id_semestre`),
    ADD CONSTRAINT `FKmodules7677` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`);
--
-- Constraints for table `niveaux`
--
ALTER TABLE `niveaux`
ADD CONSTRAINT `FKniveaux198742` FOREIGN KEY (`cycles_id_cycle`) REFERENCES `cycles` (`id_cycle`);
--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
ADD CONSTRAINT `FKnotes299100` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`),
    ADD CONSTRAINT `FKnotes33897` FOREIGN KEY (`annees_scolaires_id_annee_scolaire`) REFERENCES `annees_scolaires` (`id_annee_scolaire`),
    ADD CONSTRAINT `FKnotes623834` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`),
    ADD CONSTRAINT `FKnotes982867` FOREIGN KEY (`semestres_id_semestre`) REFERENCES `semestres` (`id_semestre`);
--
-- Constraints for table `paiement_etudiants`
--
ALTER TABLE `paiement_etudiants`
ADD CONSTRAINT `FKpaiement_e657389` FOREIGN KEY (`frais_id_frais`) REFERENCES `frais` (`id_frais`),
    ADD CONSTRAINT `FKpaiement_e920434` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`);
--
-- Constraints for table `presences`
--
ALTER TABLE `presences`
ADD CONSTRAINT `FKpresences345745` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`),
    ADD CONSTRAINT `FKpresences591900` FOREIGN KEY (`seances_id_seance`) REFERENCES `seances` (`id_seance`);
--
-- Constraints for table `professeurs`
--
ALTER TABLE `professeurs`
ADD CONSTRAINT `FKprofesseur740848` FOREIGN KEY (`employes_id_employe`) REFERENCES `employes` (`id_employe`);
--
-- Constraints for table `seances`
--
ALTER TABLE `seances`
ADD CONSTRAINT `FKseances163979` FOREIGN KEY (`professeurs_id_professeur`) REFERENCES `professeurs` (`id_professeur`),
    ADD CONSTRAINT `FKseances35255` FOREIGN KEY (`horaires_id_horaire`) REFERENCES `horaires` (`id_horaire`),
    ADD CONSTRAINT `FKseances483396` FOREIGN KEY (`filieres_id_filiere`) REFERENCES `filieres` (`id_filiere`),
    ADD CONSTRAINT `FKseances498737` FOREIGN KEY (`niveaux_id_niveau`) REFERENCES `niveaux` (`id_niveau`),
    ADD CONSTRAINT `FKseances716533` FOREIGN KEY (`jours_id_jour`) REFERENCES `jours` (`id_jour`),
    ADD CONSTRAINT `FKseances903323` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`);
--
-- Constraints for table `semestres`
--
ALTER TABLE `semestres`
ADD CONSTRAINT `FKsemestres416517` FOREIGN KEY (`niveaux_id_niveau`) REFERENCES `niveaux` (`id_niveau`);
--
-- Constraints for table `sessions_rattrapages`
--
ALTER TABLE `sessions_rattrapages`
ADD CONSTRAINT `FKsessions_r253830` FOREIGN KEY (`matieres_id_matiere`) REFERENCES `matieres` (`id_matiere`),
    ADD CONSTRAINT `FKsessions_r794825` FOREIGN KEY (`etudiants_id_etudiant`) REFERENCES `etudiants` (`id_etudiant`);
--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `FKusers175237` FOREIGN KEY (`employes_id_employe`) REFERENCES `employes` (`id_employe`),
    ADD CONSTRAINT `FKusers917132` FOREIGN KEY (`roles_id_role`) REFERENCES `roles` (`id_role`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
