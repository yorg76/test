<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
        'default' => array
        (
                /**
                 * SwiftMailer driver, used with the email module.
                 *
                 * Valid drivers are: native, sendmail, smtp
                 */
                'driver'  => 'smtp',

                /**
                 * To use secure connections with SMTP, set "port" to 465 instead of 25.
                 * To enable TLS, set "encryption" to "tls".
                 *
                 * Note for SMTP, 'auth' key no longer exists as it did in 2.3.x helper
                 * Simply specifying a username and password is enough for all normal auth methods
                 * as they are autodeteccted in Swiftmailer 4
                 *
                 * PopB4Smtp is not supported in this module as I had no way to test it but
                 * SwiftMailer 4 does have a PopBeforeSMTP plugin so it shouldn't be hard to implement
                 *
                 * Encryption can be one of 'ssl' or 'tls' (both require non-default PHP extensions
                 *
                 * Driver options:
                 * @param   null    native: no options
                 * @param   string  sendmail: executable path, with -bs or equivalent attached
                 * @param   array   smtp: hostname, (username), (password), (port), (encryption)
                 *    SSLCertificateFile /etc/pki/tls/certs/phar.pl.crt
                      SSLCertificateKeyFile /etc/pki/tls/private/phar.pl.key
                      SSLCertificateChainFile /etc/pki/tls/certs/unizeto.ca.pem
                 *
                 *
                 *
                 */
                'options' => [
                    'hostname'=>'pris.blade-runner.pl',
                    'username'=>'archidox@bsdterminal.pl',
        			'fromemail'=>'archidox@bsdterminal.pl',
                    'password'=>'a16FmL6Rub',
                    'port'=>587,
                    'encryption'=>FALSE,
                    'certificate'=>'/home/www_konferencjem/www/application/RSA/pki/issued/server_and_ca.crt',
                    'private_key'=>'/home/www_konferencjem/www/application/RSA/pki/private/server.key',
                ],
        )
);