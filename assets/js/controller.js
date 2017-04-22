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

	// cari video
	$scope.search = function (nextPage) {

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

		if (nextPage) {
			query.pageToken = nextPage;
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/search", config).then(function (response) {
			$scope.data = response.data;
			if (nextPage) {
				$scope.videos.push(...response.data.items);
			} else {
				$scope.videos = response.data.items;
			}
		});
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

	// cari playlist
	$scope.search = function (nextPage) {

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

		if (nextPage) {
			query.pageToken = nextPage;
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/search", config).then(function (response) {
			$scope.data = response.data;
			if (nextPage) {
				$scope.playlist.push(...response.data.items);
			} else {
				$scope.playlist = response.data.items;
			}
			$scope.getPlaylistDetail();
		});
	};

	// mengambil detail informasi dari semua playlist
	$scope.getPlaylistDetail = function () {

		angular.forEach($scope.playlist, function(row) {

			var query = {
				id: row.id.playlistId,
				part: "contentDetails",
				key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0"
			}

			var config = {
				params: query
			}

			$http.get("https://www.googleapis.com/youtube/v3/playlists", config).then(function (response) {
				row.contentDetails = response.data.items[0].contentDetails;
			});
		});
	}

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

	// mendapatkan info playlist untuk playlist header
	$scope.getPlaylist = function () {

		// membuat params
		var query = {
			id: $scope.playlistId,
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 1
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/playlists", config).then(function (response) {
			$scope.playlist = response.data.items[0];
			console.log($scope.playlist);
		});
	};

	// cari video
	$scope.search = function (nextPage) {

		// membuat params
		var query = {
			playlistId: $scope.playlistId,
			part: "snippet",
			key: "AIzaSyAiHtxgSZLXBkb5B_z94XSYrjtXUy7NEi0",
			maxResults: 12
		}

		if (nextPage) {
			query.pageToken = nextPage;
		}

		// membuat config untuk method get
		var config = {
			params: query
		};

		$http.get("https://www.googleapis.com/youtube/v3/playlistItems", config).then(function (response) {
			$scope.data = response.data;
			if (nextPage) {
				$scope.videos.push(...response.data.items);
			} else {
				$scope.videos = response.data.items;
			}
		});
	};

	$scope.getPlaylist();
	$scope.search();
});
