var app = angular.module('myApp', ['youtube-embed', 'ui.bootstrap']);

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

app.controller('videos', function ($scope, $http) {

	$scope.videos = [];
	$scope.orderName = "date";

	// pergi ke halaman selanjutnya
	$scope.nextPage = function (nextPage) {

		// membuat params
		var query = {
			channelId: "UCyU5wkjgQYGRB0hIHMwm2Sg",
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12,
			pageToken: nextPage,
			q: $scope.cari,
			order:$scope.orderName,
			type: "video"
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/search", config).then(

			// saat berhasil
			function (response) {
				$scope.data = response.data;
				$scope.videos.push(...response.data.items);
				console.log($scope.videos);
				console.log($scope.data);
			},

			// saat gagal
			function (response) {

			}
		);
	};

	// cari video
	$scope.search = function () {

		// membuat params
		var query = {
			channelId: "UCyU5wkjgQYGRB0hIHMwm2Sg",
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12,
			q: $scope.cari,
			order:$scope.orderName,
			type: "video"
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/search", config).then(

			// saat berhasil
			function (response) {
				$scope.data = response.data;
				$scope.videos = response.data.items;
			},

			// saat gagal
			function (response) {

			}
		);
	};

	// lakukan pencarian ketika input cari berubah
	$scope.$watch('cari', function(newValue, oldValue) {
	  $scope.search();
	}, true);

	// lakukan pencarian ketika order berubah
	$scope.$watch('orderName', function(newValue, oldValue) {
	  $scope.search();
	}, true);

	$scope.search();
});

app.controller('playlist', function ($scope, $http) {

	$scope.playlist = [];
	$scope.orderName = "date";

	// pergi ke halaman selanjutnya
	$scope.nextPage = function (nextPage) {

		// membuat params
		var query = {
			channelId: "UCyU5wkjgQYGRB0hIHMwm2Sg",
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12,
			pageToken: nextPage,
			q: $scope.cari,
			order:$scope.orderName,
			type: "playlist"
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/search", config).then(

			// saat berhasil
			function (response) {
				$scope.data = response.data;
				$scope.playlist.push(...response.data.items);
				console.log($scope.playlist);
				console.log($scope.data);
			},

			// saat gagal
			function (response) {

			}
		);
	};

	// cari playlist
	$scope.search = function () {

		// membuat params
		var query = {
			channelId: "UCyU5wkjgQYGRB0hIHMwm2Sg",
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12,
			q: $scope.cari,
			order:$scope.orderName,
			type: "playlist"
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/search", config).then(

			// saat berhasil
			function (response) {
				$scope.data = response.data;
				$scope.playlist = response.data.items;
			},

			// saat gagal
			function (response) {

			}
		);
	};

	// lakukan pencarian ketika input cari berubah
	$scope.$watch('cari', function(newValue, oldValue) {
	  $scope.search();
	}, true);

	// lakukan pencarian ketika order berubah
	$scope.$watch('orderName', function(newValue, oldValue) {
	  $scope.search();
	}, true);

	$scope.search();
});

app.controller('viewPlaylist', function ($scope, $http) {
	$scope.playlistId = window.playlistId;
	$scope.videos = [];

	// pergi ke halaman selanjutnya
	$scope.nextPage = function (nextPage) {

		// membuat params
		var query = {
			playlistId: $scope.playlistId,
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12,
			pageToken: nextPage
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/playlistItems", config).then(

			// saat berhasil
			function (response) {
				$scope.data = response.data;
				$scope.videos.push(...response.data.items);
				console.log($scope.videos);
				console.log($scope.data);
			},

			// saat gagal
			function (response) {

			}
		);
	};

	// cari video
	$scope.search = function () {

		// membuat params
		var query = {
			playlistId: $scope.playlistId,
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/playlistItems", config).then(

			// saat berhasil
			function (response) {
				$scope.data = response.data;
				$scope.videos = response.data.items;
			},

			// saat gagal
			function (response) {

			}
		);
	};

	$scope.search();
});
