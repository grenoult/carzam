<!DOCTYPE html>
<html lang="en-US" ng-app="carSearch">
  <head>
    <title>Carzam</title>
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h2>Cars Database</h2>
      <div ng-controller="carsController">
        <div class="row">
          <div class="col-md-2">
            Make
            <select ng-model="searchParams.make" ng-change="makeChanged()">
              <option ng-repeat="make in makes" value="{{make.make}}">{{make.make}}</option>
            </select>
          </div>
          <div class="col-md-2">
            Model
            <select ng-model="searchParams.model" ng-change="search()">
              <option ng-repeat="model in models" value="{{model.model}}">{{model.model}}</option>
            </select>
          </div>
          <div class="col-md-2">
            Badge
            <select ng-model="searchParams.badge" ng-change="search()">
              <option ng-repeat="badge in badges" value="{{badge.badge}}">{{badge.badge !== '' ? badge.badge : 'No badge'}}</option>
            </select>
          </div>
          <div class="col-md-2">
            Variant
            <select ng-model="searchParams.variant" ng-change="search()">
              <option ng-repeat="variant in variants" value="{{variant.variant}}">{{variant.variant !== '' ? variant.variant : 'No variant'}}</option>
            </select>
          </div>
          <div class="col-md-2">
            Color
            <select ng-model="searchParams.color" ng-change="search()">
              <option ng-repeat="color in colors" value="{{color.color}}">{{color.color !== '' ? color.color : 'No color'}}</option>
            </select>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Model</th>
              <th>Make</th>
              <th>Badge</th>
              <th>Variant</th>
              <th>Colour</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="car in cars">
              <td>{{ car.id }}</td>
              <td>{{ car.model }}</td>
              <td>{{ car.make }}</td>
              <td>{{ car.badge }}</td>
              <td>{{ car.variant }}</td>
              <td>{{ car.color }}</td>
            </tr>
          </tbody>
        </table>
        <div>
          <a ng-hide="current_page == 1" ng-click="searchParams.page = current_page - 1; search()">Previous</a>
          <a>{{ current_page + '/' + last_page }}</a>
          <a ng-hide="current_page >= last_page" ng-click="searchParams.page = current_page + 1; search()">Next</a>
        </div>
      </div>
    </div>
    <!-- Load JS files -->
    <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('app/app.js') ?>"></script>
    <script src="<?= asset('app/controllers/cars.js') ?>"></script>
  </body>
</html>
