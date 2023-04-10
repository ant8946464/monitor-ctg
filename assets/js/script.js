
var ideliminar='';
var pathDelete='';

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
    var path='/tableusuario';
    var classConten=".content";
    console.log(element);
    if('userSelect' == element){
      request ='user_corporate';
    }else if('activitySelect' == element){
      request ='activity';
    }else if('serverSelect' == element){
      request ='name';
    }else if('managerSelect' == element){
      request ='manager_name';
      path='/tableDeleteRespon';
    }else if('areaSelect' == element){
      request ='area';
      path='/tableDeleteArea';
    }else if('jobSelect' == element){
      request ='role';
      path='/tableDeleteJob';
    }else if('idSelect' == element){
      request ='id_user';
      path='/detailUser';
    }else if('userSelectlist' == element){
      request ='user_corporate';
      path='/detailUser';
    }else if('emailSelect' == element){
      request ='email';
      path='/detailUser';
    }else if('nameServerSelect' == element || 'ipSelect' == element || 'clusterSelect' == element || 'portSelect' == element ){
        path='/deleteServerBy';
        request='id_ctg';
        if('nameServerSelect' == element){
          request ='name';
        }else if('ipSelect' == element){
          request ='ip';
        }else if('clusterSelect' == element){
          request ='cluster';
        }else if('portSelect' == element){
          request ='puerto';
        }      
   }else if('updateServerSelect' == element){
      request ='ip';
      path='/loadServer';
      classConten=".contenedor-inputs";
    }



    
    console.log(request);
    console.log(path);
    var first_select = document.getElementById(element).value;
    console.log(first_select);
    $(document).ready(function(){
          $.ajax({
              url: path,
              type:"POST",
              data: request+'=' + first_select,
              beforeSend:function(){
                $(classConten).html("<span>Consultando...</span>");
              },
              success:function(data){
                  $(classConten).html(data);
              }
          });
  });
  return;
}


function asigID(id , path) {
  console.log(id);
  ideliminar = id;
  pathDelete= path;
}



function deleteTableId() {
  console.log(ideliminar);
  console.log(pathDelete);
    $(document).ready(function(){
      $.ajax({
          url:'/'+pathDelete,
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


 







