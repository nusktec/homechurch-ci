function timeago(d){
    var timestamp = Date.parse(d);

    let strTime = ["second", "minute", "hour", "day", "month", "year"];
    var tlength = ["60", "60", "24", "30", "12", "10"];
    var nd = new Date();
    
    var currentTime = nd.getTime();
  
    if (currentTime >= timestamp) {
        var diff = nd - timestamp;
       
        for (var i = 0; diff >= tlength[i] && i < tlength.length - 1; i++) {
            diff = diff / tlength[i];
        }

       diff = Math.round(diff);
       
        return diff + " " + strTime[i] + "(s) ago ";
    }
  }

  function firststr(dstr){
      return dstr.substr(0,1);
  }
 
  function custom_substr(dstr,from,to){
    return dstr.substr(from,to);
}
function dateConv(date){
   return new Date(date).toDateString();
}