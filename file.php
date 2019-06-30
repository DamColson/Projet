<?php
$_POST = array_map('strip_tags',$_POST);
$rank = [2,3,4,5];
$armor = [
    'Ash',
    'Atlas',
    'Banshee',
    'Baruuk',
    'Chroma',
    'Ember',
    'Equinox',
    'Excalibur',
    'Frost',
    'Gara',
    'Garuda',
    'Harrow',
    'Hildryn',
    'Hydroid',
    'Inaros',
    'Ivara',
    'Khora',
    'Limbo',
    'Loki',
    'Mag',
    'Mesa',
    'Mirage',
    'Nekros',
    'Nezha',
    'Nidus',
    'Nova',
    'Nyx',
    'Oberon',
    'Octavia',
    'Revenant',
    'Rhino',
    'Saryn',
    'Titania',
    'Trinity',
    'Valkyr',
    'Vauban',
    'Volt',
    'Wisp',
    'Wukong',
    'Zephyr'
    ];
$primeArmor = [
    'AshPrime',
    'BansheePrime',
    'ChromaPrime',
    'EmberPrime',
    'EquinoxPrime',
    'ExcaliburPrime',
    'FrostPrime',
    'HydroidPrime',
    'LimboPrime',
    'LokiPrime',
    'MagPrime',
    'MesaPrime',
    'MiragePrime',
    'NekrosPrime',
    'NovaPrime',
    'NyxPrime',
    'OberonPrime',
    'RhinoPrime',
    'SarynPrime',
    'TrinityPrime',
    'ValkyrPrime',
    'VaubanPrime',
    'VoltPrime',
    'ZephyrPrime'
    ];
        
  $armors = implode('|', $armor);
  $primeArmors = implode('|', $primeArmor);
  $regexArmors = "/^(" . $armors . '|' . $primeArmors . ")$/";
?>
        