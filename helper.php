<?php
/*
 * @package         Mod_simpletable
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2011 Joomla! Coders Brazil ( @JCoderBR - http://jcoder.org )
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;


/*
 * Replace {$user->id} with id of current user and {$user->username} with username
 * @var         string          $string: string to search and replace
 * @return      string          $string
 */
function convertFromSession($string){
    $user = JRequest::getuser();
    $string = str_replace('{$user->id}', $user->id, $string );
    $string = str_replace('{$user->username}', $user->id, $string );

    return $string;
}

function getHeader($field){
    //Get Module Param
    $module = &JModuleHelper::getModule('mod_simpletable');
    $params = new JParameter($module->params);
    
    if( !$params->get('jtextheading', 0) ) {
        return $field;
    }
    $field = JTEXT::_(strtoupper( $params->get('jtextheadingtext', 'MOD_SIMPLETABLE_') . $field  ) );
    return $field;
}


/*
 * Prepare query and execute it
 * @return          object
 */

function runQuery( &$params ){

    if ( ! $params->get('advanced', 0) ){
        //$from = $params->get('from', '*');
        $where = $params->get('where', NULL);
        $where2 = $params->get('where2', NULL);
        $where3 = $params->get('where3', NULL);

    } else {
        //$from = convertFromSession( $params->get('from', NULL) );
        $where = convertFromSession( $params->get('where', NULL) );
        $where2 = convertFromSession( $params->get('where2', NULL) );
        $where3 = convertFromSession( $params->get('where3', NULL) );
    }
    $select = $params->get('select', '*');
    $table = $params->get('table', '#__content_articles');
    $order = $params->get('order', NULL);
    $order2 = $params->get('order2', NULL);
    $order3 = $params->get('order3', NULL);

    $db = &JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select( $select );
    $query->from( $table );// do not try convert
    if ( $where  ) $query->where( $where );
    if ( $where2 ) $query->where( $where2 );
    if ( $where3 ) $query->where( $where3 );
    if ( $order  ) $query->order( $order );// do not try convert
    if ( $order2 ) $query->order( $order2 );// do not try convert
    if ( $order3 ) $query->order( $order3 );// do not try convert

    $db->setQuery($query);
    $tableObject = $db->loadObjectList();
    
    //var_dump($db);

    return $tableObject;
}
