function ulticountdown(time, id, format, keepCounting){

     timeleft = time;
     var countUp = false;
     if (timeleft < 0) {
       if (keepCounting == 0) {
         timeleft = 0; 
       } else {
         timeleft *= -1;        
         countUp = true;
       }
     }
     seconds = timeleft%60;
     timeleft -= seconds;
     timeleft = timeleft/60;
     minutes = timeleft%60;
     timeleft -= minutes;
     timeleft = timeleft/60;
     hours = timeleft%24;
     timeleft -= hours;
     days = timeleft/24;
     var counterstring = '';
     if (format == 1) {     
       
       if (days != 0) {
         counterstring = days+" day";
         if (days != 1) {
           counterstring = counterstring+"s";
         }
       }
       if (hours != 0) {
         counterstring = counterstring+" "+hours+" hour";
         if (hours != 1) {
           counterstring = counterstring+"s";
         }
       }
       if (minutes != 0) {
         counterstring = counterstring+" "+minutes+" minute";
         if (minutes != 1) {
           counterstring = counterstring+"s";
         }
       }
       counterstring = counterstring+" "+seconds+" second";
       if (seconds != 1) {
         counterstring = counterstring+"s";
       }
    }  else if (format == 2) { 
      if (days != 0) {
         counterstring = days+" day";
         if (days != 1)
           counterstring += "s";
       }
       if (hours != 0) {
         counterstring += " "+hours+" hour";
         if (hours != 1)
           counterstring += "s";
       }
       counterstring += " "+minutes+" minute";
       if (minutes != 1)
         counterstring += "s";
    } else if (format == 3) {     
       if (days != 0) {
         counterstring = days+" day";
         if (days != 1)
           counterstring += "s";
       }
       counterstring += " "+hours+" hour";
       if (hours != 1)
         counterstring += "s";
    } else if (format == 4) {     
       counterstring = days+" day";
       if (days != 1)
         counterstring += "s";
    } else if (format == 5) {     
       if (days != 0) {
         counterstring = days+" day";
         if (days != 1)
           counterstring += "s";
       }
       counterstring += " "+hours+":"+minutes+":"+seconds;
    } else if (format == 6) {     
       counterstring = days;
    }else {     
    // we should never get here, but for safety add the last one as default case.
     var counterstring = days+" day";
       if (days != 1)
         counterstring += "s";
       counterstring += " "+hours+":"+minutes+":"+seconds;
    } 

var newdiv = document.createElement("div");
newdiv.innerHTML = counterstring;
var olddiv = document.getElementById("counter"+id);
var parent = olddiv.parentNode;
parent.removeChild(olddiv);
newdiv.id = "counter"+id;
parent.appendChild(newdiv);


if (countUp == true) {
  newtime = time+1;
} else {
  newtime = time-1;
}
setTimeout("ulticountdown("+newtime+","+id+","+format+")",1000);
}
