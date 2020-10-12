<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>insert-data</title>
    <style>

       #modal{
         background:rgba(0,0,0,0.7);
         position: fixed;
         left:0;
         top:0;
         z-index:100;
         width:100%;
         height:100%;
         display:none
       }
       #modal-form{
         background: #fff;
         width:30%;
         position:relative;
         top:20%;
         left:calc(40%);
         padding:15px;
         border-radius:4px;
       }
       #modal-form h2{
             margin:0 0 15px;
             padding-bottom:10px;
             border-bottom:1px solid #000;


       }
       #close-btn{
         background:tomato;
         color:white;
         width:30px;
         height:30px;
         line-height:30px;
         text-align:center;
         border-radius:50%;
         position:absolute;
         top:-15px;
         right:-15px;
         cursor:pointer;
       }
       #delete-btn{
         color:white;
         background-color:tomato;
       }
    </style>
  </head>
  <body>

<div> <button id="delete-btn" >Delete</button></div>


      <div>
        <table>




                      <tr>
                          <td>
                              <div  id="search-bar">
                                 <label>Search</label>
                                 <input type="text" id="search" autocomplete="off">
                              </div>
                          </td>
                      </tr>


            <tr>
                 <td >
                     <form id="add-form">
                         Id:<input type="text" id="id">&nbsp;&nbsp;
                         Name:<input type="text" id="name">&nbsp;&nbsp;
                         Address:<input type="text" id="address">&nbsp;&nbsp;
                         <input type="submit" id="save-button" value="save">
                   </form>
                 </td>


            </tr>






            <tr>
                 <td id="table-data"></td>
            </tr>
        </table>
      </div>

   <div id="modal">
       <div id="modal-form">
           <h2>Edit Form</h2>
           <table cellpadding="0" width="100%">


           </table>
           <div id="close-btn">x</div>
       </div>

      </div>






<script>
$(document).ready(function(){

   function loadTable(){
     $.ajax({
               url:"ajaxfile.php",
               type:"POST",
               success:function(data){
               $("#table-data").html(data);

               }
     });
   }
   loadTable();







   $("#save-button").on("click",function(e){
     e.preventDefault();
     var Idd=$("#id").val();
     var Namee=$("#name").val();
     var Addresss=$("#address").val();

     $.ajax({
       url:"ajaxinsert.php",
       type:"POST",
       data:{Id:Idd, Name:Namee, Address:Addresss},
       success:function(data){
         if(data==1){
                 loadTable();
                 $("#add-form").trigger("reset");
         }
         else{
           alert("cant");
         }

       }
     });

   });





   $(document).on("click",".delete-btn",function(){
   var sid= $(this).data("id");
   var e=this;
   $.ajax({
   url:"ajax-delete.php",
   type:"POST",
   data:{id:sid},
   success:function(data){
   if(data == 1){
    $(e).closest("tr").fadeOut();
   }
   else{
    alert("data cant delete");
   }
   }

   });

   });

   //show modal box
   $(document).on("click",".edit-btn",function(){
     $("#modal").show();
     var eid=$(this).data("id");
     $.ajax({

       url:"ajax-update.php",
       type:"POST",
       data:{id:eid},
       success:function(data){
         $("#modal-form table").html(data);
       }
     });


     });

   //hide modal box

   $("#close-btn").on("click",function(){
   $("#modal").hide();
   });





   $(document).on("click","#edit-submit",function(){
   var stid = $("#edit-id").val();
   var name = $("#edit-name").val();
   var address =$("#edit-address").val();
   $.ajax({
    url:"ajax-update-form.php",
    type:"POST",
    data:{id:stid, name:name,address:address },
    success:function(data){
      if(data==1){
        $("#modal").hide();
        loadTable();
      }
      else{
        alert("problem detect! cant updated!");
      }

    }
   });
   });

  $("#search").on("keyup",function(){

      var srch_trm=$(this).val();
      $.ajax({
        url:"ajax-search.php",
        type:"POST",
        data:{ssearch:srch_trm},
        success:function(data){
          $("#table-data").html(data);
        }
      });


  });

 $("#delete-btn").on("click",function(){
   var id = [];
   $(":checkbox:checked").each(function(key){
     id[key]=$(this).val();

   });

   
   if(id.length === 0){
     alert("please select at least one checkbox!!!");

   }
   else{

     if(confirm("do you want to really delete these records?")){
       $.ajax({

         url:"delete-data-php.php",
         type:"POST",
         data:{id: id},
         success:function(data){
     //console.log(id);
     if(data==1){
            loadTable();
            alert("success");
     }
     else{

     }
         }
       });
     }
   }
 });
});


  </script>
  </body>
</html>
