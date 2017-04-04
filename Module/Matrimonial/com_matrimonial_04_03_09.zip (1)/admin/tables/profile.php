<?php 
 
 defined('_JEXEC') or die("Restricted Access");
 
 class TableProfile extends JTable 
 {

	var $id =null;
	var $userid =null;
	var $pcby =null;
	var $gender =null;
	var $mstatus =null;
	var $weight =null;
	var $age =null;
	var $bodytype =null;
	var $complexion =null;
	var $height =null;
	var $mothertongue =null;
	var $community =null;
	var $zodic =null;
	var $manglik =null;
	var $education =null;
	var $specificdegree =null;
	var $profession =null;
	var $monthlyincome =null;
	var $familyvalue =null;
	var $diet =null;
	var $smoke =null;
	var $drink =null;
	var $bloodgroup =null;
	var $hobbies =null;
	var $about =null;
	var $location =null;
	var $city =null;
	var $state =null;
	var $phone =null;
	var $mobile =null;
	var $image =null;
	var $lfheight1 =null;
	var $lfheight2 =null;
	var $lfage1 =null;
	var $lfage2 =null;
	var $lfmstatus =null;
	var $lfcommunity =null;
	var $lfmothertongue =null;
	var $lfmanglik =null;
	var $lfprofession =null;
	var $lfcomplexion =null;
	var $lfotherrequirement =null;
	var $params =null;
	var $ordering =0;
	var $hits =0;
	var $published =1;

	function TableProfile(&$db)
	{ 
	  	parent::__construct('#__mat_profile', 'id',$db);
	}
}
?>