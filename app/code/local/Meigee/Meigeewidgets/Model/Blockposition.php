<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_Meigeewidgets_Model_Blockposition
{
    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>'None'),
            array('value'=>1, 'label'=>'Left'),
            array('value'=>2, 'label'=>'Right')
        );
    }

}