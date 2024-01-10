@extends('layouts.user.user')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.45.0/tabler-icons.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Users Data</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pengumuman </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <table id="example" class="table table-striped" style="width: 100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>Berkas</th>
                    <th>Data Diri</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>

        </div>
    </div>
</div>
<!-- END: Content-->
<!-- Include jQuery -->


<!-- Include DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
 



    $("#example").DataTable({
      ajax: {
        url: "/api/admin/users",
        type: "GET",
      },
      columns: [
        {
          data: null,
          render: function (data, type, row, meta) {
            // Mengambil nomor urut baris
            var rowIndex = meta.row + meta.settings._iDisplayStart + 1;
            return rowIndex;
          },
        },
        { data: "name" },
        { data: "username"},
        { data: "email" },
        {
          data: "email",
        },
        { data: "email" },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<button class="btn btn-outline-primary btn-delete" data-user-id="' + foodId + '"><i class="ti ti-trash"></i></button> ';
            return deleteButton;
          },
        },
      ],
    });
  
    $("#example").on("click", ".btn-delete", function () {
      var userId = $(this).data("user-id");
      // saya ingin menghapus row berdasarkan iduser
      $.ajax({
        url: "/api/admin/users/" + userId,
        type: "DELETE",
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "user successfully deleted",
            icon: "success"
          });
          window.location.reload();
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
       
    })
   
</script> 

@endsection