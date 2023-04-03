

$(document).ready(function() {
setTimeout(function() {
    $(".info").fadeOut(1500);
},1000);
});

$(document).ready(function() {
    setTimeout(function() {
        $(".error").fadeOut(1500);
    },1000);
});


function selectView(element) {
    var request ; 
    if('userSelect' == element){
      request ='user_corporate';
    }else if('activitySelect' == element){
      request ='activity';
    }else if('serverSelect' == element){
      request ='name';
    }
    var first_select = document.getElementById(element).value;
    $(document).ready(function(){
          var valuee = $(this).val();
          console.log(valuee);
          $.ajax({
              url: "/tableusuario",
              type:"POST",
              data: request+'=' + first_select,
              beforeSend:function(){
                $(".content").html("<span>Consultando...</span>");
              },
              success:function(data){
                  $(".content").html(data);
              }
          });
  });
  return;
}






