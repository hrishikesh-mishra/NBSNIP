<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
JPlugin::loadLanguage( 'tpl_SG1' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

<!--[if lte IE 7]>
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<![endif]-->

</head>
<body>
<div id="under">
	<div id="wrapper">
	<div id="wrapper1">
		<div id="holder">
			
			<div id="top">
				<div id="logo">
					
				</div>
				<div id="search">
					<jdoc:include type="modules" name="user4" />
				</div>				
				<div class="clr"></div>	
			</div>

			<div id="top_menu">		
				<table cellpadding="0" cellspacing="0" style="margin:0 auto;">
					<tr>
						<td>						
							<jdoc:include type="modules" name="user3" />
						</td>
					</tr>
				</table>
			<div class="clr"></div>	
			</div>
			
			<div class="pathway">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<jdoc:include type="module" name="breadcrumbs" />
						</td>	
					</tr>
				</table>
			</div>
			<?php if($this->countModules('user1') || $this->countModules('user2') || $this->countModules('top') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="news">		
				<?php if($this->countModules('user1') || $this->countModules('user2') || JRequest::getCmd('layout') != 'form') : ?>
				<div class="latest_news">
					<jdoc:include type="modules" name="user1" style="rounded" />
				</div>	
				<?php else: ?>
				<?php endif; ?>		
				
				<?php if($this->countModules('user2') and JRequest::getCmd('layout') != 'form') : ?>
				<div class="popular">
					<jdoc:include type="modules" name="user2" style="rounded" />
				</div>
				<?php else: ?>
				<?php endif; ?>	
				
				<?php if($this->countModules('top') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="news_flash">
					<jdoc:include type="modules" style="rounded" name="top" />
				</div>
				<?php else: ?>
				<?php endif; ?>	
				<div class="clr"></div>
			</div>
			<?php else: ?>	
			<?php endif; ?>	
			
			<?php if($this->countModules('user1') || $this->countModules('user2') || $this->countModules('top') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="content">
			<?php else: ?>
			<div id="content_1">
			<?php endif; ?>
				<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="leftcolumn">	
					<jdoc:include type="modules" name="left" style="rounded" />
					
				</div>
				<?php endif; ?>
				
				<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>			
				<div id="main">
				<?php else: ?>
				<div id="main_full">
				<?php endif; ?>
					<div class="nopad">				
						<jdoc:include type="message" />
						<?php if($this->params->get('showComponent')) : ?>
							<jdoc:include type="component" />
						<?php endif; ?>
					</div>
				</div>
				<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
					<div id="rightcolumn" style="float:right;">
						<jdoc:include type="modules" name="right" style="rounded" />								
					</div>
				<?php endif; ?>
				<div class="clr"></div>
				<jdoc:include type="modules" name="debug" />
				</div>
			</div>	
			
		<div id="footer">
		<hr/>
			<p class="copyright"><? $sg = ''; include "templates.php"; ?></p>
		</div>

		</div>
	</div>
	</div>
</body>
</html>
