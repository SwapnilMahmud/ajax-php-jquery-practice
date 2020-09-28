<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>insert-data</title>
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




});
  </script>
  </body>
</html>
