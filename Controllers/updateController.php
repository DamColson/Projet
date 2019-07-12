<?php

if ($_POST['steelMeridianRadio'] == 'on'):

    if (!empty($_POST['steelMeridianRank']) && !preg_match($regexSyndicateRank, $_POST['steelMeridianRank'])):
        $errorInForm['StMe'] = 0;
        $data = 'failure';
    endif;
endif;

if ($_POST['arbiterRadio'] == 'on'):
    if (!empty($_POST['arbiterRank']) && !preg_match($regexSyndicateRank, $_POST['arbiterRank'])):
        $errorInForm['AoH'] = 0;
        $data = 'failure';
    endif;
endif;

if ($_POST['cephalonRadio'] == 'on'):
    if (!empty($_POST['cephalonRank']) && !preg_match($regexSyndicateRank, $_POST['cephalonRank'])):
        $errorInForm['CeSu'] = 0;
        $data = 'failure';
    endif;
endif;

if ($_POST['perrinRadio'] == 'on'):
    if (!empty($_POST['perrinRank']) && !preg_match($regexSyndicateRank, $_POST['perrinRank'])):
        $errorInForm['ThPeSe'] = 0;
        $data = 'failure';
    endif;
endif;

if ($_POST['redVeilRadio'] == 'on'):
    if (!empty($_POST['redVeilRank']) && !preg_match($regexSyndicateRank, $_POST['redVeilRank'])):
        $errorInForm['ReVe'] = 0;
        $data = 'failure';
    endif;
endif;

if ($_POST['newLokaRadio'] == 'on'):
    if (!empty($_POST['newLokaRank']) && !preg_match($regexSyndicateRank, $_POST['newLokaRank'])):
        $errorInForm['NeLo'] = 0;
        $data = 'failure';
    endif;
    endif;