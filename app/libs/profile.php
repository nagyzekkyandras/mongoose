<?php 

class Profile {

    public $name;
    public $email;
    public $permission;

    function __construct($name, $email, $permission) {
        $this->name = $name;
        $this->email = $email;
        $this->permission = $permission;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPermission() {
        return $this->permission;
    }

    public function getProfileInfo(){
        return '<p id="email">Email: ' . $this->getName() . '</p>
                <p>Name: ' . $this->getEmail() . '</p>
                <p>Permission: ' . $this->getPermission() . '</p>';
    }
}