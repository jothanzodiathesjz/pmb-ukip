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
                        <h2 class="content-header-title float-start mb-0">Data Peserta</h2>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
        </button>
        
        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                    <th>Biodata</th>
                    <th>Sekolah</th>
                    <th>Wali</th>
                    <th>Jurusan</th>
                    <th>Others</th>
                    <th>Berkas</th>
                    <th>Lulus</th>
                  </tr>
                </thead>
              </table>

        </div>
    </div>
</div>
<!-- END: Content-->
<!-- Include jQuery -->

<!-- Button trigger modal -->

<script>
  const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>
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
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<a class="" data-user-id="' + foodId + '">Detail <i class="ti ti-eye"></i></a> ';
            return deleteButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<a class="" data-user-id="' + foodId + '">Detail <i class="ti ti-eye"></i></a> ';
            return deleteButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<a class="" data-user-id="' + foodId + '">Detail <i class="ti ti-eye"></i></a> ';
            return deleteButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<a class="" data-user-id="' + foodId + '">Detail <i class="ti ti-eye"></i></a> ';
            return deleteButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<a class="" data-user-id="' + foodId + '">Detail <i class="ti ti-eye"></i></a> ';
            return deleteButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              '<a class="" data-user-id="' + foodId + '">Detail <i class="ti ti-eye"></i></a> ';
            return deleteButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var foodId = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var deleteButton =
              `<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
              </div>`;
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