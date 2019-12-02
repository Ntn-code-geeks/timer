var startstop   = document.getElementById("startstop"),
    seconds = 0,
    minutes = 0,
    hours = 0,
    timer;

function buildTimer() {
  seconds++
  if (seconds >= 60) {
    seconds = 0;
    minutes++;
    if (minutes >= 60) {
      minutes = 0;
      hours++;
    }
  }
  
  second.textContent = (seconds < 10 ? "0" + seconds.toString(): seconds);
  minute.textContent = (minutes < 10 ? "0" + minutes.toString(): minutes);
  hour.textContent = (hours < 10 ? "0" + hours.toString(): hours);
}

function startTimer() {
  clearTimeout(timer);
  timer = setInterval(buildTimer, 1000);
  return false;
}
function stopTimer() {
  clearTimeout(timer);
  return false;
}


window.onload = function(){    
    startTimer();  
    
    
}

  
function lastTime(){
  var sec = $('#second').text();
  var min = $('#minute').text();
  var hrs = $('#hour').text();
  var ip_add=$('#user_ip_add').val();
  var sys_info=$('#sys_info').val();
  var last = hrs +':'+ min +':'+ sec + '_' + ip_add + '_'+ sys_info;
  var enc = btoa(last);
    return btoa(enc);
}

// window.setTimeout(function(){ 
//   // console.log(lastTime());
//    }, 1000);


var w  = 720;
var h = 600;
var left = (window.screen.width / 2) - ((w / 2) + 10);
var top = (window.screen.height / 2) - ((h / 2) + 50);

window.addEventListener('unload', () => {  
  open('lasttime.php?id='+lastTime(), '','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
})


