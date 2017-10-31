// var channel = "UCRDuxyMCKmyaX5rRDFo-RCQ";
var channel = "UCyU5wkjgQYGRB0hIHMwm2Sgs";
var key = "AIzaSyCEFnhqYRdnmWn0-rvVLFTr8UOCdivVvDE";

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

app.filter('durationFormat', function() {
	return function (input) {
		var formattedTime = input.replace("PT","").replace("H"," jam ").replace("M"," menit ").replace("S"," detik");
		return formattedTime;
	};
});

app.controller('home', function ($scope, $http) {

	$scope.featuredVideoId = "EEXtWKMWEg4";

	// mengambil video tutorial terbaru
	// membuat params
	var query = {
		channelId: channel,
		part: "snippet",
		key: key,
		maxResults: 4,
		order: "date",
		type: "video"
	}
	// membuat config untuk method get
	var config = {
		params: query
	};

	$http.get("https://www.googleapis.com/youtube/v3/search", config).then(function (response) {
		$scope.videos = response.data.items;
		console.log($scope.videos);
	});


});

app.controller('videos', function ($scope, $http) {

	$scope.videos = [];
	$scope.orderName = "date";
	$scope.viewMode = "grid";

	// cari video

	$scope.search = function (nextPage) {
		// membuat params
		var query = {
			channelId: channel,
			part: "snippet",
			key: key,
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

			$scope.getVideoDetail();

			console.log($scope.videos);
		});
	};

	// mengambil detail informasi dari semua video
	$scope.getVideoDetail = function () {

		angular.forEach($scope.videos, function(row) {

			var query = {
				id: row.id.videoId,
				part: "contentDetails",
				key: key
			}

			var config = {
				params: query
			}

			$http.get("https://www.googleapis.com/youtube/v3/videos", config).then(function (response) {
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

app.controller('playlist', function ($scope, $http) {

	$scope.playlist = [];
	$scope.orderName = "date";

	// cari playlist
	$scope.search = function (nextPage) {

		// membuat params
		var query = {
			channelId: channel,
			part: "snippet",
			key: key,
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
			console.log(response);
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
				key: key
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
	$scope.viewMode = "grid";

	// mendapatkan info playlist untuk playlist header
	$scope.getPlaylist = function () {

		// membuat params
		var query = {
			id: $scope.playlistId,
			part: "snippet",
			key: key,
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
			key: key,
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
			$scope.getVideoDetail();
		});
	};

	// mengambil detail informasi dari semua video
	$scope.getVideoDetail = function () {

		angular.forEach($scope.videos, function(row) {

			var query = {
				id: row.snippet.resourceId.videoId,
				part: "contentDetails",
				key: key
			}

			var config = {
				params: query
			}

			$http.get("https://www.googleapis.com/youtube/v3/videos", config).then(function (response) {
				row.contentDetails = response.data.items[0].contentDetails;
			});
		});
	}

	$scope.getPlaylist();
	$scope.search();
});
