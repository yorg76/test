<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Michell `b4x` Hoduń <mhodun@gmail.com>
 * @copyright  Michell `b4x` Hoduń
 * @version    1.0
 */
class Message
{
   /**
    * Ustawienia wiadomości we 'flashu'
    * @param string $name
    * @param array $arguments 
    */
    public static function __callStatic($name = FALSE, $arguments = FALSE)
    {
        if($arguments)
        {
            Session::instance()->set('message_'.$name, $arguments[0]);

            if(isset($arguments[1]))
            {
                HTTP::redirect($arguments[1]);
                exit;
            }
        }
        else
        {
            return Session::instance()->get_once('message_'.$name);
        }
    }
}