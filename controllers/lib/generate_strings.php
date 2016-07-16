<?php

// -----------------------------------------
// génère un mot de passe
// -----------------------------------------
function generatePasswd($nbre_alpha_chars, $nbre_int_chars, $nbre_spec_chars){
$Password = "";
$t_caractereLettre = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z');
$t_caractereChiffre = array('2','3','4','5','6','7','8','9');
$t_caractereSpecial = array('*','!','-','_');
$nbrCaractereTotal = $nbre_alpha_chars+$nbre_int_chars+$nbre_spec_chars;
$t_motDePasseNomenclature = array();
for($i=0; $i < $nbrCaractereTotal; $i++){
$caractereType = "";
$t_caractereType = array();
if($nbre_alpha_chars > 0){
array_push($t_caractereType, "lettre");
}
if($nbre_int_chars > 0){
array_push($t_caractereType, "chiffre");
}
if($nbre_spec_chars > 0){
array_push($t_caractereType, "special");
}
shuffle($t_caractereType);
array_push($t_motDePasseNomenclature, $t_caractereType[0]);
if($t_caractereType[0]=="lettre"){
$nbre_alpha_chars--;
}
if($t_caractereType[0]=="chiffre"){
$nbre_int_chars--;
}
if($t_caractereType[0]=="special"){
$nbre_spec_chars--;
}
}
foreach($t_motDePasseNomenclature as $cle => $caractereType){
if($caractereType=="lettre"){
shuffle($t_caractereLettre);
$Password .= $t_caractereLettre[0];
}
if($caractereType=="chiffre"){
shuffle($t_caractereChiffre);
$Password .= $t_caractereChiffre[0];
}
if($caractereType=="special"){
shuffle($t_caractereSpecial);
$Password .= $t_caractereSpecial[0];
}
}
return $Password;
}


function getRandomString($length) {
        $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
        $validCharNumber = strlen($validCharacters);
        $result = "";

        for ($i = 0; $i < $length; $i++) {

            $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
        }

return $result;
}

?>


