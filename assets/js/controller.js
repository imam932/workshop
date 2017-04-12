var app = angular.module('myApp', ['jtt_youtube', 'youtube-embed', 'ui.bootstrap']);

//membuat filter untuk menentukan posisi start dari ng-repeat
app.filter('startFrom', function () {
	return function (input, start) {
		if (input) {
			start = +start;
			return input.slice(start);
		}
		return [];
	};
});

app.controller('tutorial', function ($scope, youtubeFactory, filterFilter) {

  youtubeFactory.getVideosFromChannelById({

    channelId: "UCyU5wkjgQYGRB0hIHMwm2Sg",
    part: "snippet",
    key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
    maxResults: 50

  }).then(function (_data) {

    console.log(_data);
    $scope.videos = _data.data.items;

		// mengatur pagination
    $scope.currentPage	= 1;
    $scope.entryLimit	= 12;
		// $scope.totalItems = $scope.filteredItems.length;
    // $scope.noOfPages	= Math.ceil($scope.totalItems / $scope.entryLimit);

  }).catch(function (_data) {
    console.log(_data);
  });

});
