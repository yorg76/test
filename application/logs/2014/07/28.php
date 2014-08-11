<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-28 00:50:31 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Controller\Customer.php [ 64 ] in file:line
2014-07-28 00:50:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:50:32 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Controller\Customer.php [ 64 ] in file:line
2014-07-28 00:50:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:51:06 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Controller\Customer.php [ 94 ] in file:line
2014-07-28 00:51:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:51:12 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Controller\Customer.php [ 94 ] in file:line
2014-07-28 00:51:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:51:13 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Controller\Customer.php [ 94 ] in file:line
2014-07-28 00:51:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:53:51 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Customer' not found ~ APPPATH\classes\Controller\Customer.php [ 44 ] in file:line
2014-07-28 00:53:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:54:51 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$', expecting '&' or variable (T_VARIABLE) ~ APPPATH\classes\Model\Customer.php [ 111 ] in file:line
2014-07-28 00:54:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:55:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$', expecting '&' or variable (T_VARIABLE) ~ APPPATH\classes\Model\Customer.php [ 111 ] in file:line
2014-07-28 00:55:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 00:55:24 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:55:24 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:56:47 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:56:47 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:56:48 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:56:48 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:18 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:18 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:20 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:20 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:22 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:22 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:23 --- CRITICAL: ErrorException [ 2048 ]: Declaration of Model_Customer::update() should be compatible with Kohana_ORM::update(Validation $validation = NULL) ~ APPPATH\classes\Model\Customer.php [ 125 ] in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 00:58:23 --- DEBUG: #0 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::error_handler(2048, 'Declaration of ...', 'E:\\www10\\archiw...', 125, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Core.php(511): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_Customer')
#3 E:\www10\archiwum\application\classes\Controller\Customer.php(44): spl_autoload_call('Model_Customer')
#4 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#7 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#10 {main} in E:\www10\archiwum\system\classes\Kohana\Core.php:511
2014-07-28 01:01:55 --- CRITICAL: ErrorException [ 1 ]: Class 'Pagination' not found ~ APPPATH\classes\Controller\Customer.php [ 46 ] in file:line
2014-07-28 01:01:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:01:57 --- CRITICAL: ErrorException [ 1 ]: Class 'Pagination' not found ~ APPPATH\classes\Controller\Customer.php [ 46 ] in file:line
2014-07-28 01:01:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:01:59 --- CRITICAL: ErrorException [ 1 ]: Class 'Pagination' not found ~ APPPATH\classes\Controller\Customer.php [ 46 ] in file:line
2014-07-28 01:01:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:03:07 --- CRITICAL: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'pagination' at 'MODPATH\pagination' ~ SYSPATH\classes\Kohana\Core.php [ 579 ] in E:\www10\archiwum\application\bootstrap.php:134
2014-07-28 01:03:07 --- DEBUG: #0 E:\www10\archiwum\application\bootstrap.php(134): Kohana_Core::modules(Array)
#1 E:\www10\archiwum\index.php(102): require('E:\\www10\\archiw...')
#2 {main} in E:\www10\archiwum\application\bootstrap.php:134
2014-07-28 01:03:12 --- CRITICAL: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'pagination' at 'MODPATH\pagination' ~ SYSPATH\classes\Kohana\Core.php [ 579 ] in E:\www10\archiwum\application\bootstrap.php:134
2014-07-28 01:03:12 --- DEBUG: #0 E:\www10\archiwum\application\bootstrap.php(134): Kohana_Core::modules(Array)
#1 E:\www10\archiwum\index.php(102): require('E:\\www10\\archiw...')
#2 {main} in E:\www10\archiwum\application\bootstrap.php:134
2014-07-28 01:04:26 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.$_table_name' doesn't exist [ SELECT * FROM `$_table_name` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:04:26 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(105): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(47): Model_Customer->count()
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:07:53 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _table_name ~ APPPATH\classes\Model\Customer.php [ 104 ] in E:\www10\archiwum\application\classes\Model\Customer.php:104
2014-07-28 01:07:53 --- DEBUG: #0 E:\www10\archiwum\application\classes\Model\Customer.php(104): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 104, Array)
#1 E:\www10\archiwum\application\classes\Controller\Customer.php(47): Model_Customer->count()
#2 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www10\archiwum\application\classes\Model\Customer.php:104
2014-07-28 01:09:02 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.$_table_name' doesn't exist [ SELECT * FROM `$_table_name` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:09:02 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(105): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(47): Model_Customer->count()
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:09:45 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _table_name ~ APPPATH\classes\Model\Customer.php [ 74 ] in E:\www10\archiwum\application\classes\Model\Customer.php:74
2014-07-28 01:09:45 --- DEBUG: #0 E:\www10\archiwum\application\classes\Model\Customer.php(74): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 74, Array)
#1 E:\www10\archiwum\application\classes\Controller\Customer.php(50): Model_Customer->getList(Object(Pagination))
#2 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www10\archiwum\application\classes\Model\Customer.php:74
2014-07-28 01:10:44 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.$_table_name' doesn't exist [ SELECT * FROM `$_table_name` LIMIT 1 OFFSET 0 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:10:44 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(77): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(50): Model_Customer->getList(Object(Pagination))
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:11:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _table_name ~ APPPATH\classes\Model\Customer.php [ 74 ] in E:\www10\archiwum\application\classes\Model\Customer.php:74
2014-07-28 01:11:09 --- DEBUG: #0 E:\www10\archiwum\application\classes\Model\Customer.php(74): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 74, Array)
#1 E:\www10\archiwum\application\classes\Controller\Customer.php(50): Model_Customer->getList(Object(Pagination))
#2 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www10\archiwum\application\classes\Model\Customer.php:74
2014-07-28 01:11:11 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _table_name ~ APPPATH\classes\Model\Customer.php [ 74 ] in E:\www10\archiwum\application\classes\Model\Customer.php:74
2014-07-28 01:11:11 --- DEBUG: #0 E:\www10\archiwum\application\classes\Model\Customer.php(74): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 74, Array)
#1 E:\www10\archiwum\application\classes\Controller\Customer.php(50): Model_Customer->getList(Object(Pagination))
#2 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#8 {main} in E:\www10\archiwum\application\classes\Model\Customer.php:74
2014-07-28 01:12:29 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'firma' (T_STRING), expecting variable (T_VARIABLE) ~ APPPATH\classes\Model\Customer.php [ 5 ] in file:line
2014-07-28 01:12:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:12:30 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'firma' (T_STRING), expecting variable (T_VARIABLE) ~ APPPATH\classes\Model\Customer.php [ 5 ] in file:line
2014-07-28 01:12:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:12:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ''firma'' (T_CONSTANT_ENCAPSED_STRING), expecting '&' or variable (T_VARIABLE) ~ APPPATH\classes\Model\Customer.php [ 111 ] in file:line
2014-07-28 01:12:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:12:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ''firma'' (T_CONSTANT_ENCAPSED_STRING), expecting '&' or variable (T_VARIABLE) ~ APPPATH\classes\Model\Customer.php [ 111 ] in file:line
2014-07-28 01:12:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-28 01:13:45 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: director ~ APPPATH\views\customer\index.php [ 9 ] in E:\www10\archiwum\application\views\customer\index.php:9
2014-07-28 01:13:45 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 9, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\application\classes\Controller\Customer.php(112): Controller_Welcome->after()
#10 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Customer->after()
#11 [internal function]: Kohana_Controller->execute()
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#13 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#16 {main} in E:\www10\archiwum\application\views\customer\index.php:9
2014-07-28 01:14:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: firma ~ APPPATH\views\customer\index.php [ 9 ] in E:\www10\archiwum\application\views\customer\index.php:9
2014-07-28 01:14:23 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 9, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\application\classes\Controller\Customer.php(112): Controller_Welcome->after()
#10 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Customer->after()
#11 [internal function]: Kohana_Controller->execute()
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#13 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#16 {main} in E:\www10\archiwum\application\views\customer\index.php:9
2014-07-28 01:14:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: firma ~ APPPATH\views\customer\index.php [ 9 ] in E:\www10\archiwum\application\views\customer\index.php:9
2014-07-28 01:14:28 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 9, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\application\classes\Controller\Customer.php(112): Controller_Welcome->after()
#10 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Customer->after()
#11 [internal function]: Kohana_Controller->execute()
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#13 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#16 {main} in E:\www10\archiwum\application\views\customer\index.php:9
2014-07-28 01:17:19 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: Customer ~ APPPATH\classes\Controller\Customer.php [ 54 ] in E:\www10\archiwum\application\classes\Controller\Customer.php:54
2014-07-28 01:17:19 --- DEBUG: #0 E:\www10\archiwum\application\classes\Controller\Customer.php(54): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 54, Array)
#1 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#4 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#7 {main} in E:\www10\archiwum\application\classes\Controller\Customer.php:54
2014-07-28 01:19:34 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('Firma Testowa1', '1234567890', '12345678') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:19:34 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(67): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:20:51 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('Firma Testowa1', '1234567890', '12345678') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:20:51 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:20:56 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('Firma Testowa1', '1234567890', '12345678') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:20:56 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:23:44 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('Firma Testowa1', '1234567890', '12345678') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:23:44 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:29:15 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('asdfadf', '`13412355125', '`13412341234') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:29:15 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:34:41 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('1', '`13412355125', '`13412341234') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:34:41 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:34:52 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('1', '`13412355125', '`13412341234') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:34:52 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:40:50 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('1', '`13412355125', '`13412341234') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 01:40:50 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 15:07:50 --- CRITICAL: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`archiwum`.`firma`, CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`id`) REFERENCES `firma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) [ INSERT INTO `firma` (`nazwa`, `nip`, `regon`) VALUES ('asedf', 'asdf', 'asdf') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 15:07:50 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fi...', false, Array)
#1 E:\www10\archiwum\application\classes\Model\Customer.php(60): Kohana_Database_Query->execute()
#2 E:\www10\archiwum\application\classes\Controller\Customer.php(67): Model_Customer->add(Array)
#3 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Customer->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#9 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\Query.php:251
2014-07-28 20:26:53 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: movie ~ APPPATH\views\customer\index.php [ 71 ] in E:\www10\archiwum\application\views\customer\index.php:71
2014-07-28 20:26:53 --- DEBUG: #0 E:\www10\archiwum\application\views\customer\index.php(71): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\\www10\\archiw...', 71, Array)
#1 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#2 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#3 E:\www10\archiwum\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\www10\archiwum\application\views\templates\main.php(363): Kohana_View->__toString()
#5 E:\www10\archiwum\system\classes\Kohana\View.php(61): include('E:\\www10\\archiw...')
#6 E:\www10\archiwum\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\www10\\archiw...', Array)
#7 E:\www10\archiwum\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\www10\archiwum\application\classes\Controller\Welcome.php(90): Kohana_Controller_Template->after()
#9 E:\www10\archiwum\application\classes\Controller\Customer.php(112): Controller_Welcome->after()
#10 E:\www10\archiwum\system\classes\Kohana\Controller.php(87): Controller_Customer->after()
#11 [internal function]: Kohana_Controller->execute()
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#13 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#16 {main} in E:\www10\archiwum\application\views\customer\index.php:71