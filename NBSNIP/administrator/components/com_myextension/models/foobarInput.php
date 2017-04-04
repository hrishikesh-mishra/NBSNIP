<?php
defined( '_JEXEC' ) or die( 'Restricted access model' );

jimport ('joomla.application.component.model');

class myextensionModelFoobarInput extends JModel
{
	var $_id;

	var $_foobar;
	var $_data;

	function __construct()
	{
		parent::__construct();
		
		$cid= JRequest::getVar('cid',  0, '', 'array');
		

		if($cid)
		{
			$id=$cid[0];
		}
		else
		{
			$id=JRequest::getInt('id', 0);
		}
		$this->setId($id);
	}


	function setId($id=0)
	{

		$this->_id= $id;
		$this->_foobar = null;
		$this->data=null;
	}

	
	function &getData()
	{
		// Load the data
		echo "<br><br><br>The ID  = " .$this->_id . "\n";
		if (empty( $this->_data)) {
			$query = ' SELECT * FROM #__myextension_foobars '.
					'  WHERE id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->foobar = null;
		}
		return $this->_data;
	}


	
	 


	
}
?>
