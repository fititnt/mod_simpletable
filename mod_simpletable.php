<?php
/*
 * @package         mod_simpletable
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;

// Include helper.php once
require_once dirname(__FILE__).'/helper.php';

$modbefore = htmlspecialchars_decode(($params->get('modbefore','')));
$modafter = htmlspecialchars_decode(($params->get('modafter','')));

$tableclass = htmlspecialchars($params->get('tableclass', ''));
if($tableclass != ''){
    $tableclass = ' class = "'.$tableclass.'"';
} else {
    $tableclass = '';
}
$tablerowprefix = htmlspecialchars($params->get('tablerowprefix', 'cat-list-row'));
if( !$tablerowprefix ){
    $tablerowprefix = '';
}

$nitems = count($table);

$st = new SimpleTable;
if($params->get('querymode', '1') == 0){
    $table = $st->runQuery( &$params );//Must be by reference
} else {
    $table = $st->runQueryRaw( &$params );//Must be by reference
}

if( $params->get('debug', 0)== 1){
    echo '<pre>';
    echo 'Table Object <hr />';
    var_dump($table);
    echo '<br /> Module Parameters<hr />';
    print_r($params);
    echo '</pre>'; 
}

require JModuleHelper::getLayoutPath('mod_simpletable', $params->get('layout', 'default'));