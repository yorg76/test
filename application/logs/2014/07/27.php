<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-27 20:27:56 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: users ~ APPPATH\views\customer\index.php [ 24 ] in E:\www10\archiwum\application\views\customer\index.php:24
2014-07-27 20:27:56 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(24): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 24, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\application\views\customer\index.php:24
2014-07-27 20:33:10 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: customers ~ APPPATH\views\customer\index.php [ 19 ] in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 20:33:10 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 19, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:01:40 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:01:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:01:54 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:01:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:01:56 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:01:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:01:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:01:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:01:58 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:01:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:03:12 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:03:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:03:13 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:03:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:03:14 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:03:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:03:15 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:03:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:03:22 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: customers ~ APPPATH\views\customer\index.php [ 19 ] in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:03:22 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 19, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:03:27 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\User.php [ 132 ] in file:line
2014-07-27 21:03:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:07:20 --- CRITICAL: View_Exception [ 0 ]: The requested view user/create could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in E:\www10\archiwum\system\classes\Kohana\View.php:137
2014-07-27 21:07:20 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\View.php(137): Kohana_View->set_filename('user/create')
#1 E:\www10\archiwum\system\classes\Kohana\View.php(30): Kohana_View->__construct('user/create', NULL)
#2 E:\www10\archiwum\application\classes\Controller\User.php(64): Kohana_View::factory('user/create')
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_create()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\system\classes\Kohana\View.php:137
2014-07-27 21:15:31 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Customer.php [ 45 ] in file:line
2014-07-27 21:15:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:16:08 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: customers ~ APPPATH\views\customer\index.php [ 19 ] in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:16:08 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 19, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:16:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: customers ~ APPPATH\views\customer\index.php [ 19 ] in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:16:09 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 19, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 21:57:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\User.php [ 116 ] in file:line
2014-07-27 21:57:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:59:22 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\User.php [ 116 ] in file:line
2014-07-27 21:59:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 21:59:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\User.php [ 116 ] in file:line
2014-07-27 21:59:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-27 23:45:11 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: customers ~ APPPATH\views\customer\index.php [ 19 ] in E:\www10\archiwum\application\views\customer\index.php:19
2014-07-27 23:45:11 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 19, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Welcome->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\application\views\customer\index.php:19