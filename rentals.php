<html>
    <head>
        <title>  
            Rentals Report 
        </title>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-route.min.js"></script>    

    </head>
    <body ng-app="mayapp">
        <div ng-app="myapp" ng-controller="empcontroller">
            <form>
                Employe No. <input type="text" ng-model="emp_no" /><br/>
                First Name. <input type="text" ng-model="first_name" /><br/>
                Last Name.  <input type="text" ng-model="last_name" /><br/>
                Department. <input type="text" ng-model="dept_name" /><br/>

                <button ng-click="postData()">Submit</button><br>
            </form> 
             <input type="text" ng-model="searchFilter" class="form-control">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Emp No </th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="data in data | filter:searchFilter">
                        <td>{{data.emp_no}}</td>
                        <td>{{data.first_name}}</td>
                        <td>{{data.last_name}}</td>
                        <td>{{data.dept_name}}</td>
                    </tr>
                </tbody>
            </table>
          </div>

        </div>
    </body>
    <script type="text/javascript">
        var app = angular.module('mayapp', [])
        app.controller('empcontroller', function ($scope, $http) {
            $scope.postData = function () {
                $http.post("insert.php", {
                    'emp_no': $scope.emp_no,
                    'first_name': $scope.first_name,
                    'last_name': $scope.last_name,
                    'dept_name': $scope.dept_name})

                        .success(function (data, status, headers, config) {
                            console.log("Data Inserted Successfully");
                        });
            }
            $http.get("fetch.php")
                    .success(function (data) {
                        $scope.data = data;
                    })
                    .error(function () {
                        $scope.data = "error in fetching data";
                    });
        });


    </script>
</html>
