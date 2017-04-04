<?php
//------------------------------------------------------------
//-- Time Zone Clock Version 3.9.3 (Oct 29, 2008)           --
//-- 3.9.3 Added in gmt -4.5 for Venuzuela                  --
//-- 3.9.2 Changed document.onload event handling           --
//-- 3.9.1 Added in DST calc for IRAQ                       -- 
//-- 3.9.0 Corrected Reverse time offset problem            -- 
//-- 3.8.7 Added option displaying the zone text first      -- 
//-- 3.8.6 Added option of padding for vertical clock layout-- 
//-- 3.8.5 Correct Minutes for Adelaide Australia           --
//-- 3.8.4 Initialize Content and change $fontfamily to     --
//--       $fontfam on line 342 thanks arq                  --
//-- 3.8.3 Change to allow setting for borders              --
//-- 3.8.2 Minor correction to xml file to work correctly   --
//-- 3.8.1 Changes proposed by C. Kuijt webmaster@cheezum.nl--
//--       added code to change background color on each    --
//--       displayed clock separately                       --
//-- 3.8 Added in code for Australia                        --
//-- 3.7.1  Fixed EU check for DST                          --
//-- 3.7 Added a horizontal layout for the clocks           --
//-- 3.6 Add 2 more timezones - add check for ie to not put --
//--     empty divs in for zones - add multiple options to  --
//--     style the clock display                            --
//-- 3.5 Add into window.onload instead of running directly --
//--                                                        --
//-- 3.4 Clean code and output to make module XHTML         --
//--     Compliant                                          --
//-- 3.3 Code cleanup - fixed display of weekday            --
//--                                                        --
//-- 3.2 Code cleanup - no real functionality changes 	    --
//--     added ability to change display of seconds  	    --
//--                                                        --
//------------------------------------------------------------

