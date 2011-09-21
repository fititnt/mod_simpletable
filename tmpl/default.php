<?php
/*
 * @package         mod_simpletable
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;
?>
<?php echo $modbefore; ?>
<table<?php echo $tableclass; ?>>
    <thead>
        <tr>
        <?php $ncols = 0;
        foreach($table[0] AS $key => $item){
                echo '<th>'. $st->getHeader( &$params ,$key ) .'</th>';
                $ncols++;
        }
        ?> 
        </tr>
</thead>
    <tbody>
        <?php $i=0; $rowprefix='';
        foreach($table AS $row){
            if($tablerowprefix != ''){
                $k = $i++ % 2;
                $rowprefix = ' class="'. $tablerowprefix . $k .'"';
            }
            echo '<tr'.$rowprefix.'>';
                    foreach($row AS $key => $item){                        
                        echo '<td>'.$st->addLink(&$params , $row, $key, $item).'</td>';
                    }
            echo '</tr>';
        }
        ?>        
    </tbody>
    <tfoot>
        <tr><td colspan="<?php echo $ncols; ?>"><?php echo $nitems; ?></td></tr></tfoot>
</table>
<?php echo $modafter; ?>
