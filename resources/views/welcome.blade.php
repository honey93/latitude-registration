<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .heading{
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .admin{
                color: black;
            }
            .form-parent{
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                border: 1px solid black;
                height: 100%;
                
                background-color: white;
                padding: 20px;
            }

            .form-background{
                background-color: #EEEEEE;
                padding-top: 30px;
                padding-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row heading">
                <div class="col-md-2"> <div> <img src="logo.png" width="100%"> </div>  </div>
                <div class="col-md-2 col-md-offset-8"> <button type="button" class="btn btn-default admin">Admin Login</button> </div>
            </div>

            <div class="row form-background">
                <div class="col-md-12">
                    <div class="form-parent">
                        <h1 class="text-center"> Event Registration </h1>

                        <div class="row">
                            <div class="">
                                <div class="col-md-6"> 
                                Full Name
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="eg: Sachin Sharma">
                                    </div>
                                 </div>

                                 
                                 <div class="col-md-6"> 
                                Mobile
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control"  placeholder="+91">
                                    </div>
                                 </div>

                                 <div class="col-md-6"> 
                                Email
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email">
                                    </div>
                                 </div>

                                 <div class="col-md-6"> 
                                Upload ID Card
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="file" class="form-control"  placeholder="jpeg or png">
                                    </div>
                                 </div>


                                  <div class="col-md-6"> 
                                Registration Type
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option> Self </option>
                                            <option> Group</option>
                                            <option> Corporate </option>
                                            <option> Others </option>
                                        </select>
                                    </div>
                                 </div>

                                  <div class="col-md-6"> 
                                Number of Tickets
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control"  placeholder="No">
                                    </div>
                                 </div>


                                 <div class="col-md-4 col-md-offset-8">

                                    <button type="button" class="btn btn-default admin">Preview</button>
                                    <button type="button" class="btn btn-default admin">Submit</button> 


                                 </div>



                            </div>
                        </div>


                                



                        </div>

                </div> 

            </div>
        </div>
    </body>
</html>
