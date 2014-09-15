<?php
return array(
    'default'       => 'pl',    // The default language code
    'cookie'        => 'lang',  // The cookie name
    'hide_default'  => FALSE,   // Hide the language code for the default language
    'auto_detect'   => TRUE,    // Auto detect the user language on the homepage
    /**
     * The allowed languages
     * For each language, you need to give a code (2-5 chars) for the key,
     * the 5 letters i18n language code, the locale and the label for the auto generated language selector menu.
     */
    'languages'     =>  array( 
        
        'en'        => array(
            'i18n'      => 'en_EN',
            'locale'    => array('en_EN.utf-8'),
            'label'     => 'english',
        ),
        'pl'        =>  array(
            'i18n'      => 'pl_PL',
            'locale'    => array('pl_PL.utf-8'),
            'label'     => 'polski',
        ),
    ),
);