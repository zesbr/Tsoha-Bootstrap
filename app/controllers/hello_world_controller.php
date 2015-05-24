<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('home.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      // View::make('helloworld.html');
      View::make('team/teams.html');
    }

    public static function show(){
      View::make('team/show.html');
    }

    public static function edit(){
      View::make('bet/edit.html');
    }

  }
