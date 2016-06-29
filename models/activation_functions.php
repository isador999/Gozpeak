<?php


function check_account_state($DB, $key, $pseudo) {
        $req = $DB->prepare("SELECT active from members where randomkey = :key AND pseudo = :pseudo");
        $req -> execute(array(':key'=>$key, ':pseudo'=>$pseudo));
        $state = $req->fetchColumn();
        $req->closeCursor();
        return ($state);
}



function update_account_to_active($DB, $key, $pseudo) {
        $req = $DB->prepare("UPDATE members SET active = '1' where randomkey = :key AND pseudo = :pseudo");
        $req -> execute(array(':key'=>$key, ':pseudo'=>$pseudo));
        $req->closeCursor();
}


?>

