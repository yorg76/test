<<<<<<< HEAD
=======
<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-12 00:18:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Admin.php [ 196 ] in file:line
2014-08-12 00:18:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-12 00:22:44 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.addresses' doesn't exist [ SHOW FULL COLUMNS FROM `addresses` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:22:44 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('addresses')
#2 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 E:\www10\archiwum\application\classes\User.php(101): Kohana_ORM::factory('Address')
#7 E:\www10\archiwum\application\classes\User.php(66): User->__construct(NULL)
#8 E:\www10\archiwum\application\classes\Controller\Ajax.php(23): User::instance()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_check_user_availability()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:24:31 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.addresses' doesn't exist [ SHOW FULL COLUMNS FROM `addresses` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:24:31 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('addresses')
#2 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 E:\www10\archiwum\application\classes\User.php(101): Kohana_ORM::factory('Address')
#7 E:\www10\archiwum\application\classes\User.php(66): User->__construct(NULL)
#8 E:\www10\archiwum\application\classes\Controller\Ajax.php(23): User::instance()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_check_user_availability()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:33:13 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.addresses' doesn't exist [ SHOW FULL COLUMNS FROM `addresses` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:33:13 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('addresses')
#2 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 E:\www10\archiwum\application\classes\User.php(101): Kohana_ORM::factory('Address')
#7 E:\www10\archiwum\application\classes\User.php(66): User->__construct(NULL)
#8 E:\www10\archiwum\application\classes\Controller\Ajax.php(23): User::instance()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_check_user_availability()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:40:29 --- CRITICAL: Database_Exception [ 1146 ]: Table 'archiwum.addresses' doesn't exist [ SHOW FULL COLUMNS FROM `addresses` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
2014-08-12 00:40:29 --- DEBUG: #0 E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('addresses')
#2 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 E:\www10\archiwum\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 E:\www10\archiwum\application\classes\User.php(101): Kohana_ORM::factory('Address')
#7 E:\www10\archiwum\application\classes\User.php(66): User->__construct(NULL)
#8 E:\www10\archiwum\application\classes\Controller\Ajax.php(23): User::instance()
#9 E:\www10\archiwum\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_check_user_availability()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\www10\archiwum\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#12 E:\www10\archiwum\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\www10\archiwum\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\www10\archiwum\index.php(118): Kohana_Request->execute()
#15 {main} in E:\www10\archiwum\modules\database\classes\Kohana\Database\MySQL.php:359
>>>>>>> refs/remotes/choose_remote_name/master
