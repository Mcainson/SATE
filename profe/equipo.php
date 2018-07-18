<!DOCTYPE html>  
 <html>  
      <head>  
           <title>L</title>  
            
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

           <style>  
           ul{  
                float: left;
                list-style: none;
                padding: 0px;
                border: 1px solid black;
                margin-top:0px;  
           }  
           input, ul{  
                width:250px;  
           }  
           li:hover{
               color: silver;
               background: #0088cc;
           }
           </style>  
      </head>  
      <body>  
           <br /><br />  
           <div class="input_fields_wrap" style="width:500px;"> 
           <button class="add_field_button">Add More Fields</button> 
                 
                <input type="text" name="country" value="" id="country" class="form-control" placeholder="Escribir nombre del alumno" />  
                <div id="response"></div>  
           </div>  
      </body>  
 </html>  
 <script>  

 //search autocomplete
 $(document).ready(function(){  

      $('#country').keyup(function(){  
           var query = $(this).val();  
           alert(query);
           
          

           if(query.length>0){  
                $.ajax(
                    {  
                     url:"search.php",  
                     method:"POST",  
                     data:{
                         search: 1,
                         q:query
                    },  
                     success:function(data){  
                         
                          $('#response').html(data);  
                     },
                     dataType: 'text'  
                    
                });  
           }  
           
      });  
      $(document).on('click', 'li', function(){  
          var country = $(this).text();  
          $('#country').val(country);  
           $('#response').html("");  
      }); 


      //Add/Remove Input Fields

    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
   

    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        alert($('#country').text());
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" id="ff" name="mytext[]" value="" /><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

     
    
    
 });  

 
 
 </script>  