var player;
function onYouTubeIframeAPIReady() {
}

function embedVideoFromLink(youtubeLink) {
    var videoId = getYouTubeVideoId(youtubeLink);
    if (videoId) {
        player = new YT.Player('player', {
            height: '500',
            width: '100%',
            videoId: videoId,
            playerVars: {
                'autoplay': 0,
                'controls': 1,
                'showinfo': 0,
                'rel': 0,
                'modestbranding': 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    } else {
        alert('Đường link YouTube không hợp lệ.');
    }
}

function onPlayerReady(event) {
}

function onPlayerStateChange(event) {
}

function getYouTubeVideoId(url) {
    var regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    var match = url.match(regex);
    return match && match[1] ? match[1] : null;
}

$(document).on('click', '[data-bs-target="#videoModal"]', function () {
    var youtubeLink = $(this).data('youtube-link');
    embedVideoFromLink(youtubeLink);
});
$('#videoModal').on('hide.bs.modal', function () {
    if (player) {
        player.destroy();
    }
});

$('#webModal').on('show.bs.modal', function (event) {
    var webLink = $(event.relatedTarget).data('web-link');
    $(this).find('iframe').attr('src', webLink);
});
$('#webModal').on('hide.bs.modal', function () {
    $(this).find('iframe').attr('src', '');
});
