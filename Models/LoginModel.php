<?php
class LoginModel{
public function __construct()
{
}
public function validateUser($username, $password) {
 
    $query = "SELECT * FROM users WHERE username = '".$username."' LIMIT 1";
    $user = getRaw($query);

    if (!is_null($user) && $password==$user[0]['password']) {
        return $user;
    }
    return false;
}
}
?>