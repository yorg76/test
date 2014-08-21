<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-13 19:15:01 --- CRITICAL: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'pagination' at 'MODPATH\pagination' ~ SYSPATH\classes\Kohana\Core.php [ 579 ] in E:\www12\web\archiwum\application\bootstrap.php:134
2014-08-13 19:15:01 --- DEBUG: #0 E:\www12\web\archiwum\application\bootstrap.php(134): Kohana_Core::modules(Array)
#1 E:\www12\web\archiwum\index.php(102): require('E:\\www12\\web\\ar...')
#2 {main} in E:\www12\web\archiwum\application\bootstrap.php:134
2014-08-13 19:16:20 --- CRITICAL: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'pagination' at 'MODPATH\pagination' ~ SYSPATH\classes\Kohana\Core.php [ 579 ] in E:\www12\web\archiwum\application\bootstrap.php:134
2014-08-13 19:16:20 --- DEBUG: #0 E:\www12\web\archiwum\application\bootstrap.php(134): Kohana_Core::modules(Array)
#1 E:\www12\web\archiwum\index.php(102): require('E:\\www12\\web\\ar...')
#2 {main} in E:\www12\web\archiwum\application\bootstrap.php:134
2014-08-13 19:17:34 --- CRITICAL: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in E:\www12\web\archiwum\modules\database\classes\Kohana\Database\MySQL.php:171
2014-08-13 19:17:34 --- DEBUG: #0 E:\www12\web\archiwum\modules\database\classes\Kohana\Database\MySQL.php(171): Kohana_Database_MySQL->connect()
#1 E:\www12\web\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#2 E:\www12\web\archiwum\application\classes\Model\Customer.php(98): Kohana_Database_Query->execute()
#3 E:\www12\web\archiwum\application\classes\Controller\Customer.php(57): Model_Customer->count()
#4 E:\www12\web\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www12\web\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www12\web\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www12\web\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www12\web\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www12\web\archiwum\modules\database\classes\Kohana\Database\MySQL.php:171
2014-08-13 19:17:55 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ MODPATH\pagination\classes\kohana\pagination.php [ 92 ] in file:line
2014-08-13 19:17:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-13 19:18:17 --- CRITICAL: ErrorException [ 1 ]: Class 'Pagination' not found ~ APPPATH\classes\Controller\Customer.php [ 56 ] in file:line
2014-08-13 19:18:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-13 19:18:28 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ MODPATH\pagination\classes\kohana\pagination.php [ 92 ] in file:line
2014-08-13 19:18:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-13 19:19:18 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ MODPATH\pagination\classes\kohana\pagination.php [ 92 ] in file:line
2014-08-13 19:19:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-13 19:20:27 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ MODPATH\pagination\classes\kohana\pagination.php [ 92 ] in file:line
2014-08-13 19:20:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-13 19:21:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ MODPATH\pagination\classes\kohana\pagination.php [ 92 ] in file:line
2014-08-13 19:21:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-13 19:22:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ MODPATH\pagination\classes\kohana\pagination.php [ 92 ] in file:line
2014-08-13 19:22:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line