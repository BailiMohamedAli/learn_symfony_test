<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController 
{
    /**
     * @Route("/", name="index", methods={"GET", "POST"}, host="localhost", schemes={"http", "https"})
     */
    public function index() : Response
    {   
        #dump() replaces var_dump() :
            #when in symfony use dump insted of var_dump cause of circular references Errors
                #dd() replaces dump() die()
                #dump("it's alive !");
                #die();
        dd("it's alive !");
    }
    /**
     * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, host="localhost", schemes={"http", "https"})
     */

    public function test(Request $request, $age) : Response
    {
        #we will use the http URL params with super _GLOBALS
            #and this is to handle possible undifined value
            #####
            # $age = 0;
            # if(!empty($_GET['age'])){
            # $age = $_GET['age'];
            # }
            #####    
        #how to manage HTTP request with symfony/http-foudations
            #==> $request = Request::createFromGlobals();
            #this line can be passed as and argument in the main function like done up
        dump($request);
        # you can pass this variable as an argument directly in the function like up
        # it's a form of destructuring
        # ===> $age = $request->attributes->get('age');
        #set responce using http foundation object class instanciation
        return new Response("your age is: $age, little piece of shit !");
    }
}