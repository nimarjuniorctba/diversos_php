<?php
class Database {
    public function connect(){
        return new PDO("mysql:host=localhost;dbname=placacheck","root","",
        [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    }
}
?>