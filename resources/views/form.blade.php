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
                <h2>Form</h2>
                <form id="my-form">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    
                        <button type="submit" name="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                </form>
                <br></br>
                <span class="text-success" id="success"></span>
                <span class="text-danger" id="error"></span>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#my-form").submit(function(event){
                event.preventDefault();

                var form=$("#my-form")[0];
                var data= new FormData(form);

                $("#submit-btn").prop("disabled",true);

                $.ajax({
                    type:"POST",
                    url:"{{ route('addUser')}}",
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        //console.log(data);
                        //alert(data.result);
                        //inable the button
                        $("#submit-btn").prop("disabled",false);
                        //reset all form fields null
                        $("input[type='text']").val('');
                        $("input[type='email']").val('');
                        $("input[type='password']").val('');
                        $("#error").text('');
                        $("#success").text(data);
                        

                    },
                    error:function(e){
                        // console.log(e.responseText);
                        $("#submit-btn").prop("disabled",false);
                        $("#success").text('');
                        $("#error").text(e.responseText);
                    }
                });

            });
        });
    </script>
        
</body>
</html>