<?php

$countryCode = array(
    'France',
    'Abkhazie',
    'Afghanistan',
    'Afrique du Sud',
    'Albanie',
    'Algérie',
    'Allemagne',
    'Andorre',
    'Angola',
    'Antarctique',
    'Antigua-et-Barbuda',
    'Arabie saoudite',
    'Argentine',
    'Arménie',
    'Australie',
    'Autriche',
    'Azerbaïdjan',
    'Bahamas',
    'Bahreïn',
    'Bangladesh',
    'Barbade',
    'Biélorussie',
    'Belgique',
    'Belize',
    'Bénin',
    'Bermudes',
    'Bhoutan',
    'Biélorussie',
    'Birmanie',
    'Bolivie',
    'Bosnie-Herzégovine',
    'Botswana',
    'Brésil',
    'Brunei',
    'Bulgarie',
    'Burkina Faso',
    'Burundi',
    'Îles Caïmans',
    'Cambodge',
    'Cameroun',
    'Canada',
    'Cap-Vert',
    'République centrafricaine',
    'Chili',
    'Chine',
    'Chypre',
    'Chypre du Nord',
    'Clipperton',
    'Colombie',
    'Comores',
    'République du Congo',
    'République démocratique du Congo',
    'Îles Cook',
    'Corée du Nord',
    'Corée du Sud',
    'Costa Rica',
    'Côte d\'Ivoire',
    'Croatie',
    'Îles Crozet',
    'Cuba',
    'Danemark',
    'Djibouti',
    'République dominicaine',
    'Dominique',
    'Égypte',
    'Émirats arabes unis',
    'Équateur',
    'Érythrée',
    'Espagne',
    'Estonie',
    'États-Unis',
    'Éthiopie',
    'Fidji',
    'Finlande',
    'Gabon',
    'Gambie',
    'Géorgie',
    'Ghana',
    'Grèce',
    'Grenade',
    'Groenland',
    'Guadeloupe',
    'Guatemala',
    'Guernesey',
    'Guinée',
    'Guinée-Bissau',
    'Guinée équatoriale',
    'Guyana',
    'Guyane',
    'Haïti',
    'Honduras',
    'Hongrie',
    'Inde',
    'Indonésie',
    'Irak',
    'Iran',
    'Irlande',
    'Islande',
    'Israël',
    'Italie',
    'Jamaïque',
    'Japon',
    'Jordanie',
    'Kazakhstan',
    'Kenya',
    'Kerguelen',
    'Kirghizistan',
    'Kiribati',
    'Kosovo',
    'Koweït',
    'Laos',
    'Lesotho',
    'Lettonie',
    'Liban',
    'Liberia',
    'Libye',
    'Liechtenstein',
    'Lituanie',
    'Luxembourg',
    'Macédoine du Nord',
    'Madagascar',
    'Malaisie',
    'Malawi',
    'Maldives',
    'Mali',
    'Malte',
    'Maroc',
    'Îles Marshall',
    'Martinique',
    'Maurice',
    'Mauritanie',
    'Mayotte',
    'Mexique',
    'Micronésie',
    'Moldavie',
    'Monaco',
    'Mongolie',
    'Monténégro',
    'Mozambique',
    'Namibie',
    'Nauru',
    'Népal',
    'Nicaragua',
    'Niger',
    'Nigeria',
    'Niue',
    'Norvège',
    'Nouvelle-Calédonie',
    'Nouvelle-Zélande',
    'Oman',
    'Ouganda',
    'Ouzbékistan',
    'Ossétie du Sud',
    'Pakistan',
    'Palaos',
    'Palestine',
    'Panama',
    'Papouasie-Nouvelle-Guinée',
    'Paraguay',
    'Pays-Bas',
    'Pérou',
    'Philippines',
    'Pologne',
    'Polynésie française',
    'Porto Rico',
    'Portugal',
    'Qatar',
    'Roumanie',
    'Royaume-Uni',
    'Russie',
    'Rwanda',
    'Sahara occidental',
    'Saint-Barthélemy',
    'Saint-Christophe-et-Niévès',
    'Sainte-Lucie',
    'Saint-Marin',
    'Saint-Martin',
    'Saint-Paul et Nouvelle-Asterdam',
    'Saint-Pierre-et-Miquelon',
    'Saint-Vincent-et-les-Grenadines',
    'Îles Salomon',
    'Salvador',
    'Samoa',
    'Sao Tomé-et-Principe',
    'Sénégal',
    'Serbie',
    'Seychelles',
    'Sierra Leone',
    'Singapour',
    'Slovaquie',
    'Slovénie',
    'Somalie',
    'Soudan',
    'Soudan du Sud',
    'Sri Lanka',
    'Suède',
    'Suisse',
    'Suriname',
    'Swaziland',
    'Syrie',
    'Tadjikistan',
    'Taïwan',
    'Tanzanie',
    'Tchad',
    'République tchèque',
    'La Réunion',
    'Terre Adélie',
    'Thaïlande',
    'Timor oriental',
    'Togo',
    'Tonga',
    'Trinité-et-Tobago',
    'Tunisie',
    'Turkménistan',
    'Turquie',
    'Tuvalu',
    'Ukraine',
    'Uruguay',
    'Vanuatu',
    'Venezuela',
    'Viêt Nam',
    'Wallis-et-Futuna',
    'Yémen',
    'Zambie',
    'Zimbabwe'
);

