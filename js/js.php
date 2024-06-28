<script src="/Last_Project\vendor\bootstrap\js\bootstrap.min.js"></script>
<script src="/Last_Project\vendor\fontawesome\js\all.min.js"></script>
<script src="/Last_Project\vendor\jquery\jquery-3.7.1.min.js"></script>
<script src="/Last_Project\vendor\sweetalert2\sweetalert2@11.js"></script>
<script src="/Last_Project\vendor\chartjs\chart.min.js"></script>



<script>
  // Hiện nút back to top khi cuộn
  window.addEventListener('scroll', function () {
            var backToTopButton = document.getElementById('back-top-btn');

            if (window.pageYOffset > 200) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        // Hàm cuộn về đầu trang
        function scrollToTop() {
            var duration = 300;
            var numSteps = 50;

            var scrollStep = window.scrollY / numSteps;

            // Hàm đệ quy để cuộn từng bước
            function scrollStepFunction() {
                if (window.scrollY === 0) return;
                window.scrollBy(0, -scrollStep);
                if (window.scrollY > 0) {
                    setTimeout(scrollStepFunction, duration / numSteps);
                }
            }

            // Bắt đầu cuộn
            scrollStepFunction();
        }
</script>