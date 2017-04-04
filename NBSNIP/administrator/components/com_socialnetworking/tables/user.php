<?php 
	
	defined ('_JEXEC' ) or die ('Restricted Access');


		class TableUser extends JTable
		{
			var $id =null;
			var $userid = null;
			var $password = null;
			var $activation =null;
			var $registrationdate =null;
			var $lastvisitdate =null;
			var $emailid =null;
			var $addedbyip =null;
			var $lastvisitip = null;
			var $params = null;
			var $published=0;
		
			function TableUser(&$db)
			{
				parent::__Construct('#__sn_user','id',$db);
			}
		}
	?>