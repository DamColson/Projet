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
    'Ash Prime',
    'Banshee Prime',
    'Chroma Prime',
    'Ember Prime',
    'Equinox Prime',
    'Excalibur Prime',
    'Frost Prime',
    'Hydroid Prime',
    'Limbo Prime',
    'Loki Prime',
    'Mag Prime',
    'Mesa Prime',
    'Mirage Prime',
    'Nekros Prime',
    'Nova Prime',
    'Nyx Prime',
    'Oberon Prime',
    'Rhino Prime',
    'Saryn Prime',
    'Trinity Prime',
    'Valkyr Prime',
    'Vauban Prime',
    'Volt Prime',
    'Zephyr Prime'
    ];
        
  $armors = implode('|', $armor);
  $primeArmors = implode('|', $primeArmor);
  $regexArmors = "/^(" . $armors . '|' . $primeArmors . ")$/";
?>
        