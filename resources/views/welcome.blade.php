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
         <script src="js/aws-sdk-js/dist/aws-sdk.min.js"></script>
         <script src="node_modules/satellizer/dist/satellizer.js"></script>


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
                <div class="col-md-2 col-md-offset-8"> <button type="button" data-toggle="modal" data-target="#admin" class="btn btn-default admin" ng-show="!adminFlag">Admin Login</button>

                <span ng-if="authenticated">Welcome, {{currentUser.name}}</span>
                  <button type="button" class="btn btn-default admin" ng-show="adminFlag" ng-click="adminOut()">Logout</button></div>
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
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="admin_submission()">Submit</button>
                  </div>
                </div>

              </div>
            </div>


        </div>


        




        <script>
                            var app = angular.module('myApp', ['ui.router','satellizer',]);

                            

                           app.directive('file', function() {
                              return {
                                restrict: 'AE',
                               
                                link: function($scope, el, attrs){
                                  el.bind('change', function(event){
                                    var files = event.target.files;
                                    var file = files[0];
                                    $scope.file = file;
                                    $scope.$parent.file = file;
                                    $scope.$apply();
                                  });
                                }
                              };
                            });




                    app.config(function($interpolateProvider,$stateProvider,$urlRouterProvider, $authProvider){

                       
                       // $authProvider.loginUrl = '/latitude/public/api/authenticate';
                        $authProvider.loginUrl = '/api/authenticate';

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


                app.controller('myCtrl', function($scope,$http,$state,myService,$auth,$rootScope) {


                    $scope.loading = false;



                                        $scope.creds = {
                      bucket: 'thakuria',
                      access_key: 'AKIAJYPR4T7IVPWLAVRQ',
                      secret_key: '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'
                    }
                     
                    $scope.upload = function() {
                      // Configure The S3 Object 
                      
                    }

                    $scope.adminFlag = false;

                    $scope.preview = false;
                    
                    $scope.data = {name:"",mobile:"",email:"",id_url:"",reg_type:"",no_tickets:"",reg_date:""};

                    $scope.reg_id = "";

                    $scope.admin = {name:"",password:""};

                    

                    $scope.showData = function(){

                        $scope.loading = true;


                        $scope.preview = true;



                        AWS.config.update({ accessKeyId: $scope.creds.access_key, secretAccessKey: $scope.creds.secret_key });
                      AWS.config.region = 'us-east-1';
                      var bucket = new AWS.S3({ params: { Bucket: $scope.creds.bucket } });
                     
                      if($scope.file) {
                        var params = { Key: $scope.file.name, ContentType: $scope.file.type, Body: $scope.file, ServerSideEncryption: 'AES256' };
                     
                        bucket.putObject(params, function(err, data) {
                          if(err) {
                            // There Was An Error With Your S3 Config
                            alert(err.message);
                            return false;
                          }
                          else {
                            // Success!
                            //alert('Upload Done');
                            $scope.loading = false;
                        $scope.data.id_url = 'https://s3-us-west-2.amazonaws.com/thakuria/' + $scope.file.name;
                            $scope.$digest();
                          }
                        })
                        .on('httpUploadProgress',function(progress) {
                              // Log Progress Information
                              console.log(Math.round(progress.loaded / progress.total * 100) + '% done');
                            });
                      }
                      else {
                        // No File Selected
                        alert('No File Selected');
                      }



                    }

                    $scope.editData = function(){

                        $scope.preview = false;



                    }

                    $scope.submit_form = function(){

                       // alert($scope.file.name);

                        


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

                        

                            console.log($scope.admin);


                            var credentials = {
                                name: $scope.admin.name,
                                password: $scope.admin.password
                            }
                            
                            // Use Satellizer's $auth service to login
                            $auth.login(credentials).then(function(data) {

                              //  console.log(JSON.stringify(data.token));
                                console.log(JSON.stringify(data));
                              //  alert(data.token);
                                return $http.get('api/authenticate/user');

                                // If login is successful, redirect to the users state
                                //$state.go('users', {});
                                $scope.adminFlag = true;
                            
                               
                            }).then(function(response) {

                // Stringify the returned data to prepare it
                // to go into local storage
                var user = JSON.stringify(response.data.user);

                // Set the stringified user data into local storage
                localStorage.setItem('user', user);

                // The user's authenticated state gets flipped to
                // true so we can now show parts of the UI that rely
                // on the user being logged in
                $rootScope.authenticated = true;

                // Putting the user's data on $rootScope allows
                // us to access it anywhere across the app
                $rootScope.currentUser = response.data.user;

                // Everything worked out so we can now redirect to
                // the users state to view the data
                //$state.go('users');

                 $state.go('analytics');
                 $scope.get_analytics_data();
            });


                            // $scope.adminFlag = true;
                            
                            // $state.go('analytics');
                            // $scope.get_analytics_data();
                        

                        

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