$regexFirstName = "#^([A-Za-zéèàîôêâûŷäëïöüÿùç]){2,17}[-]?([A-Za-zéèàîôêâûŷäëïöüÿù]){0,17}$#";
$regexLastName = "#^([A-Za-zéèàîôêâûŷäëïöüÿùç]){2,17}([ ]([A-Za-zéèàîôêâûŷäëïöüÿù]){0,10}){0,5}$#";
$regexBirthday = "#^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\g1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\g2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\g3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\g4(?:(?:1[6-9]|[2-9]\d)?\d{2})$#";
$regexAddress = "#^([1-9]|[1-9][0-9]|[1-9][0-9]{2}|1[0-9]{3})[A|a|b|B]?[ ]?(bis)?[- ](avenue|Avenue|AVENUE|rue|Rue|RUE|Boulevard|BOULEVARD|boulevard|Impasse|IMPASSE|impasse|Allée|ALLEE|allée|hameau|Hameau|HAMEAU|Chemin|chemin|CHEMIN|lieu-dit|Lieu-dit|LIEU-DIT|lieu-Dit|Lieu-Dit)[- ][A-Za-zéèàâêŷûîôäëïöüÿùç]+([- ]?[A-Za-zéèàâêŷûîôäëïöüÿùç]{0,17}){0,3}$#";
$regexPostal = "#^((0[1-9]|[1-8][0-9]|9[0-5])[0-9]{3})|97[1-6]$#";
$regexCity = "#^[A-Za-zéèàâêŷûîôäëïöüÿùç]+([- ]?[A-Za-zéèàâêŷûîôäëïöüÿùç]{0,17}){0,10}$#";
$regexMail = "#^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$#";
$regexPhone = "#^[0][1-9]([-. ]?)(([0-9]{2})\g1([0-9]{2}))(\g1([0-9]{2})){2}|[+]33[0-9]([-. ]?)(([0-9]{2})\g7([0-9]{2}))(\g7([0-9]{2})){2}$#";
$regexPeNumber = "#^[0-9]{7}[[:alnum:]]$#";
$regexCodecademy = "#^((https:\/\/www.codecademy.com)|(www.codecademy.com)|(codecademy.com))[\/][A-Za-z0-9]+$#";
$country = implode('|', $countryCode);
$regexCountry = "/^(" . $country . ")$/";
$regexAge = '#^1[6-9]|[2-9][0-9]|1[0-1][0-9]|12[0-3]$#';
$regexNumber = '#^[-]?[0-9]+$#';
$regexDiscord = '#^.(\#)([0-9]{3})$#';
$regexPassword = '#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,19})$#';
$regexSyndicateRank = '#^(-2|-1|0|neutre|1|2|3|4|5)$#';
$regexSyndicateStanding = '#^(0)$|^[1-9]$|^[1-9][0-9]$|^[1-9][0-9]{2}$|^[1-9][0-9]{3}$|^[1-9][0-9]{4}$|^(1)[0-2][0-9]{4}$|^(13)[0-1][0-9]{3}$|^(132000)$#';
?>