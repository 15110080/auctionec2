
 function XuLyAjax(hours,minutes,seconds)
 {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
         jQuery.ajax({
            url: "/updateDB",
            method: 'post',
            data: {
               gio:hours,
               phut:minutes,
               giay:seconds
            },
            success: function(result){
               jQuery('.alert').show();
               jQuery('.alert').html(result.success);
               if(result.success=="")location.reload(); 
            }});
    
  }
function daugia(id_product,hours,minutes,seconds,dem)
  {
     this.id_product=id_product,this.hours=hours,this.minutes=minutes,this.seconds=seconds,this.dem=dem;

    countdown();
  }

  function countdown()
  {
        var container = document.getElementById("timer");
          if(seconds == 0){
              seconds = 59;
              minutes--;
          }else{
              seconds--;
          }
          if(minutes == -1){
              minutes = 59;
              hours--;
           }
      var zero_h =0, zero_m =0, zero_s =0;
      if(hours > 9) zero_h = "";
      if(minutes > 9) zero_m = "";
      if(seconds > 9) zero_s = "";      
      container.innerHTML = ""+zero_h+hours+":"+zero_m+minutes+":"+zero_s+seconds;
      if(!(hours == 0 && minutes == 0 && seconds == 0))
       {
        XuLyAjax(hours,minutes,seconds);
        setTimeout(countdown,1000);
       }
      else
       {
                XuLyAjax(hours,minutes,seconds);
                if(dem == "")
                {
                  window.location.href = "/daugia/"+id_product
                }
       }
 }


