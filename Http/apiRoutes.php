<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/ipaperwork/v1'], function (Router $router) {

  // User Paperwork Routes
  require('ApiRoutes/userPaperworkRoutes.php');

 

});
