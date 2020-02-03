<?php

namespace Models;

class AccountManager
{
    protected $filePath;

    protected $accounts = [];

    protected $_user = [];

    public function __construct()
    {
        $this->filePath = \dirname(__DIR__) . '/data/accounts.php';  // "\" car on est ds un espace de nom nommé

        if (\is_file($this->filePath)) {                        //is_file = verifie existence d'un fichier
            $this->accounts = (require $this->filePath);        //renvoie la valeur envoyer par require grace au "return" (tableau dans account)
        }
    }

    public function save()
    {
        $content = '<?php return ';
        $content .= var_export($this->accounts, true);
        $content .= ';';

        \file_put_contents($this->filePath, $content);
    }

    /**
     * verifie si un utilisateur $_username existe.
     * si oui, une instance de Account contenant les donnees de l'utilisateur est renvoyée
     * sinon, null est renvoyé
     */
    /*public function getUser(string $_username): ?Account    // ": = type de retour methode
    {
        if (!empty($_username)) {
            foreach ($this->accounts as $propertyName => $propertyValue) {
                if ($propertyValue['username'] == $_username) {
                    return new Account($propertyValue);
                }
            }
        }
        return null;
    }*/

    public function getUser(string $_username): ?Account
    {
        $_username = \basename($_username);  //basename = que la derniere partie
        if (!$this->validUsername($_username)) {
            return null;
        }
        foreach ($this->accounts as $key => $user) {
            if ($user['username'] === $_username) {
                return new Account($user);
            }
        }
        return null;
    }



    /** retourne la collection d'users (crée une copie)
     * @return array la collection d'users
     */
    public function getAccounts() : array{
        return $this->accounts;
    }



    /**
     * verifie si un utilisateur $_username existe et controle la correspondance des mots de passe 
     * renvoie true en cas de succes et false en cas d'erreur
     */
    public function login($_username, $_password): bool        //definie type de retour
    {
        $_username = \basename($_username);  //basename = que la derniere partie

        if (!$this->validUsername($_username)) {
            return null;
        }

        if (!empty($_username)) {
            foreach ($this->accounts as $propertyName => $propertyValue) {
                if ($propertyValue['password'] === $_password) {
                    return true;
                }
            }
            return false;
        }
    }


    /**
     * controle la validité d'un nom utilsateur
     * @param string $_username le nom dutilisateur a tester
     * @return bool true si le nom est valide. false sinon.
     */
    public function validUsername(string $_username): bool
    {

        if (empty($_username)) {
            return false;
        }

        if (strlen($_username) < 3) {
            return false;
        }

        return true;
    }


    /**
     * ajoute un new utilisateur apres avoir verifié que $_username n'est pas déjà utilisé
     * renvoie true si l utilisateur a ete ajouté
     * renvoie false en cas d erreur
     */
    public function addUser($_username, $_password, $_email): bool
    {

        if (!$this->validUsername($_username)) {
            return false;
        }
        if ($this->getUser($_username) !== null) {
            return false;
        }
        $newUser = [
            'username' => $_username,
            'password' => \password_hash($_password, PASSWORD_BCRYPT),
            'email' => $_email,
        ];
        $this->accounts[] = $newUser;
        $this->save();
        return true;
    }

    /**
     * verifie si un user $_username existe et le supprime si tel est le cas
     * renvoie true si un user a ete supprimé
     * renvoie false si l'utilisateur n'est pas trouvé
     */
    public function removeUser($_username): bool
    {

        if (!$this->validUsername($_username)) {
            return null;
        }

        if (!empty($_username)) {
            foreach ($this->accounts as $user) {
                if ($user['username'] === $_username) {
                    unset($user);
                    return true;
                }
            }
            return false;
        }
    }
}
