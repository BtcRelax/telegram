<?php

class erLhcoreClassTelegramValidator
{
    public static function validateBot(erLhcoreClassModelTelegramBot & $item)
    {
            $definition = array(
                'bot_username' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'bot_api' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'chat_timeout' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
                ),
                'dep_id' => new ezcInputFormDefinitionElement(
                    ezcInputFormDefinitionElement::OPTIONAL, 'int', array('min_range' => 1)
                )
            );

            $form = new ezcInputForm( INPUT_POST, $definition );
            $Errors = array();
            
            if ( $form->hasValidData( 'bot_username' ) && $form->bot_username != '')
            {
                $item->bot_username = $form->bot_username;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter phone number!');
            }
            
            if ( $form->hasValidData( 'bot_api' ) && $form->bot_api != '')
            {
                $item->bot_api = $form->bot_api;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter Account SID!');
            }

            if ( $form->hasValidData( 'dep_id' ))
            {
                $item->dep_id = $form->dep_id;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please choose a department!');
            }
            
            if ( $form->hasValidData( 'chat_timeout' ))
            {
                $item->chat_timeout = $form->chat_timeout;
            } else {
                $Errors[] =  erTranslationClassLhTranslation::getInstance()->getTranslation('xmppservice/operatorvalidator','Please enter chat timeout!');
            }
            
            return $Errors;        
    }
    
}