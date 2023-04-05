
var ideliminar='';

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

$(document).ready(function() {
  setTimeout(function() {
      $(".error").fadeOut(1500);
  },1000);
});


function selectView(element) {
    var request ;
    var path='/tableusuario';
    if('userSelect' == element){
      request ='user_corporate';
    }else if('activitySelect' == element){
      request ='activity';
    }else if('serverSelect' == element){
      request ='name';
    }else if('managerSelect' == element){
      request ='manager_name';
      path='/tableDeleteRespon';
    }
    var first_select = document.getElementById(element).value;
    $(document).ready(function(){
          $.ajax({
              url: path,
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


function asigID(id) {
  console.log(id);
  ideliminar = id;
}



function deleteTableId() {
  console.log(ideliminar);
    $(document).ready(function(){
      $.ajax({
          url:'/deleteResponse',
          type:"POST",
          data:'request=' + ideliminar,
          beforeSend:function(){
          $(".content").html("<span>Eliminando registro</span>");
          },
          success:function(data){
            $(".content").html(data);
          }
      });
  });
  return;

}


 







