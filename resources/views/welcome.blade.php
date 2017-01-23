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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.1/angular-ui-router.min.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

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
                <div class="col-md-2 col-md-offset-8"> <button type="button" data-toggle="modal" data-target="#admin" class="btn btn-default admin" ng-show="!adminFlag">Admin Login</button>  <button type="button" class="btn btn-default admin" ng-show="adminFlag" ng-click="adminOut()">Logout</button></div>
            </div>

            <div ui-view>  </div>

            



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


            <div id="admin" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Enter your Admin Credentials</h4>
                  </div>
                  <div class="modal-body">
                    
                    <div class="form-group">
                      <label for="usr">Name:</label>
                      <input type="text" class="form-control" id="usr" ng-model="admin.name">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="pwd" ng-model="admin.password">
                    </div>
                  </div>
                  <p> Note: Password is : latitude </p>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="admin_submission()">Submit</button>
                  </div>
                </div>

              </div>
            </div>


        </div>


        




        <script>
                            var app = angular.module('myApp', ['ui.router']);

                    app.config(function($interpolateProvider,$stateProvider,$urlRouterProvider){


                        $interpolateProvider.startSymbol('[[').endSymbol(']]');

                    
                        $urlRouterProvider.otherwise('/home');

                        $stateProvider

                        .state('home',{

                          url: '/home',
                          templateUrl: 'registration.html'

                        })

                        .state('analytics',{
                          url: '/analytics-admin',
                          templateUrl: 'analytics.html'
                          
                        })


                    });



                app.service('myService',function(){

                    this.adminflag = false;

                });    


                app.controller('myCtrl', function($scope,$http,$state,myService) {

                    $scope.adminFlag = false;

                    $scope.preview = false;
                    
                    $scope.data = {name:"",mobile:"",email:"",id_url:"",reg_type:"",no_tickets:"",reg_date:""};

                    $scope.reg_id = "";

                    $scope.admin = {name:"",password:""};

                    

                    $scope.showData = function(){


                        $scope.preview = true;

                    }

                    $scope.editData = function(){

                        $scope.preview = false;
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

                    $scope.admin_submission = function(){

                        if($scope.admin.password == "latitude"){

                            console.log($scope.admin);


                            $scope.adminFlag = true;
                            
                            $state.go('analytics');
                            $scope.get_analytics_data();
                        }

                        else{

                            alert("Invalid Credentials")
                        }

                    }

                    $scope.adminOut = function(){

                        $scope.adminFlag = false;

                        $state.go('home');


                    }

                    $scope.get_analytics_data = function(){

                        $scope.submission_data = [];

                        //alert("data received");

                        $http.get("data-analytics").success(function(results){

                            $scope.submission_data = results;

                            console.log($scope.submission_data);

                          
                      });
                    }

        





                });

                

        </script>
    </body>
</html>
