<?php
include_once __DIR__ . '/../../js/js.php';
?>

<script>
  $(document).ready(function() {
    function getQueryParameter(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }

    if (getQueryParameter('name') === 'sanpham') {
      localStorage.setItem('activeItemId', '0');
    }

    const activeItemId = localStorage.getItem('activeItemId');
    if (activeItemId !== null) {
      $('#itemList .list-group-item[data-id="' + activeItemId + '"]').addClass('active text-white bg-dark border-0');
    }

    $('#itemList .list-group-item').on('click', function(e) {
      const itemId = $(this).data('id');
      localStorage.setItem('activeItemId', itemId);
    });

    $('#itemList .list-group-item').on('click', function(e) {
      e.preventDefault();

      const href = $(this).attr('href');
      if (href) {
        window.location.href = href;
      }
    });
  });


  $(document).ready(function() {
    //Nho tim cac doi tuong co id btn-delete

    $('.btn-delete').click(function() {
      var id = $(this).data('id');
      Swal.fire({
        title: "Bạn chắc chắn muốn xoá chứ?",
        text: "Lưu ý! Sẽ không thể khôi phục!",
        icon: "Cảnh bảo",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý",
        cancelButtonText: "Huỷ"
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "delete.php?id=" + id;
        }
      });
    });
  });


  //Kiểm tra xem người dùng có nhập đủ các trường hay chưa
  document.getElementById('themmoi').addEventListener('submit', function(event) {
    let sp_ten = document.getElementById('sp_ten').value.trim();
    let sp_soluong = document.getElementById('sp_soluong').value.trim();
    let sp_gia = document.getElementById('sp_gia').value.trim();
    let sp_ngaynhaphang = document.getElementById('sp_ngaynhaphang').value.trim();

    if (event.submitter.name === 'save') {
      if (sp_ten === '' || sp_soluong === '' || sp_gia === '' || sp_ngaynhaphang === '') {
        event.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Thông tin chưa đủ',
          html: 'Vui lòng nhập đầy đủ các trường có dấu (<i class="fa-solid fa-star-of-life fa-xs"></i>)',
          footer: '<a href="#">Vì sao tôi gặp vấn đề này?</a>'
        });
      }
    }
  });

  //Kiểm tra LSP
  document.getElementById('themmoi').addEventListener('submit', function(event) {
    let lsp_ten = document.getElementById('lsp_ten').value.trim();
    let lsp_mota = document.getElementById('lsp_mota').value.trim();

    if (event.submitter && event.submitter.name === 'save') {
      if (lsp_ten === '') {
        event.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Thông tin chưa đủ',
          html: 'Vui lòng nhập đầy đủ các trường có dấu (<i class="fa-solid fa-star-of-life fa-xs"></i>)',
          footer: '<a href="#">Vì sao tôi gặp vấn đề này?</a>'
        });
      }

    }
  });

  //Kiểm tra KM
  document.getElementById('themmoi').addEventListener('submit', function(event) {
    let km_ten = document.getElementById('km_ten').value.trim();
    let km_mota = document.getElementById('km_mota').value.trim();
    let km_sta = document.getElementById('km_sta').value.trim();
    let km_end = document.getElementById('km_end').value.trim();

    if (event.submitter && event.submitter.name === 'save') {
      if (km_ten === '' || km_sta === '' || km_end === '') {
        event.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Thông tin chưa đủ',
          html: 'Vui lòng nhập đầy đủ các trường có dấu (<i class="fa-solid fa-star-of-life fa-xs"></i>)',
          footer: '<a href="#">Vì sao tôi gặp vấn đề này?</a>'
        });
      }

    }
  });

  //Kiểm tra NSX
  document.getElementById('themmoi').addEventListener('submit', function(event) {
    let nsx_ten = document.getElementById('nsx_ten').value.trim();
    let nsx_mota = document.getElementById('nsx_mota').value.trim();


    if (event.submitter && event.submitter.name === 'save') {
      if (nsx_ten === '') {
        event.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Thông tin chưa đủ',
          html: 'Vui lòng nhập đầy đủ các trường có dấu (<i class="fa-solid fa-star-of-life fa-xs"></i>)',
          footer: '<a href="#">Vì sao tôi gặp vấn đề này?</a>'
        });
      }
    }
  });

  //Kiểm tra HSP
  document.getElementById('themmoi').addEventListener('submit', function(event) {
    let hsp_url = document.getElementById('hsp_url').value.trim();

    if (event.submitter && event.submitter.name === 'save') {
      if (hsp_url === '') {
        event.preventDefault();
        Swal.fire({
          icon: 'question',
          title: 'Bạn chưa chọn hình ảnh nào?',
          html: 'Có thể chọn "Huỷ" để dừng công việc!',
        });
      }
    }
  });

  //Kiểm tra NSX
  document.getElementById('themmoi').addEventListener('submit', function(event) {
    let nsx_ten = document.getElementById('nsx_ten').value.trim();

    if (event.submitter && event.submitter.name === 'save') {
      if (gopy_hinhthuc === '') {
        event.preventDefault();
        Swal.fire({
          icon: 'question',
          title: 'Thông tin đang rỗng?',
          html: 'Có thể chọn "Huỷ" để dừng công việc!',
          footer: '<a href="#">Vì sao tôi gặp vấn đề này?</a>'
        });
      }
    }
  });
</script>