
var ideliminar='';
var pathDelete='';




$(document).ready(function() {
setTimeout(function() {
    $(".info").fadeOut(3000);
},2000);
});

$(document).ready(function() {
    setTimeout(function() {
        $(".error").fadeOut(1500);
    },2000);
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

function selectMonitor(id) {
    console.log(id);
    var first_select = document.getElementById(id).value;
    console.log(first_select);
    //window.location.href = "monitoreo";
    //document.getElementById('chartContainer').style.display = 'none';


   $.ajax({
      url: '/monitoreoGrafico',
      type:"POST",
      async: true,
      data: 'selector=' + first_select,
      beforeSend:function(){
        //console.log('esperando...');
       // $("#chart").html("<span>BUSCANDO</span>");
      
      },
      success:function(data){
        console.log(data);
        //document.getElementById('chart').style.display = 'block';
        // document.getElementById('chartContainer').style.display = 'none';
        $("#chart").html(data);
        
      }
  });
  return;
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

function changestatusServer(server , actividad) {
  var  idTable ="#tableReset";
  console.log(server);
  console.log(actividad);
  if(actividad != 0){
    idTable ="#tableActivity";
  }
    $(document).ready(function(){
      $.ajax({
          url:'/activityServer',
          type:"POST",
          data: { nameServer: server, status : actividad } ,
            success:function(data){
              $(idTable).html(data);
            }
      });
  });
  
  return;

}

function changePagination(page , url ,classhtml ,colum,value) {
  console.log(page);
  console.log(url); 
  console.log(classhtml); 
  console.log(colum); 
  console.log(value); 
    $(document).ready(function(){
      $.ajax({
          url:'/'+url,
          type:"POST",
          data:{ paginator: page, colum : colum, value:value } ,
            success:function(data){
              $("."+classhtml).html(data);
            }
      });
  });
 
  return;

}


function dataReport(dataQuery) {
  console.log(dataQuery);
    $(document).ready(function(){
      $.ajax({
          url:'/reporte',
          type:"POST",
          data: dataQuery ,
            success:function(data){
               console.log("OK");
            }
      });
  });
  
  return;

}




 







