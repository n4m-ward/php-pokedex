<?php

function executarCurl($url){
    $chInit = curl_init($url);
    curl_setopt($chInit,CURLOPT_RETURNTRANSFER,true);
    return  json_decode(curl_exec($chInit));
}

function findPokemon($pokeName){
    $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokeName;
    return executarCurl($url);
}

function getEffectEntries($abilityInfo){
    foreach($abilityInfo->effect_entries as $effect){
        if($effect->language->name == 'en'){
            return $effect;   
        }
    }
}
function getMoveEffectEntries($abilityInfo){
    foreach($abilityInfo as $effect){
        if($effect->language->name == 'en'){
            return $effect;   
        }
    }
}