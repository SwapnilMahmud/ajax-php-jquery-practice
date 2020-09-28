<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <title>insert-data</title>
    </head>
    <body>

        <div>
           <table>
               <tr>
                 First-Name:<input type="text" id="fname">&nbsp;&nbsp;&nbsp;
                 Last-Name:<input type="text" id="lname">&nbsp;&nbsp;&nbsp;
                 Phone:<input type="text" id="numb">&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submit-btn" value="Submit">

               </tr>
               <tr >
                 <td id="table-data"></td>
               </tr>
           </table>
        </div>


        <script>
      $(document).ready(function(){

                   function loadTable(){

                         $.ajax({

                               url:"loaddata.php",
                               type:"POST",
                               success:function(data){
                                 $("#table-data").html(data);
                               }

                         });
                        }
                         loadTable();

                         $("#submit-btn").on("click",function(e){
                            e.preventDefault();
                            var FirstName=$("#fname").val();
                            var LastName=$("#lname").val();
                            var mob=$("#numb").val();
                           
                            $.ajax({
                              url:"insertload.php",
                              type:"POST",
                              data:{fname:FirstName,lname:LastName,Mob:mob},
                              success:function(data){
                                    if(data==1){
                                           loadTable();

                                   }
                                   else{
                                     alert("record faield");
                                   }

                              }


                            });


                         });



           });
        </script>
    </body>
</html>
