<?php

namespace Router;

use App\Controllers\UsuarioController;
use App\Controllers\LibroController;
use App\Controllers\EjemplarController;
use App\Controllers\PrestamoController;
use App\helpers\Auth;
use App\helpers\Validate;

class RouterHandler
{
    protected $method;
    protected $data;

    public function set_method($method)
    {
        $this->method = $method;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }

    public function route($controller, $id)
    {
        $resource = new $controller();
        switch ($this->method) {
            case "get":
                if ($id && $id == "create")
                    $resource->create();
                else if ($id)
                    $resource->show($id);
                else    
                    $resource->index();
                break;
            case "post":
                
                $postData = $this->data;
            
                if ($resource instanceof Auth) {

                    $resource->login($postData['email'], $postData['password']);

                } else if ($resource instanceof Validate) {

                        $resource->store($postData);

                } else if ($resource instanceof UsuarioController){

                    if ($id == "store")
                    $resource->store($postData);
                    else if ($id == "update")
                    $resource->update($postData);
                    else
                    $resource->destroy($postData);
                    
                }else if($resource instanceof LibroController){
                    if ($id == "store")
                    $resource->store($postData);
                }


                break;

            case "delete":
                $resource->delete($id);
                break;
        }
    }
}
