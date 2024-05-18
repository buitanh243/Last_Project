<script src="/Last_Project\vendor\bootstrap\js\bootstrap.min.js" ></script>
<script src="/Last_Project\vendor\fontawesome\js\all.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>

<script>
  $(document).ready(function() {
    // Lấy trạng thái active từ LocalStorage
    const activeItemId = localStorage.getItem('activeItemId');
    if (activeItemId !== null) {
      $('#itemList .list-group-item').removeClass('active text-white');
      $('#itemList .list-group-item[data-id="' + activeItemId + '"]').addClass('active text-white');
    }

    // Thêm sự kiện click cho các liên kết trong danh sách
    $('#itemList .list-group-item').on('click', function() {
      const itemId = $(this).data('id');
      localStorage.setItem('activeItemId', itemId);
    });
  });
</script>
