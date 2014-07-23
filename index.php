

<?php

use member\controller\Controller;
use member\model\Member;
use member\model\MemberManager;
require 'inc/conf.inc.php';
session_start();

//-----------------------------------------------------------------------------------------------------------------------------------
new Controller();


/**
 * Created by PhpStorm.
 * User: XVI
 * Date: 19/07/14
 * Time: 00:34
 *
 * Voici ce qu'il faut développer : un mini espace membres.

Le développement doit comprendre :
 * une page d'inscription : civilité, nom, prénom, email et mot de passe, un titre de poste (exemple : webmaster) + un système de vérification des champs lors de l'inscription.
 * une base de données MYSQL comme vous le sentez, pas de spécifications précises
 * une page de connexion : email + mot de passe
 * une fois connecté, la page des membres doit afficher
- un bloc "Bonjour XX"
- un bloc avec les derniers membres inscrits avec un avatar, l'heure d'inscription et le titre du poste
- un bloc avec les membres amis entre eux.
- un moteur de recherche de membres avec du suggest puis l'affichage des résultats.
- les membres peuvent être amis entre eux. Faire un bouton je veux me connecter avec ce membre.
 * une page avec le profil du membre : nom prénom email et poste.
 * Une déconnexion

Il faudra :
 * que le système soit le plus rapide possible
 * qu'il y ait le moins d'appel à la base de données donc du cache mais pas du cache type mencache. Vous faites votre propre cache à votre manière.
 * que le code ne soit pas trop complexe - c'est à dire que tout le monde puisse intervenir dessus en le comprenant facilement
 * que le code soit expliqué

Si des choses ne sont pas clair n'hésitez pas à me le dire. Attention, faites-le comme vous le sentez à votre "sauce"!
 */


