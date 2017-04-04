<?php 

	/*
		matrimonail Categories model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'articles.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'codefile.php');
	
	
	jimport ('joomla.application.component.model');
	
	jimport('joomla.utilities.date');

class developerzoneModelDeveloperZone extends JModel
{  

	
	function __construct()
	{
		parent::__construct();
	}

	function &getCategories()
	{
		$db= & JFactory::getDBO();
		$query="select id,category from #__dev_categories where published>0";
		$result = $this->_getList( $query );
		return $result;	
	}
	
	function getDownloadSearch($cat,$key)
	{
		$db= & JFactory::getDBO();
		
		$where []=' (published >0)';
		
		$where[] = ' (category ='.$db->Quote( $db->getEscaped( $cat, true ), false ).')';
			
		if ($key)
			$where[] = ' (lower(title) LIKE '.$db->Quote('%'. $db->getEscaped( strtolower($key), true ).'%', false ).') ';
		
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query="select *  from #__dev_codefile ". $where;
		$result = $this->_getList( $query );
		return $result;
	}
	
	function catName($cat)
	{
		$db= & JFactory::getDBO();
		
		$where []=' (published >0)';	
		$where[] = ' (id ='.$db->Quote( $db->getEscaped( $cat, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );		
		$query="select category  from #__dev_categories ". $where;		
		$result = $this->_getList( $query );
		return @$result[0];
	}
	
	function downmoreinfo($id)
	{
		$db= & JFactory::getDBO();
		
		$where []=' (published >0)';	
		$where[] = ' (id ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );		
		
		$query="select * from #__dev_codefile ". $where;		
		$result = $this->_getList( $query );
		return @$result[0];
	}
	
	function getArtclSearch($cat,$key)
	{
		
		$db= & JFactory::getDBO();
		
		$where []=' (published >0)';
		
		$where[] = ' (category ='.$db->Quote( $db->getEscaped( $cat, true ), false ).')';
			
		if ($key)
			$where[] = ' (lower(title) LIKE '.$db->Quote('%'. $db->getEscaped( strtolower($key), true ).'%', false ).') ';
		
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query="select *  from #__dev_articles ". $where;
		$result = $this->_getList( $query );
		return $result;
	}
	
	function artclmoreinfo($id)
	{
		$db= & JFactory::getDBO();
		
		$where []=' (published >0)';	
		$where[] = ' (id ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );		
		
		$query="select * from #__dev_articles ". $where;		
		$result = $this->_getList( $query );
		return @$result[0];	
	}
	
	function lastId()
	{
		
		$db= & JFactory::getDBO();
		
		$query="select max(id) as mid from #__dev_codefile ";		
		$result = $this->_getList( $query );
		return @$result[0];	
	}
		
	
	function saveCode($data)
	{
		$row =& JTable::getInstance('codefile','Table');
		$id=$data['id'];
		
		if(!$id)
		{
			jimport('joomla.utilities.date');
			$dateNow= new JDate();
			$dateMySql= $dateNow->toMySQL();
			$data['creationdate']=$dateMySql;
			$data['addedby']=$_SERVER['REMOTE_ADDR'];
			
		}
		if (!$row->bind($data))
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		if (!$row->check()) 
		{
		JError::raiseError(500, $row->getError() );
		}

		if (!$row->store())
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		else
		{
			if (!$id)
			{	
			
				$mid=$this->lastId();
				echo "The Mid= " .$mid->mid;
				
			}

			if ($_FILES['cfile']['size'])
			{
				$this->fileupdload($mid->mid);
				
			}		
		
		}
		return true;
	
	}
	
	function fileupdload($id)
	{	
	
		if (!($_FILES['cfile']['size']) || ($_FILES['cfile']['size'])>6000000 ) 
		{
			return false;
		}
		 else 
		 {
		 
			$permitted = array('application/zip','application/x-rar-compressed');
			$typeOK = false;
			
			
		
			foreach ($permitted as $type) 
			{
				if ($type == $_FILES['cfile']['type']) 
				{
					$typeOK = true;
					break;
				}
			}
			if ($typeOK )
			{
			
				$cate='category_'.JRequest::getVar('category');
				jimport ('joomla.filesystem.folder');
				
				$folder=JPATH_SITE.DS.'codefile';
			
				$folder=JFolder::makeSafe($folder);
				
				if (!JFolder::exists($folder))
				{
					JFolder::create($folder);				
				}	
				
				$folder=JPATH_SITE.DS.'codefile'.DS.$cate;
				$folder=JFolder::makeSafe($folder);
				
				if (!JFolder::exists($folder))
				{
					JFolder::create($folder);
				}
				
				$name=$_FILES['cfile']['name'];
				 
				$filename='devzone_'.$id.'_'.$name;
	
				$newname = JPATH_SITE.DS.'codefile'.DS.$cate.DS.$filename;
				
				
			
				if (!(move_uploaded_file($_FILES['cfile']['tmp_name'], $newname))) 
				{
					return false;
				} 
				else 
				{
			
					if($this->filenameupdate($id,$filename))
					{
						return false;
					}
					else
					{
						return true;
					}
				
				}
			}
			else
			{
				return false;
			}

		}
	}
	
	function filenameupdate($id,$filename)
	{
		
		$db 	=& JFactory::getDBO();
		$query = "UPDATE #__dev_codeFile "
		. " SET codefile = " . $db->Quote(  $filename, false ) 
		. " WHERE id=".$id;	
		
		$db->setQuery( $query );
		
		if (!$db->query()) 
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
	}
	
	function saveArticle($data)
	{
		$row =& JTable::getInstance('Articles','Table');
		
		jimport('joomla.utilities.date');
		$dateNow= new JDate();
		$dateMySql= $dateNow->toMySQL();
		$data['createdate']=$dateMySql;
		$data['addedby']=$_SERVER['REMOTE_ADDR'];
		
		if (!$row->bind($data))
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		if (!$row->check()) 
		{
		JError::raiseError(500, $row->getError() );
		}

		if (!$row->store())
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
				
		return true;
	}
}

?>