/**
* @ Copyright (C) 2007 Advance Language Alliance
* @ Autor : Dave ( Dave Sowers )
* @ URL: www.advlanguage.com
**/
defined( '_JEXEC' ) or die( 'Restricted access' );
//global $prefix, $dbi;
function specialOffset(&$inputoff,&$inputmins,&$flag){
      switch( $inputoff ) {
            case "tza":
                  $inputoff=-3;
                  $inputmins=-30;
                  break;
            case "tzvz":
                  $inputoff=-4;
                  $inputmins=-30;
                  break;
            case "tzb":
                  $inputoff=-9;
                  $inputmins=-30;
                  break;
            case "tzaa":
                  $inputoff=3;
                  $inputmins=30;
                  break;
            case "tzaab":
                  $inputoff=4;
                  $inputmins=30;
                  break;                  
            case "tzbb":
                  $inputoff=5;
                  $inputmins=30;
                  break;
            case "tzcc":
                  $inputoff=5;
                  $inputmins=45;
                  break;
            case "tzdd":
                  $inputoff=6;
                  $inputmins=30;
                  break;
            case "tzee":
                  $inputoff=9;
                  $inputmins=30;
                  break;
            case "tzff":
                  $inputoff=10;
                  $inputmins=30;
                  $flag=30;
                  break;
            case "tzff1":
                  $inputoff=10;
                  $inputmins=30;
                  break;                  
            case "tzgg":
                  $inputoff=11;
                  $inputmins=30;
                  break;
            case "tzhh":
                  $inputoff=12;
                  $inputmins=45;
                  break;
      }
}//end specialOffset
function getnthday($year, $month, $DoW, $week="") {
    if ( (($week != "") && (($week > 5) || ($week < 1))) || ($DoW > 6) || ($DoW < 0) ) {
        // $DoW must be between 0 and 6 (Sun=0, ... Sat=6); $week must be between 1 and 5
        // if you want the last week of the month on day_of_week -- do not pass $week
        return FALSE;
    } else {
        if (!$week || ($week == "")) {
            $lastday = date("t", mktime(0,0,0,$month,1,$year));
            $temp = (date("w",mktime(0,0,0,$month,$lastday,$year)) - $DoW) % 7;
        } else {$temp = ($DoW - date("w",mktime(0,0,0,$month,1,$year))) % 7;}
        if ($temp < 0) {$temp += 7;}
        if (!$week || ($week == "")) {$day = $lastday - $temp;
        } else {$day = (7 * $week) - 6 + $temp;}
        return $day;
    }
}
function checkDST(&$type,&$mins,&$flag,&$dstrue){
      if ($type==0) {return;}
      $today = getdate();
      if($type==3 || $type==4){     //do special calculations for Australia
            
            $MarchDateAU      =getnthday($today['year'],3,0);
            $auflag=mktime(3, 0, 0, 3 ,$MarchDateAU, $today['year']); //this year march
            $audatenow=time();//+ (16* 24 * 60 * 60); //date now plus 17 days should be march 25
            if ($audatenow>$auflag){
                  $MarchDateAU =getnthday($today['year']+1,3,0);
                  $OctoberDateAU=getnthday($today['year'],10,0);
                  $OctoberDateAU2   =getnthday($today['year'],10,0,1);
                  $begdate3  = mktime(2, 0, 0, 10 ,$OctoberDateAU, $today['year']);
                  $enddate3  = mktime(3, 0, 0, 3 ,$MarchDateAU, $today['year']+1);
                  $begdate4  = mktime(2, 0, 0, 10 ,$OctoberDateAU2, $today['year']);
                  $enddate4  = mktime(3, 0, 0, 3 ,$MarchDateAU, $today['year']+1);}
            else {
                  $OctoberDateAU    =getnthday($today['year']-1,10,0);
                  $OctoberDateAU2   =getnthday($today['year']-1,10,0,1);
                  $begdate3  = mktime(2, 0, 0, 10 ,$OctoberDateAU, $today['year']-1);
                  $enddate3  = mktime(3, 0, 0, 3 ,$MarchDateAU, $today['year']);
                  $begdate4  = mktime(2, 0, 0, 10 ,$OctoberDateAU2, $today['year']-1);
                  $enddate4  = mktime(3, 0, 0, 3 ,$MarchDateAU, $today['year']);}
            }
      $datenow  = time();
      
      switch ($type){
            case 1:// European Daylight Saving Time
                  $MarchDateEU      =getnthday($today['year'],3,0);
                  $OctoberDateEU    =getnthday($today['year'],10,0);
                  $begdate2  = mktime(1, 0, 0, 3 ,$MarchDateEU, $today['year']);
                  $enddate2  = mktime(1, 0, 0, 10 ,$OctoberDateEU, $today['year']);
                  if (($datenow > $begdate2) && ($datenow < $enddate2)) {$mins+=60;$dstrue=1;}
                  break; 
            case 2://US Daylight Saving Time
                  $MarchDate        =getnthday($today['year'],3,0,2);
                  $NovemberDate     =getnthday($today['year'],11,0,1);
                  $begdate1  = mktime(1, 59, 59, 3 ,$MarchDate, $today['year']);
                  $enddate1  = mktime(2, 0, 0, 11 ,$NovemberDate, $today['year']);
                  if (($datenow > $begdate1) && ($datenow < $enddate1)) {$mins+=60;$dstrue=1;}
                  break;
                  
            case 3://Australian Daylight Savings Time  Normal
//                  echo "AU Beg ==>".date('Y-m-d H:i:s', $begdate3)."<br>";
//                  echo "AU End ==>".date('Y-m-d H:i:s', $enddate3)."<br>";
                  if (($datenow > $begdate3) && ($datenow < $enddate3)) {if($flag<>0){$mins=$mins+$flag;$dstrue=1;}else{$mins+=60;$dstrue=1;}}
                  break;
            case 4://Australian Daylight savings Time Tasmania
//                  echo "AU Beg2==>".date('Y-m-d H:i:s',$begdate4)."<br>";
//                  echo "AU End ==>".date('Y-m-d H:i:s',$enddate4)."<br>";
                  if (($datenow > $begdate4) && ($datenow < $enddate4)) {$mins+=60;$dstrue=1;/*echo "Mins2 ==> $mins";*/}
                  break;
            case 5://Iraq Daylight savings Time starts April 1 ends October 1
				  $begdate5  = mktime(2, 59, 59, 4 ,1, $today['year']);
                  $enddate5  = mktime(3, 59, 59, 10 ,1, $today['year']);	
      			  if (($datenow > $begdate5) && ($datenow < $enddate5)) {$mins+=60;$dstrue=1;}
                  break;                                
      } //end switch
}//end function checkDST
//------------------------------------------------------------
//-- get our setup variables                                --
//-- 														--
//-- Modification:
//-- Check if background-colors per timezone are set. If 	--
//-- not then set background-color as universal color.		--
//------------------------------------------------------------
$bgcolor1 = "";
$bgcolor2 = "";
$bgcolor3 = "";
$bgcolor4 = "";
$bgcolor5 = "";
$bgcolor6 = "";
$bgcolor7 = "";
$bgcolor8 = "";
$bgcolor9 = "";
$bgcolor10 = "";
$bgcolor    = $params->get('Background_Color');
$setSepBGC	= $params->get('individual_bg');
if($setSepBGC){ // Only define individual colors if this is enabled.
	$bgcolor1	= $params->get('bgcolor1');
	$bgcolor2	= $params->get('bgcolor2');
	$bgcolor3	= $params->get('bgcolor3');
	$bgcolor4	= $params->get('bgcolor4');
	$bgcolor5	= $params->get('bgcolor5');
	$bgcolor6	= $params->get('bgcolor6');
	$bgcolor7	= $params->get('bgcolor7');
	$bgcolor8	= $params->get('bgcolor8');
	$bgcolor9	= $params->get('bgcolor9');
	$bgcolor10	= $params->get('bgcolor10');
	// Check every backgroundcolor.
	if($bgcolor1 == ""){$bgcolor1 = $bgcolor;}
	if($bgcolor2 == ""){$bgcolor2 = $bgcolor;}
	if($bgcolor3 == ""){$bgcolor3 = $bgcolor;}
	if($bgcolor4 == ""){$bgcolor4 = $bgcolor;}
	if($bgcolor5 == ""){$bgcolor5 = $bgcolor;}
	if($bgcolor6 == ""){$bgcolor6 = $bgcolor;}
	if($bgcolor7 == ""){$bgcolor7 = $bgcolor;}
	if($bgcolor8 == ""){$bgcolor8 = $bgcolor;}
	if($bgcolor9 == ""){$bgcolor9 = $bgcolor;}
	if($bgcolor10 == ""){$bgcolor10 = $bgcolor;}
}
$borders    = $params->get('Borders');
$bordcol    = $params->get('Border_Color');
if ($borders==1){$borderstr="border: 1px solid ".$bordcol.";";}
else {$borderstr="";}
$textcol    = $params->get('Text_Color');
$fontfam    = $params->get('Font_Family');
$fontsize   = $params->get('Font_Size');
$showdebug  = $params->get('Show_Debug');
$fontweight = $params->get('Font_Weight');
$dispseconds= $params->get('Display_Seconds');
$dst1       = $params->get('daylight1');
$dst2       = $params->get('daylight2');
$dst3       = $params->get('daylight3');
$dst4       = $params->get('daylight4');
$dst5       = $params->get('daylight5');
$dst6       = $params->get('daylight6');
$dst7       = $params->get('daylight7');
$dst8       = $params->get('daylight8');
$dst9       = $params->get('daylight9');
$dst10      = $params->get('daylight10');
$dstrue1    =0;
$dstrue2    =0;
$dstrue3    =0;
$dstrue4    =0;
$dstrue5    =0;
$dstrue6    =0;
$dstrue7    =0;
$dstrue8    =0;
$dstrue9    =0;
$dstrue10   =0;
$ZoneFirst  = $params->get('ZoneFirst');
$Zone1      = $params->get('Zone1');
$Zone2      = $params->get('Zone2');
$Zone3      = $params->get('Zone3');
$Zone4      = $params->get('Zone4');
$Zone5      = $params->get('Zone5');
$Zone6      = $params->get('Zone6');
$Zone7      = $params->get('Zone7');
$Zone8      = $params->get('Zone8');
$Zone9      = $params->get('Zone9');
$Zone10     = $params->get('Zone10');
$Z1Offset   = $params->get('Z1Offset');
$Z2Offset   = $params->get('Z2Offset');
$Z3Offset   = $params->get('Z3Offset');
$Z4Offset   = $params->get('Z4Offset');
$Z5Offset   = $params->get('Z5Offset');
$Z6Offset   = $params->get('Z6Offset');
$Z7Offset   = $params->get('Z7Offset');
$Z8Offset   = $params->get('Z8Offset');
$Z9Offset   = $params->get('Z9Offset');
$Z10Offset  = $params->get('Z10Offset');
$displayday = $params->get('DispDay'); 
$DispAM_PM  = $params->get('DispAM_PM');
$Display  = $params->get('Display_Style');
$cellpad = $params->get('cellpad');
//
if(is_string($Z1Offset) && $Zone1<>"") {specialOffset($Z1Offset, $minutes1,$flag1);}
if(is_string($Z2Offset) && $Zone2<>"") {specialOffset($Z2Offset, $minutes2,$flag2);}
if(is_string($Z3Offset) && $Zone3<>"") {specialOffset($Z3Offset, $minutes3,$flag3);}
if(is_string($Z4Offset) && $Zone4<>"") {specialOffset($Z4Offset, $minutes4,$flag4);}
if(is_string($Z5Offset) && $Zone5<>"") {specialOffset($Z5Offset, $minutes5,$flag5);}
if(is_string($Z6Offset) && $Zone6<>"") {specialOffset($Z6Offset, $minutes6,$flag6);}
if(is_string($Z7Offset) && $Zone7<>"") {specialOffset($Z7Offset, $minutes7,$flag7);}
if(is_string($Z8Offset) && $Zone8<>"") {specialOffset($Z8Offset, $minutes8,$flag8);}
if(is_string($Z9Offset) && $Zone9<>"") {specialOffset($Z9Offset, $minutes9,$flag9);}
if(is_string($Z10Offset) && $Zone10<>"") {specialOffset($Z10Offset, $minutes10,$flag10);}
if($dst1 && $Zone1<>"") checkDST($dst1,$minutes1,$flag1,$dstrue1);
if($dst2 && $Zone2<>"") checkDST($dst2,$minutes2,$flag2,$dstrue2);
if($dst3 && $Zone3<>"") checkDST($dst3,$minutes3,$flag3,$dstrue3);
if($dst4 && $Zone4<>"") checkDST($dst4,$minutes4,$flag4,$dstrue4);
if($dst5 && $Zone5<>"") checkDST($dst5,$minutes5,$flag5,$dstrue5);
if($dst6 && $Zone6<>"") checkDST($dst6,$minutes6,$flag6,$dstrue6);
if($dst7 && $Zone7<>"") checkDST($dst7,$minutes7,$flag7,$dstrue7);
if($dst8 && $Zone8<>"") checkDST($dst8,$minutes8,$flag8,$dstrue8);
if($dst9 && $Zone9<>"") checkDST($dst9,$minutes9,$flag9,$dstrue9);
if($dst10 && $Zone10<>"") checkDST($dst10,$minutes10,$flag10,$dstrue10);
if($Zone1<>""){$time1 = $Z1Offset * 60 + $minutes1; }
if($Zone2<>""){$time2 = $Z2Offset * 60 + $minutes2; }
if($Zone3<>""){$time3 = $Z3Offset * 60 + $minutes3; }
if($Zone4<>""){$time4 = $Z4Offset * 60 + $minutes4; }
if($Zone5<>""){$time5 = $Z5Offset * 60 + $minutes5; }
if($Zone6<>""){$time6 = $Z6Offset * 60 + $minutes6; }
if($Zone7<>""){$time7 = $Z7Offset * 60 + $minutes7; }
if($Zone8<>""){$time8 = $Z8Offset * 60 + $minutes8; }
if($Zone9<>""){$time9 = $Z9Offset * 60 + $minutes9; }
if($Zone10<>""){$time10 = $Z10Offset * 60 + $minutes10; }
//---------------------------------------------------------------------------
$content='<script type="text/javascript">
//<![CDATA[
//------------------------------------------------------------
//--  Time Zone Clock Version 3.9.2                         --
//--  The script uses the server time to display the clocks --
//------------------------------------------------------------
var DispDay=';
$content .= $displayday . ';var DispSeconds=';
$content .= $dispseconds . ';var zonefirst=';
$content .= $ZoneFirst .';var disp_ampm=';
$content.= $DispAM_PM ;
$content.=";var servertimestr='" . GMdate("F d, Y H:i:s", time());
$content.='\';var servtime=new Date(servertimestr);';
$content.="var DispHoriz=$Display;";
if($Zone1<>""){
      $content.='var z1text="'.$Zone1.'";';
      $content.='var z1time='. $time1 .';';
      if ($dstrue1) {$content.='var z1dst="*";';}else{$content.='var z1dst=0;';}
      }
