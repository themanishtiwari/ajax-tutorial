<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>User Details</h2>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profile</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                       
                    </tbody>
                  </table>
                <br>
                <span class="text-success" id="success"></span>
                <span class="text-danger" id="error"></span>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // $("#show").submit(function(event){
            //     event.preventDefault();

            //     var form=$("#my-form")[0];
            //     var data= new FormData(form);

            //     $("#submit-btn").prop("disabled",true);

                $.ajax({
                    type:"GET",
                    url:"{{ route('getUser')}}",
                    processData:false,
                    contentType:false,
                    success:function(data){
                        //console.log(data);
                        if(data.length > 0){
                            for(i=0;i<data.length;i++){
                                img=data[i].img
                                $("#table-data").append(`<tr>
                                    <td>`+(i+1)+`</td>
                                    <td>`+data[i].name+`</td>
                                    <td>`+data[i].mobile+`</td>
                                    <td>`+data[i].email+`</td>
                                    <td><img style="height: 50px;" src="{{ asset('`+img+`')}}"></td>

                                </tr>`);
                            }
                            
                        }
                        else{
                            $("#table-data").append("<tr><td colspan='4'>No Any Records</td></tr>");
                        }
                    },
                    error:function(e){
                        // console.log(e.responseText);
                        $("#error").text(e.responseText);
                    }
                });

            });
    </script>
        
</body>
</html>