<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-19 10:26:43 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant id - assumed 'id' ~ APPPATH\classes\Controller\Welcome.php [ 49 ] in E:\www12\web\archiwum\application\classes\Controller\Welcome.php:49
2014-07-19 10:26:43 --- DEBUG: #0 E:\www12\web\archiwum\application\classes\Controller\Welcome.php(49): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\\www12\\web\\ar...', 49, Array)
#1 E:\www12\web\archiwum\application\classes\Controller\Default.php(8): Controller_Welcome->before()
#2 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(69): Controller_Default->before()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Default))
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www12\web\archiwum\application\classes\Controller\Welcome.php:49
2014-07-19 10:29:48 --- CRITICAL: Kohana_Exception [ 0 ]: The Uzytkownik property does not exist in the Model_User class ~ MODPATH\orm\classes\Kohana\ORM.php [ 687 ] in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:603
2014-07-19 10:29:48 --- DEBUG: #0 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(603): Kohana_ORM->get('Uzytkownik')
#1 E:\www12\web\archiwum\application\classes\Controller\Welcome.php(51): Kohana_ORM->__get('Uzytkownik')
#2 E:\www12\web\archiwum\application\classes\Controller\Default.php(8): Controller_Welcome->before()
#3 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(69): Controller_Default->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Default))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:603
2014-07-19 10:32:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method View::add_css() ~ APPPATH\classes\Controller\Default.php [ 14 ] in file:line
2014-07-19 10:32:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 12:29:35 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant OK - assumed 'OK' ~ APPPATH\classes\Controller\Default.php [ 51 ] in E:\www12\web\archiwum\application\classes\Controller\Default.php:51
2014-07-19 12:29:35 --- DEBUG: #0 E:\www12\web\archiwum\application\classes\Controller\Default.php(51): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\\www12\\web\\ar...', 51, Array)
#1 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_Default->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Default))
#4 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#7 {main} in E:\www12\web\archiwum\application\classes\Controller\Default.php:51
2014-07-19 13:02:17 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Controller_User::load_template() ~ APPPATH\classes\Controller\Welcome.php [ 50 ] in file:line
2014-07-19 13:02:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 13:10:37 --- CRITICAL: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH\auth\classes\Kohana\Auth.php [ 155 ] in E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth\File.php:40
2014-07-19 13:10:37 --- DEBUG: #0 E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth\File.php(40): Kohana_Auth->hash('Mleko100%')
#1 E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_File->_login('admin', 'Mleko100%', '1')
#2 E:\www12\web\archiwum\application\classes\Controller\User.php(47): Kohana_Auth->login('admin', 'Mleko100%', '1')
#3 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth\File.php:40
2014-07-19 13:19:57 --- CRITICAL: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH\auth\classes\Kohana\Auth.php [ 155 ] in E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth\File.php:40
2014-07-19 13:19:57 --- DEBUG: #0 E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth\File.php(40): Kohana_Auth->hash('Mleko100%')
#1 E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_File->_login('admin', 'Mleko100%', '1')
#2 E:\www12\web\archiwum\application\classes\Controller\User.php(47): Kohana_Auth->login('admin', 'Mleko100%', '1')
#3 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www12\web\archiwum\modules\auth\classes\Kohana\Auth\File.php:40
2014-07-19 13:20:35 --- CRITICAL: Kohana_Exception [ 0 ]: The requested route does not exist: user ~ SYSPATH\classes\Kohana\Route.php [ 109 ] in E:\www12\web\archiwum\application\classes\Controller\User.php:51
2014-07-19 13:20:35 --- DEBUG: #0 E:\www12\web\archiwum\application\classes\Controller\User.php(51): Kohana_Route::get('user')
#1 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#7 {main} in E:\www12\web\archiwum\application\classes\Controller\User.php:51
2014-07-19 13:21:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Controller\User.php [ 51 ] in file:line
2014-07-19 13:21:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 13:25:35 --- CRITICAL: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH\orm\classes\Kohana\ORM.php [ 1275 ] in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:1302
2014-07-19 13:25:35 --- DEBUG: #0 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(1302): Kohana_ORM->check(NULL)
#1 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(1421): Kohana_ORM->create(NULL)
#2 E:\www12\web\archiwum\application\classes\Controller\User.php(54): Kohana_ORM->save()
#3 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:1302
2014-07-19 13:40:33 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_User::addRole() ~ APPPATH\classes\Controller\User.php [ 51 ] in file:line
2014-07-19 13:40:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 13:42:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_User::addUser_Role() ~ APPPATH\classes\Controller\User.php [ 51 ] in file:line
2014-07-19 13:42:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 13:42:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_User::addUserRole() ~ APPPATH\classes\Controller\User.php [ 51 ] in file:line
2014-07-19 13:42:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 13:43:38 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_User::user_roles() ~ APPPATH\classes\Controller\User.php [ 51 ] in file:line
2014-07-19 13:43:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 13:43:55 --- CRITICAL: Kohana_Exception [ 0 ]: The user_roles property does not exist in the Model_User class ~ MODPATH\orm\classes\Kohana\ORM.php [ 760 ] in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:702
2014-07-19 13:43:55 --- DEBUG: #0 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(702): Kohana_ORM->set('user_roles', Array)
#1 E:\www12\web\archiwum\application\classes\Controller\User.php(51): Kohana_ORM->__set('user_roles', Array)
#2 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:702
2014-07-19 13:44:31 --- CRITICAL: Kohana_Exception [ 0 ]: The roles property does not exist in the Model_User class ~ MODPATH\orm\classes\Kohana\ORM.php [ 760 ] in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:702
2014-07-19 13:44:31 --- DEBUG: #0 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(702): Kohana_ORM->set('roles', Array)
#1 E:\www12\web\archiwum\application\classes\Controller\User.php(51): Kohana_ORM->__set('roles', Array)
#2 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php:702
2014-07-19 13:45:47 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`roles_users`, CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) [ INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES (NULL, 'admin'), (NULL, 'login') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-19 13:45:47 --- DEBUG: #0 E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `ro...', false, Array)
#1 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(1577): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 E:\www12\web\archiwum\application\classes\Controller\User.php(51): Kohana_ORM->add('roles', Array)
#3 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-19 13:46:41 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`roles_users`, CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) [ INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES (NULL, 1), (NULL, 2) ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-19 13:46:41 --- DEBUG: #0 E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `ro...', false, Array)
#1 E:\www12\web\archiwum\modules\orm\classes\Kohana\ORM.php(1577): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 E:\www12\web\archiwum\application\classes\Controller\User.php(51): Kohana_ORM->add('roles', Array)
#3 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-19 14:00:33 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\templates\user\main.php [ 8 ] in file:line
2014-07-19 14:00:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-19 14:00:55 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\templates\user\main.php [ 8 ] in file:line
2014-07-19 14:00:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line