if($Zone2<>""){
      $content.='var z2text="'.$Zone2.'";';
      $content.='var z2time='. $time2 .';';
      if ($dstrue2) {$content.='var z2dst="*";';}else{$content.='var z2dst=0;';}
      }
if($Zone3<>""){
      $content.='var z3text="'.$Zone3.'";';
      $content.='var z3time='. $time3 .';';
      if ($dstrue3) {$content.='var z3dst="*";';}else{$content.='var z3dst=0;';}
      }
if($Zone4<>""){
      $content.='var z4text="'.$Zone4.'";';
      $content.='var z4time='. $time4 .';';
      if ($dstrue4) {$content.='var z4dst="*";';}else{$content.='var z4dst=0;';}
      }
if($Zone5<>""){
      $content.='var z5text="'.$Zone5.'";';
      $content.='var z5time='. $time5 .';';
      if ($dstrue5) {$content.='var z5dst="*";';}else{$content.='var z5dst=0;';}
      }
if($Zone6<>""){
      $content.='var z6text="'.$Zone6.'";';
      $content.='var z6time='. $time6 .';';
      if ($dstrue6) {$content.='var z6dst="*";';}else{$content.='var z6dst=0;';}
      }
if($Zone7<>""){
      $content.='var z7text="'.$Zone7.'";';
      $content.='var z7time='. $time7 .';';
      if ($dstrue7) {$content.='var z7dst="*";';}else{$content.='var z7dst=0;';}
      }
