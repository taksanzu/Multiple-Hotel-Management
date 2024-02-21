var player;

// Hàm được gọi khi thư viện IFrame API đã sẵn sàng
function onYouTubeIframeAPIReady() {
    // Do nothing here, we'll create the player when needed
}

// Hàm để nhúng video từ đường link
function embedVideoFromLink(youtubeLink) {
    // Trích xuất video ID từ đường link
    var videoId = getYouTubeVideoId(youtubeLink);
    if (videoId) {
        // Tạo đối tượng player
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
        // Thông báo lỗi hoặc thực hiện các xử lý khác
        alert('Đường link YouTube không hợp lệ.');
    }
}

// Hàm được gọi khi player đã sẵn sàng
function onPlayerReady(event) {
    // Do something when the player is ready
}

// Hàm được gọi khi trạng thái của player thay đổi
function onPlayerStateChange(event) {
    // Do something when the player state changes
}

// Hàm để trích xuất video ID từ đường link YouTube
function getYouTubeVideoId(url) {
    // Regex để trích xuất video ID từ đường link
    var regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    var match = url.match(regex);
    return match && match[1] ? match[1] : null;
}

// Sự kiện click cho mỗi nút mở modal
$(document).on('click', '[data-bs-target="#videoModal"]', function () {
    // Lấy đường link từ thuộc tính data-youtube-link
    var youtubeLink = $(this).data('youtube-link');
    embedVideoFromLink(youtubeLink);
});
$('#videoModal').on('hide.bs.modal', function () {
    if (player) {
        player.destroy();
    }
});

$('#webModal').on('show.bs.modal', function (event) {
    // Lấy đường link web từ thuộc tính data-web-link của nút
    var webLink = $(event.relatedTarget).data('web-link');

    // Set đường link web cho thẻ iframe
    $(this).find('iframe').attr('src', webLink);
});
// Sự kiện khi modal được ẩn
$('#webModal').on('hide.bs.modal', function () {
    // Dừng tất cả các tài nguyên (video, âm thanh, v.v.) trong iframe khi modal được ẩn
    $(this).find('iframe').attr('src', '');
});
