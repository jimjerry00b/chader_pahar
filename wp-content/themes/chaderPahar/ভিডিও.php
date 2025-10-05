<?php get_header(); ?>

<?php
/*
    Template Name: ভিডিও
*/
?>

<section class="video-gallery py-5">
    <div class="container">
        <div class="row g-3">
            <!-- Row 1 -->
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 1" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 2" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 3" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 4" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 5" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 6" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 7" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 8" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="dQw4w9WgXcQ" style="cursor: pointer;">
                    <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg" alt="Video 9" class="img-fluid">
                    <div class="play-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bengali Pagination -->
        <div class="pagination-wrapper text-center mt-5">
            <nav id="pagination_one" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">পূর্ববর্তী</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">২</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">৩</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">৪</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">পরবর্তী</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">ভিডিও</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="videoFrame" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.video-thumbnail {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.video-thumbnail:hover {
    transform: scale(1.05);
}

.video-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
}

.video-thumbnail .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 60px;
    color: rgba(255, 255, 255, 0.9);
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
}

.video-thumbnail:hover .play-icon {
    color: #ff0000;
    transform: translate(-50%, -50%) scale(1.2);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('videoFrame');
    const videoThumbnails = document.querySelectorAll('.video-thumbnail');
    
    // When modal is shown, load the video
    videoModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const videoId = button.getAttribute('data-video-id');
        const videoSrc = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
        videoFrame.setAttribute('src', videoSrc);
    });
    
    // When modal is hidden, stop the video
    videoModal.addEventListener('hide.bs.modal', function () {
        videoFrame.setAttribute('src', '');
    });
});
</script>

<?php get_footer(); ?>