/*adjust style parameters for screen size*/

var pagewidth = 760;
if (screen.availWidth > 820)
{
   pagewidth = 940;
   document.writeln('<link rel="stylesheet" href="templates/' + thistemplate + '/css/medres.css" type="text/css" />');
}
var maincolwidth = pagewidth - colwidth;
document.writeln('<style type="text/css">');
document.writeln('#maincolumn{ width: ' + maincolwidth + 'px;}');
document.writeln('</style>');
