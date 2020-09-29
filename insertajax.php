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
    </style>
  </head>
  <body>




      <div>
        <table>
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
               <tr>
                   <td>Name:</td>
                   <td><input type="text" id="edit-name"></td>

               </tr>

               <tr>
                   <td>Address</td>
                   <td><input type="text" id="edit-address"></td>

               </tr>

               <tr>

                   <td><input type="submit" id="edit-submit" value="save"></td>

               </tr>

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


     });

//hide modal box

$("#close-btn").on("click",function(){
  $("#modal").hide();
});



});


  </script>
  </body>
</html>
