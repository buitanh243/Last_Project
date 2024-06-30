<?php
$rootDirectory = dirname(__DIR__); 
$projectName = basename($rootDirectory); 
define('URL', '/' . $projectName); 
?>

<script src="<?=URL?>\vendor\bootstrap\js\bootstrap.min.js"></script>
<script src="<?=URL?>\vendor\fontawesome\js\all.min.js"></script>
<script src="<?=URL?>\vendor\jquery\jquery-3.7.1.min.js"></script>
<script src="<?=URL?>\vendor\sweetalert2\sweetalert2@11.js"></script>



<script>
    // Hiện nút back to top khi cuộn
    window.addEventListener('scroll', function() {
        var backToTopButton = document.getElementById('back-top-btn');

        if (window.pageYOffset > 200) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    // Cuộn về đầu trang
    function scrollToTop() {
        var start = null;
        var duration = 600;

        function step(timestamp) {
            if (!start) start = timestamp;
            var progress = timestamp - start;
            var scrollY = window.scrollY;
            var scrollStep = Math.min(1, progress / duration);
            window.scrollTo(0, scrollY - (scrollY * scrollStep));
            if (progress < duration) {
                requestAnimationFrame(step);
            }
        }

        requestAnimationFrame(step);
    }
</script>