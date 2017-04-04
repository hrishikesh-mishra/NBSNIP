<html><?php
/**
* abstract mambo joomla template
* @version 1.0
* @package abstract template
* @copyright (C) 2005 joomladesigns.co.uk
* @Refer to the License conditions via www.joomladesigns.co.uk 
*/
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$iso = split( '=', _ISO );
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Language" content="en-gb">
<?php if ( $my->id ) initEditor(); ?> <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<?php mosShowHead(); ?> 
<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['mosConfig_live_site']; ?>/templates/abstract/css/template_css.css" />
</head>
<body background="templates/abstract/images/bg.gif">
<div align="center">
<div id="container">
		<div id="header">
			<h1 title="Joomladesigns abstract">Joomladesigns|abstract</h1>
			</div>
			<ul id="mainlevel-nav"><li><?php mosLoadModules ( 'user3' ); ?></li>
						</ul>		<img id="frontimage" src="templates/abstract/images/abstract.jpg" width="738" height="130"/>
<div id="leftcolum">
				<?php mosLoadModules ( 'left' ); ?><?php mosLoadModules ( 'user1' ); ?>
			</div>
		<div id="main">
		<?php mosMainBody(); ?>
			</div>					
		<div id="footer">
		<?php include_once('includes/footer.php'); ?></div>
</div>
</body>
</html>