if($Zone8<>""){
      $content.='var z8text="'.$Zone8.'";';
      $content.='var z8time='. $time8 .';';
      if ($dstrue8) {$content.='var z8dst="*";';}else{$content.='var z8dst=0;';}
      }                  
if($Zone9<>""){
      $content.='var z9text="'.$Zone9.'";';
      $content.='var z9time='. $time9 .';';
      if ($dstrue9) {$content.='var z9dst="*";';}else{$content.='var z9dst=0;';}
      }                  
if($Zone10<>""){
      $content.='var z10text="'.$Zone10.'";';
      $content.='var z10time='. $time10 .';';
      if ($dstrue10) {$content.='var z10dst="*";';}else{$content.='var z10dst=0;';}
       }                              
$content.='var ampm="";var d = document;function did(objID){return d.getElementById(objID);}
Date.prototype.TZoff=new Function("var X, Y, Z; with (this){X = getTimezoneOffset(); Y = Math.abs(X);return LZ(X*-1)  }");
Date.prototype.UStimeStr=new Function("var H;with (this) return PadZero(1+((H=getUTCHours())+11)%12  )+\':\'+LZ(getUTCMinutes())+\':\'+LZ(getSeconds())+[\' AM\',\' PM\'][+(H>11)]");
Date.prototype.T24timeStr=new Function("var H;with (this) return LZ(getUTCHours())+\':\'+LZ(getUTCMinutes())+\':\'+LZ(getSeconds())");
Date.prototype.UStimeStrNS=new Function("var H;with (this) return PadZero(1+((H=getUTCHours())+11)%12)+\':\'+LZ(getUTCMinutes())+[\' AM\',\' PM\'][+(H>11)]");
Date.prototype.T24timeStrNS=new Function("var H;with (this) return LZ(getUTCHours())+\':\'+LZ(getUTCMinutes())");
function DoWstr(DoWk) {return "SunMonTueWedThuFriSatSun".substr(3*DoWk, 3)}
var spantxt="<span style=\'color:'.$textcol.'; font-size:'.$fontsize.'; display:inline; font-weight:'.$fontweight.';padding: 0px 2px 0px 5px;vertical-align:middle; align=left\'>";
var spantxt2="<span style=\'font-family:'.$fontfam.';margin: 0px 7px 0px 0px;padding:0px 2px 0px 2px;color:'.$textcol.';font-size:'.$fontsize.';font-weight:'.$fontweight.';'.$borderstr.' background:'.$bgcolor.'; vertical-align:middle; width:auto; align=left\'>";
var servtime=new Date(servertimestr);
var stsec=servtime.getTime();
var utsecdo=new Date();
var utsec=utsecdo.getTime();
var secdiff=stsec-utsec+(utsecdo.TZoff()*60*1000);
function LZ(x){return (x>=10||x<0?"":"0") + x; }
function PadZero(num){
      if (DispHoriz)
            {return num;}
      else {
            if(num<=9) {return "&nbsp;&nbsp;"+num;}else{ return num;}}            
}
function buildTime(srvtime,texttodisp,timeoffset,dst)
      {
        if(dst=="*"){var dispflag="*";}else {var dispflag="&nbsp;";}
        houris=srvtime.getUTCHours();
        minis =srvtime.getUTCMinutes();
        secondis=srvtime.getUTCSeconds();
        
        yy=Math.abs(parseInt(secdiff/1000));
        adjminadd=yy % 60;
        zz=yy%60;
        yy=(yy-adjminadd)/60;
        if (secdiff<0){yy=yy*(-1);}
        if (secdiff<0){zz=zz*(-1);}
if(did("tzcdebug")){did("tzcdebug").innerHTML="Minutes off(+/-)sign="+yy+"<br/>Seconds off(+/-)sign="+zz;}
        Y = Math.abs(timeoffset);
        minadd = parseInt(Y % 60);
        Y=(Y-minadd)/60;
        if(timeoffset<0){Y=Y*(-1);if(minadd!=0){Y=Y-1;}}
        calcseconds=Math.abs(secondis)+zz;
        calcminutes=Math.abs(minis+minadd)+yy;
       // calcminutes=Math.abs(minis+timeoffset)+yy;
        calchours=houris+Y;
        
with (N = new Date()) {	
	N.setUTCHours(calchours,calcminutes,calcseconds);
	if(DispDay){dayofweek="("+DoWstr(N.getUTCDay())+")";}else{dayofweek="";}

            if(DispHoriz) {
                  if(DispSeconds){
                        if (disp_ampm){return spantxt+texttodisp+"<\/span>&nbsp;"+spantxt2+N.UStimeStr()+dispflag+" "+dayofweek+"<\/span>";}
                        else{return spantxt+texttodisp+"<\/span>&nbsp;"+spantxt2+N.T24timeStr()+dispflag+" "+dayofweek+"<\/span>";}
                  }
                  else{
                        if (disp_ampm){return spantxt+texttodisp+"<\/span>&nbsp;"+spantxt2+N.UStimeStrNS()+dispflag+" "+dayofweek+"<\/span>";}
                        else{return spantxt+texttodisp+"<\/span>&nbsp;"+spantxt2+N.T24timeStrNS()+dispflag+" "+dayofweek+"<\/span>";}
                  }
            }
            else {
                  if(DispSeconds){
                        if (disp_ampm){if(zonefirst) {return texttodisp+" "+N.UStimeStr()+dispflag+"  "+dayofweek;} else{return N.UStimeStr()+dispflag+" "+texttodisp+"  "+dayofweek;}}
                        else{if(zonefirst){return texttodisp+"  "+N.T24timeStr()+dispflag+" "+dayofweek;} else{return N.T24timeStr()+dispflag+" "+texttodisp+"  "+dayofweek; }}
                  }
                  else{
                        if (disp_ampm){if(zonefirst){return texttodisp+" "+N.UStimeStrNS()+" "+dayofweek;}else{return N.UStimeStrNS()+" "+texttodisp+"  "+dayofweek;}}
                        else{if(zonefirst){return texttodisp+" "+N.T24timeStrNS()+dayofweek;}else{return N.T24timeStrNS()+dayofweek+" "+texttodisp;}}
                  }
            }
      }     
}                   
function RunTZclock(){
      var srvtime=new Date();
      var Q=srvtime.getTime();
      RunTZclockTimer=setTimeout(\'RunTZclock()\', 1000-Q%1000);
      if(typeof z1text!="undefined")
            {var time1=buildTime(srvtime,z1text,z1time,z1dst);
            if(did(\'RC1\'))did(\'RC1\').innerHTML=time1;}
      if(typeof z2text!="undefined")
            {var time2=buildTime(srvtime,z2text,z2time,z2dst);
            if(did(\'RC2\'))did(\'RC2\').innerHTML=time2;}
      if(typeof z3text!="undefined")
            {var time3=buildTime(srvtime,z3text,z3time,z3dst);
            if(did(\'RC3\'))did(\'RC3\').innerHTML=time3;}
      if(typeof z4text!="undefined")
            {var time4=buildTime(srvtime,z4text,z4time,z4dst);
            if(did(\'RC4\'))did(\'RC4\').innerHTML=time4;}
      if(typeof z5text!="undefined")
            {var time5=buildTime(srvtime,z5text,z5time,z5dst);
            if(did(\'RC5\'))did(\'RC5\').innerHTML=time5;}
      if(typeof z6text!="undefined")
            {var time6=buildTime(srvtime,z6text,z6time,z6dst);
            if(did(\'RC6\'))did(\'RC6\').innerHTML=time6;}
      if(typeof z7text!="undefined")
            {var time7=buildTime(srvtime,z7text,z7time,z7dst);
            if(did(\'RC7\'))did(\'RC7\').innerHTML=time7;}
      if(typeof z8text!="undefined")
            {var time8=buildTime(srvtime,z8text,z8time,z8dst);
            if(did(\'RC8\'))did(\'RC8\').innerHTML=time8;}
      if(typeof z9text!="undefined")
            {var time9=buildTime(srvtime,z9text,z9time,z9dst);
            if(did(\'RC9\'))did(\'RC9\').innerHTML=time9;}
      if(typeof z10text!="undefined")
            {var time10=buildTime(srvtime,z10text,z10time,z10dst);
            if(did(\'RC10\'))did(\'RC10\').innerHTML=time10;}}
//]]>			
			</script>
<div id="DASrunClock" style="margin-top:5px;font-weight: '.$fontweight.';padding:8px;">';

if($Zone1<>"" and !$Display){
      $content.='<div id="RC1" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor1.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone2<>"" and !$Display){
      $content.='<div id="RC2" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor2.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone3<>"" and !$Display){
      $content.='<div id="RC3" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor3.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone4<>"" and !$Display){
      $content.='<div id="RC4" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor4.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone5<>"" and !$Display){
      $content.='<div id="RC5" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor5.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone6<>"" and !$Display){
      $content.='<div id="RC6" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor6.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone7<>"" and !$Display){
      $content.='<div id="RC7" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor7.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone8<>"" and !$Display){
      $content.='<div id="RC8" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor8.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone9<>"" and !$Display){
      $content.='<div id="RC9" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor9.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone10<>"" and !$Display){
      $content.='<div id="RC10" style="padding-bottom:' . $cellpad . 'px; padding-top: ' . $cellpad . 'px;'.$borderstr.'background-color: '.$bgcolor10.';color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></div>';}
if($Zone1<>"" and $Display){
      $content.='<span id="RC1" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone2<>"" and $Display){
      $content.='<span id="RC2" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone3<>"" and $Display){
      $content.='<span id="RC3" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone4<>"" and $Display){
      $content.='<span id="RC4" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone5<>"" and $Display){
      $content.='<span id="RC5" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone6<>"" and $Display){
      $content.='<span id="RC6" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone7<>"" and $Display){
      $content.='<span id="RC7" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone8<>"" and $Display){
      $content.='<span id="RC8" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone9<>"" and $Display){
      $content.='<span id="RC9" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
if($Zone10<>"" and $Display){
      $content.='<span id="RC10" style="color:';$content.=$textcol.';font-family:'.$fontfam.';'.'font-size:'.$fontsize.';"></span>';}
$content.='</div>';
if($showdebug){$content.='<div id="tzcdebug" style="background-color:#9900FF;color:#CCCCCC;padding:4px;font-weight: bold;"></div>';}
$content.='<script type="text/javascript">
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != "function") {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}
addLoadEvent(RunTZclock);
</script>';
?>