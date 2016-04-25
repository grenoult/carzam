app.controller('carsController', function($scope, $http, API_URL) {
  // Init dropdowns
  $scope.models = [{model: 'Select a make first'}];
  $scope.searchParams = {};

  // Get makes dropdowns
  $http.get(API_URL + "cars/list/makes")
    .success(function(response) {
      $scope.makes = response;
      $scope.makes.unshift({make: 'Select...'});
  });
  // Get badges dropdowns
  $http.get(API_URL + "cars/list/badges")
    .success(function(response) {
      $scope.badges = response;
      $scope.badges.unshift({badge: 'Select...'});
  });
  // Get variants dropdowns
  $http.get(API_URL + "cars/list/variants")
    .success(function(response) {
      $scope.variants = response;
      $scope.variants.unshift({variant: 'Select...'});
  });
  // Get colours dropdowns
  $http.get(API_URL + "cars/list/colours")
    .success(function(response) {
      $scope.colors = response;
      $scope.colors.unshift({color: 'Select...'});
  });

  // Triggers when user selects a make. List of models gets changed
  $scope.makeChanged = function() {
    // Get Models
    // Get badges dropdowns
    $http.get(API_URL + "cars/list/models/" + $scope.searchParams.make)
      .success(function(response) {
        // Store models
        $scope.models = response;

        // Delete previous model seached
        delete $scope.searchParams.model;

        // Perform a search
        $scope.search();
    });
  };

  // perform search
  $scope.search = function(modalstate, id) {
    // Make GET search parameters
    for (var i in $scope.searchParams) {
      if ($scope.searchParams[i] == "Select...") {
        delete $scope.searchParams[i];
      }
    }

    //retrieve cars listing from API
    $http.get(API_URL + "cars/search?"+$.param($scope.searchParams))
      .success(function(response) {
        $scope.cars = response.data;
        $scope.current_page = response.current_page;
        $scope.last_page = response.last_page;
        $scope.total = response.total;
        $scope.per_page = response.per_page;
    });
  };

  // Perform a search by default
  $scope.search();
});
