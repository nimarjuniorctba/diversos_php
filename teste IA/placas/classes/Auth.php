<?php
class Auth{
    static function check(){ return isset($_SESSION['user_id']); }
    static function admin(){ return ($_SESSION['is_admin']??0)==1; }
}
?>