<?php

namespace Models;

class Account
{
    public $username;
    private $password;
    public $email;
    public $logged;

    /**
     * [
     * 'username' => 'mike',
     * 'password' => 'aaaa',
     * 'email' => 'mike@test.fr',
     * ]
     */
    public function __construct(array $_user = [])
    {
        if(!empty($_user)) {
            foreach ($this as $propertyName => $propertyValue) { 
                          //on parcour l'objet
                if(\array_key_exists($propertyName, $_user)) {

                    $this->{$propertyName} = $_user[$propertyName];     //si correspondance dans tableau on remplit                
                }
            }
        }
    }

    public function setPassword(string $_pass)
    {
        $this->password = \password_hash($_pass, PASSWORD_BCRYPT);
    }

    public function checkPassword(string $_pass)
    {
        $this->logged = (\password_verify($_pass, $this->password));
        return $this->logged;
    }
}
    
