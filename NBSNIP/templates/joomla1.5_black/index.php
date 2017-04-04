<?php
/**
 * @copyright	Copyright (C) 2007 Inspiration Web Design http://www.iswebdesign.co.uk. All rights reserved.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"
dir="<?php echo $this->direction; ?>" >
<head>
<!-- Designed by Fiona Coulter www.iswebdesign.co.uk-->
<!-- Copyright Fiona Coulter www.iswebdesign.co.uk-->
<!-- You may not remove copyright or branding information-->
<jdoc:include type="head" />
<?php

if (($this->countModules( 'user1' )) && ($this->countModules( 'user2' ))) {
//if both modules are loaded, we need a 50%-layout for them
	$usera = 'user1';
	$userb = 'user2';
} else if (($this->countModules( 'user1' )) || ($this->countModules( 'user2' ))) {
// if only one, then 100% no matter which one.
	$usera = 'user3';
	$userb = 'user3';
}
?>
<link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/color_<?php echo $this->params->get('colorVariation'); ?>.css" type="text/css" />
<script type="text/javascript" language="javascript">
<!--
<?php
   /*** get appropriate widths - left and right columns have fixed width if present, the central column
   width is adjusted accordingly
   if javascript not enabled user will see default 760px page width******/

   $colwidth = 40;
   $pagewidth = 760;
   if($this->countModules( "left" )) { $colwidth += 180; }
   if($this->countModules( "right" ) || $this->countModules( "top" )) { $colwidth += 140; }
   print "var colwidth=$colwidth;\n";
?>
var thistemplate = '<?php echo $this->template; ?>';
//-->
</script>
<style type="text/css">
  #maincolumn{ width: <?php print ($pagewidth - $colwidth); ?>px;}
  <?php
  $contentFormat = $this->params->get('contentFormat', '1');
  $columnHeight = $this->params->get('columnHeight', '46');

  if( $contentFormat=='2')
    { echo '#content{overflow: auto; height:' .$columnHeight . 'em;}'; }
?>
</style>
<script type="text/javascript" language="javascript" src="templates/<?php echo $this->template; ?>/js/screen.js"></script>
</head>
<body>
<div id="accessibility">
	<a href="index.php#menu">
		Menu</a>
	<a href="index.php#content">
		Content/Inhalt</a>
</div>
<div id="maindiv">
  <div id="header">
       <?php
         //search
			if ($this->countModules( "user4" )) {
				?>
				<div id="search">
					<jdoc:include type="modules" name="user4" style="xhtml"/>
				</div>
				<?php
			}
		?>


		<?php
		  //top menu
		if ($this->countModules( "user3" )) { ?>
		  <div id="topmenu">
		     <jdoc:include type="modules" name="user3" style="xhtml"/>
		  </div>
		<?php } ?>

		<div id="mylogo"><!--link to Inspiration Web Design Site-->
		Website Design by<br />
		<a id="mylink" href="http://www.iswebdesign.co.uk">Inspiration</a>
         <!--end link to Inspiration Web Design-->
        </div>

        <br style="clear:both;" />

		<?php if ( $this->params->get('showSiteHeading') == 1 ){ ?>
		  <div id="sitename">
		   	<h1><?php print $mainframe->getCfg('sitename'); ?></h1>
		  </div>
        <?php } ?>

		<?php
			  //banner
			if ($this->countModules( "banner" )) { ?>
			  <div id="banner">
				 <jdoc:include type="modules" name="banner" style="xhtml"/>
			  </div>
		<?php } ?>
		<br style="clear:both;" />


 </div><!--end header-->
 <br style="clear:both;" />
 		<div id="pathway">
 			<jdoc:include type="module" name="breadcrumbs" style="xhtml"/>
 		</div>

 <br style="clear:both;" />


 		<a name="menu"></a>
 		<div id="leftcol">
 			<?php
 			  //left column
 			if ($this->countModules( "left" )) {
 			?>
 				<jdoc:include type="modules" name="left" style="rounded" />
 				<jdoc:include type="modules" name="syndicate" style="rounded"/>
 			<?php
 			}
 			?>
		</div>

 <div id="midpage">
   <div id="maincolumn">
           <?php
           if ($this->countModules( "user1" )) {
   				?>
   				<div id="<?php echo $usera; ?>">
   					<jdoc:include type="modules" name="user1" style="xhtml" />
   				</div>
   			<?php
   			}
   			if ($this->countModules( "user2" )) {
   				?>
   				<div id="<?php echo $userb; ?>">
   					<jdoc:include type="modules" name="user2" style="xhtml" />
   				</div>
   			<?php
   			}
			?>
           &nbsp;<br style="clear: left;" />
           	<div id="content">
		   		<a name="content"></a>
		   		<jdoc:include type="message" />
                <jdoc:include type="component" />
			</div>
			 &nbsp;<br style="clear: left;" />
   </div><!--end maincolumn-->

   <?php
    //right column
   		if (($this->countModules( "right" )) || ($this->countModules( "top" ))) {
   		?>
   			<div id="rightcol">
   				<jdoc:include type="modules" name="top" style="xhtml"/>
   				<jdoc:include type="modules" name="right" style="xhtml"/>
   			</div>
   		<?php
   		}
		?>

    &nbsp;<br style="clear: left;" />
 </div><!--end midpage-->
 &nbsp;<br style="clear: left;" />
 <div id="footer" >
        <jdoc:include type="modules" name="footer" style="xhtml"/>
        <?php include("templates/".$this->template."/includes/footer.php"); ?>
		<?php echo JText::_('Powered by');?> <a href="http://www.joomla.org/">Joomla!</a>
		<jdoc:include type="modules" name="debug" />
 </div>
</div><!--end maindiv-->
</body>
</html>