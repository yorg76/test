<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-29 00:07:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: init ~ APPPATH\views\templates\main.php [ 365 ] in E:\www10\archiwum\application\views\templates\main.php:365
2014-07-29 00:07:48 --- DEBUG: #0 E:\www10\archiwum\application\views\templates\main.php(365): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 365, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#5 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#8 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#11 {main} in E:\www10\archiwum\application\views\templates\main.php:365
2014-07-29 00:13:48 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$_init' (T_VARIABLE) ~ APPPATH\classes\Controller\Welcome.php [ 100 ] in file:line
2014-07-29 00:13:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line