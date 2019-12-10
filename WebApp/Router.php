<?php

//http://flipquizz.crm/questions/1/update                  coté client
//http://flipquizz.crm/index.php?url=questions/1/update    coté serveur

//principe restfull
/*array (
    0 => controller
    1 => identifiant
    2 => action
)*/

class Router
{
    protected $controller;

    protected $id;

    protected $action;


    public function __construct()
    {
        /*if(!empty($_GET['url']))
        {
            $url = explode('/', $_GET['url']);
        }
        else
        {
            $url = ['home', '0', 'get'];
        }*/

        $url = (!empty($_GET['url']) ? explode ('/', $_GET['url']) : ['home', '0', 'get']);

        $this->controller = basename($url[0] ?? 'home');    //si [0] va chercher dans home - null-coalescing operator
        //equivaut à $this -> controller = !empty($url[0]) ? $url [0] : 'home';

        $this->id = intval($url[1] ?? '0'); 

        $this->action = basename($url[2] ?? 'get');  //basename = double sécurité
    }
}