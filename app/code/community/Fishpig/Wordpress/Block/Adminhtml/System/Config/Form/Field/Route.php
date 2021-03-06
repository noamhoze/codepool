<?php
/**
 * @category    Fishpig
 * @package     Fishpig_Wordpress
 * @license     http://fishpig.co.uk/license.txt
 * @author      Ben Tideswell <help@fishpig.co.uk>
 */

class Fishpig_Wordpress_Block_Adminhtml_System_Config_Form_Field_Route extends Mage_Adminhtml_Block_System_Config_Form_Field
{
	/**
	 * Retrieve the HTML for the element
	 *
	 * @param Varien_Data_Form_Element_Abstract $element
	 * @return string
	 */
	protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
	{
		return parent::_getElementHtml($element)
			 . $this->_getRouteJs($element);
	}
	
	/**
	 * Retrieve the JS to display the route
	 *
	 * @param Varien_Data_Form_Element_Abstract $element
	 * @return string
	 */
	protected function _getRouteJs($element)
	{
		return sprintf("
			<script type=\"text/javascript\">
				(function() {
					var inp = $('%s');
					var MAGE_URL = '%s';
										
					inp.insert({'after': new Element('p', {'class': 'note', 'id': inp.id + '-note'})});
					
					var nt = $(inp.id + '-note');

					inp.observe('blur', function(event) {
						inp.setValue(inp.getValue().toLowerCase().replace(/([^a-z0-9\-\/]{1,})/, ''));
						nt.innerHTML = MAGE_URL + inp.getValue() + '/';
					});
					
					setTimeout(function() {
						inp.focus();
						inp.blur();
					}.bind(this), 1000);
				})();
			</script>
		", $element->getHtmlId(), $this->_getBaseUrl());
	}
	
	/**
	 * Retrieve the Magento base URL for the current store
	 *
	 * @return string
	 */
	protected function _getBaseUrl()
	{
		$helper = Mage::helper('wordpress');

		return substr(rtrim($helper->getUrl(), '/'), 0, -strlen($helper->getBlogRoute()));
	}
}