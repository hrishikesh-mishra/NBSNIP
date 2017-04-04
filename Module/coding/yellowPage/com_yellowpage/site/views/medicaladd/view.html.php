<?php

	/* 
		yellowpage Medicall add html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class yellowPageViewMedicalAdd extends JView 
	{
		
		function random_text($count, $rm_similar = false)
		{
		    // create list of characters
		    $chars = array_flip(array_merge(range(0, 9), range('A', 'Z')));

		    // remove similar looking characters that might cause confusion
		    if ($rm_similar)
		    {
		        unset($chars[0], $chars[1], $chars[2], $chars[5], $chars[8],
		        $chars['B'], $chars['I'], $chars['O'], $chars['Q'],
		         $chars['S'], $chars['U'], $chars['V'], $chars['Z']);
		    }

		    // generate the string of random text
		    for ($i = 0, $text = ''; $i < $count; $i++)
		    {
		        $text .= array_rand($chars);
		    }
	
		    return $text;
		}
		function display($tpl = null)
		{
			JHTML::_('behavior.formvalidation');
			
			$text = $this->random_text (5);
			$sess =& JFactory::getSession();
			$sess->set('scode',$text,'medicaladd');

			$image =JHTML::_('image','/components\com_yellowpage\assets\captcha.php?scode='.$text,'myimage');

		
			$this->assignRef('image', $image);
			parent::display();
		} 
		
		
	}
?>