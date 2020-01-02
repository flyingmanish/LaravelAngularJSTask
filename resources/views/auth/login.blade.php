@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form ng-submit="logIn()" >
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" ng-model="user.email" name="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input type="password" ng-model="user.password" name="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input type="submit" name="" value="Login">
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var app = angular.module('App', []);

    app.controller("AppController", function ($scope, $http) {

        $scope.logIn = function () {

            $http.post('/loginVerify', { user:$scope.user })
            .then(function(response) {
                console.log(response)
                html_code = response.data.html
                document.open();
                document.write(html_code);
                document.close();
             })
        };

    });
</script> 

@endsection
