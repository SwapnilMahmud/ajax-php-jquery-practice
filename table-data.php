<html>
 <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>table data</title>
 </head>
 <body>

    <div>
       <table>
           <tr>
              <td>
                  <input type="button" id="load-button" value="Load data">
              </td>
            </tr>
            <tr>
               <td id="table-data">

               </td>
            </tr>
       </table>
    </div>


<script>

   $(document).ready(function(){
      $("#load-button").on("click",function(e){

          $.ajax({

            url:"ajaxfile.php",
            type:"POST",
            success:function(data){
              $("#table-data").html(data);
            }
           });


       });
});
</script>


 </body>
<html>
