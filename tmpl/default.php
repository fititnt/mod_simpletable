<?php
/*
 * @package         Mod_simpletable
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2011 Joomla! Coders Brazil ( @JCoderBR - http://jcoder.org )
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;
print_r($tables);

?>

<table width="100%">
    <thead>
        <tr>
        <?php
        foreach($table[0] AS $key => $item){
                echo '<td>'.getHeader($key).'</td>';
        }
        ?> 
        </tr>
</thead>
    <tbody>
        <?php $i=0;
        foreach($table AS $row){
        $k = $i++ % 2;
        echo '<tr class="row'. $k .'">';
                foreach($row AS $key => $item){
                        echo '<td>'.$item.'</td>';
                }
        echo '</tr>';
        }
        ?>        
    </tbody>
    <tfoot><tr><?php echo count($table); ?></tr></tfoot>
</table>


<?php 
echo '<pre>Table:';
print_r($table);
echo '</pre>';
    print_r($params);
if( $params->get('debug',0) ){
    echo '<pre> Table:';
    print_r($table);
    echo '<hr /> Params';
    print_r($params);
    echo '<hr /> Response';
    print_r($response);
    echo '</pre>';
}
?>