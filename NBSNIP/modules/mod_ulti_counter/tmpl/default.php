<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
JHTML::script('ulticounter.js','modules/mod_ulti_counter/javascript/',false);
?>
<div id="ulti_counter" class="ulti_counter<?php echo $moduleclass_sfx;?>">
<div class="ulti_counter_leading">
<?php echo $leading; echo " "; ?> 
</div>
<div class="ulti_counter_middle"><div id="counter<?php echo $counterID; ?>"></div>
<script type="text/javascript">ulticountdown(<?php echo $timeleft;?>,<?php echo $counterID; ?>,<?php echo $format; ?>,<?php echo $keepCounting; ?>);</script>
</div>
<div class="ulti_counter_tailing">
<?php  echo " "; echo $tailing; ?> 
</div>
</div>
