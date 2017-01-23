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
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

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
        <div class="container-fluid" ng-app="myApp" ng-controller="myCtrl">
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
                                        <input type="text" class="form-control" ng-model="data.name"  placeholder="eg: Sachin Sharma" ng-disabled="preview">
                                    </div>
                                 </div>

                                 
                                 <div class="col-md-6"> 
                                Mobile
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control" ng-model="data.mobile"  placeholder="+91" ng-disabled="preview">
                                    </div>
                                 </div>

                                 <div class="col-md-6"> 
                                Email
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" ng-model="data.email"  placeholder="Email" ng-disabled="preview">
                                    </div>
                                 </div>

                                 <div class="col-md-6"> 
                                Upload ID Card
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="file" class="form-control" ng-model="data.id_url"  placeholder="jpeg or png" ng-disabled="preview"> 
                                    </div>
                                 </div>


                                  <div class="col-md-6"> 
                                Registration Type
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" ng-model="data.reg_type" ng-disabled="preview">
                                            <option value="self"> Self </option>
                                            <option value="group"> Group</option>
                                            <option value="corporate"> Corporate </option>
                                            <option value="others"> Others </option>
                                        </select>
                                    </div>
                                 </div>

                                  <div class="col-md-6"> 
                                Number of Tickets
                                </div>   
                             
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" class="form-control"  placeholder="No" ng-model="data.no_tickets" ng-disabled="preview">
                                    </div>
                                 </div>


                                 <div class="col-md-4 col-md-offset-8">

                                    <button type="button" class="btn btn-default admin" ng-click="showData()">Preview</button>
                                    <button type="button" class="btn btn-default admin" ng-disabled="!preview" ng-click="submit_form()" data-toggle="modal" data-target="#myModal">Submit</button> 


                                 </div>



                            </div>
                        </div>


                                



                        </div>

                </div> 

            </div>



                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registration Completed</h4>
                      </div>
                      <div class="modal-body">
                        <p>Your Registration id is [[reg_id]] </p>
                      </div>
                      <div class="modal-footer">
                       
                      </div>
                    </div>

                  </div>
            </div>


        </div>


        




        <script>
                            var app = angular.module('myApp', []);

                            app.config(function($interpolateProvider){


        $interpolateProvider.startSymbol('[[').endSymbol(']]');

    });
                app.controller('myCtrl', function($scope,$http) {

                    $scope.preview = false;
                    
                    $scope.data = {name:"",mobile:"",email:"",id_url:"",reg_type:"",no_tickets:"",reg_date:""};

                    $scope.reg_id = "";

                    

                    $scope.showData = function(){


                        $scope.preview = true;

                    }

                    $scope.submit_form = function(){

                        console.log(JSON.stringify($scope.data));

                        $scope.data.reg_date = new Date();


                        var data = $scope.data;


                        $http({method:"post",url:"submit-form",data:{registration:data}}).success(function(data){

                                console.log(data);

                                $scope.preview = false;

                                $scope.reg_id = data;
                    
                                $scope.data = {name:"",mobile:"",email:"",id_url:"",reg_type:"",no_tickets:"",reg_date:""};

                        });
                    }

        





                });

                

        </script>
    </body>
</html>
