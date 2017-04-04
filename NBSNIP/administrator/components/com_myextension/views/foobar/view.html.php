<?php
defined( '_JEXEC' ) or die( 'Restricted access view' );

jimport( 'joomla.application.component.view' );

class myextensionViewFoobar extends JView 
{
	function display($tpl = null)
	{
		
		JToolBarHelper::title(   JText::_( 'MyExtension Manager' ), 'generic.png' );
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		JToolBarHelper::publish();
		JToolBarHelper::unpublish();
		JToolBarHelper::preferences('com_myextension','500');
		
		$item1 ='index.php?option=com_myextension&task=add';
		$item2 ='index.php?option=com_myextension&task=edit';

		
		JSubMenuHelper::addEntry(JText::_('Add'), $item1, false);
		JSubMenuHelper::addEntry(JText::_('Edit'), $item2, false);

		echo "<br> View Model Name = " . $this->_defaultModel;	
		$foobar =& $this->get('Foobar');
		$this->assignRef('foobar', $foobar);

		parent::display();
	}
	function pageIn()
	{
		$model =& $this->getModel('foobar');
		return $model->getPagination()->getListFooter();
	}
     
}
?>