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
        
        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            var foodId = row.id; 

            // view biodata
            var viewButton =
              '<a class="biodata"  data-user-id="' + foodId + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail <i class="ti ti-eye"></i></a> ';
            return viewButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var Id = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var viewButton =
              '<a class="sekolah" data-user-id="' + Id + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail <i class="ti ti-eye"></i></a> ';
            return viewButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var Id = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var viewButton =
              '<a class="wali" data-user-id="' + Id + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail <i class="ti ti-eye"></i></a> ';
            return viewButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var Id = row.id;

            // Tombol
            var viewButton =
              '<a class="jurusan" data-user-id="' + Id + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail <i class="ti ti-eye"></i></a> ';
            return viewButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var Id = row.id;

            // Tombol
            var viewButton =
              '<a class="others" data-user-id="' + Id + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail <i class="ti ti-eye"></i></a> ';
            return viewButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var Id = row.id; // Mengambil ID food dari data baris

            // Tombol Hapus
            var viewButton =
              '<a class="berkas" data-user-id="' + Id + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail <i class="ti ti-eye"></i></a> ';
            return viewButton;
          },
        },
        {
          data: "id",
          render: function (data, type, row) {
            var Id = row.id; // Mengambil ID food dari data baris
            var selectedValue;
            if(row.pengumuman?.pengumuman === "true"){
              selectedValue = `
                <option value="true" selected>Lulus</option>
                <option value="false">Tidak Lulus</option>`
            }else if(row.pengumuman?.pengumuman == "false"){
              selectedValue = `
              <option value="false" selected>Tidak Lulus</option>
                <option value="true">Lulus</option>
                `
            }else{
              selectedValue = `<option selected >Status</option>
                <option value="true">Lulus</option>
                <option value="false">Tidak Lulus</option>`;
            }
            // Tombol Hapus
            var viewButton =
              `<select  class="form-select pengumuman" aria-label="Default select example" data-user-id="${Id}">
                ${selectedValue}
              </select>`;
            return viewButton;
          },
        },
      ],
    });
  
    $("#example").on("click", ".biodata", function () {
      var userId = $(this).data("user-id");
      // ajax
      fetch(`/api/dashboard/akun/${userId}/biodata`)
      .then(response => response.json())
      .then(data => {
        $('.modal-body').html('');
        if(data.data===null){
          $('.modal-body').append(`<div style="height:100px;" class="alert alert-warning" role="alert">
  Data Belum DiInput
</div>`);
        }
        var child = `
        <div class="d-flex flex-col justify-center gap-3 w-full">
                    <div class="w-50">
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountFirstName">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik"
                                value="${data.data.nik}"  disabled/>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountLastName">Nama Lengkap</label>
                            <input type="text" class="form-control
                            " id="namalengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="${data.data.nama_lengkap}"  disabled/>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountEmail">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="${data.data.email}"  disabled />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountOrganization">Jenis Kelamin</label>
                            <select id="jenis_kelamin" disabled class="select2 form-select">
                                <option value="" selected >${data.data.jenis_kelamin}</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountPhoneNumber">Tempat Lahir</label>
                            <input type="text" class="form-control " id="tempatLahir" name="tempat_lahir"
                                placeholder="Masukkan Tempat Lahir" value="${data.data.tempat_lahir}"  disabled/>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountAddress">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir"
                                placeholder="Masukkan Tanggal Lahir" value="${data.data.tanggal_lahir}"  disabled/>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountState">Status</label>
                            <select id="status" disabled class="select2 form-select">
                                <option value="" selected >${data.data.status}</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountZipCode">No Telepon</label>
                            <input type="text" class="form-control account-zip-code" id="notelepon" name="zipCode"
                                placeholder="Masukkan No Telepone" maxlength="14" value="${data.data.no_telepon}"  disabled/>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountZipCode">Agama</label>
                            <select id="agama" disabled class="select2 form-select">
                                <option value="" selected >${data.data.agama}</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountZipCode">Alamat </label>
                            <input type="text" class="form-control account-zip-code" id="alamat" name="zipCode"
                                placeholder="Masukkan Alamat" value="${data.data.alamat}"  disabled />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="select-country">Kab/Kota</label>
                            <div>
                                <select id="kota" class="form-select select2" disabled name="select-country">
                                  <option value="" selected >${data.data.kota}</option>
                                    </select>
                            </div>
                        </div>

                        <div class="w-100 mb-1">
                            <label for="language" class="form-label">Kecamatan</label>
                            <select class="form-select select2" disabled id="kecamatan" name="kecamatan">
                              <option value="" selected >${data.data.kecamatan}</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="language" class="form-label">Kecamatan</label>
                            <select class="form-select select2" disabled id="kecamatan" name="kecamatan">
                              <option value="" selected >${data.data.kecamatan}</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="timeZones" class="form-label">Kelurahan</label>
                            <select class="form-select select2" disabled id="kelurahan" name="select-country">
                              <option value="" selected >${data.data.kelurahan}</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="timeZones" class="form-label">Dusun</label>
                            <input type="text" class="form-control account-zip-code" id="dusun" name="zipCode"
                                placeholder="Masukkan Dusun" value="${data.data.nik}"  disabled/>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="timeZones" class="form-label">RT/RW</label>
                            <input type="text" class="form-control account-zip-code" id="rtrw" name="zipCode"
                                placeholder="Masukkan RT/RW" value="${data.data.nik}"  disabled />
                        </div>

                    </div>
                </div>
        `
         $('.modal-body').append(child);
      })
    })
   
    $("#example").on("click", ".sekolah", function () {
      var userId = $(this).data("user-id");
      fetch(`/api/dashboard/akun/${userId}/sekolah`)
      .then(response => response.json())
      .then(data => {
        $('.modal-body').html('');
        if(!data.data){
          $('.modal-body').append(`<div style="height:100px;" class="alert alert-warning" role="alert">
          Data Belum DiInput
        </div>`);
        }else{
        var child = `<div class="validate-form mt-2 ">
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nama_sekolah">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Masukkan Nama Sekolah"
                    value="${data.data.nama_sekolah}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="lastName" placeholder="Masukkan NISN"
                    value="${data.data.nisn}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="tahun_lulus">Tahun Lulus</label>
                    <input type="text" class="form-control" id="tahun_lulus" placeholder="Masukkan Tahun Lulus"
                    value="${data.data.tahun_lulus}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="no_ijazah">No Ijazah</label>
                    <input type="text" class="form-control" id="no_ijazah" placeholder="Masukkan No Ijazah" value="${data.data.no_ijazah}"  disabled  />
                </div>
            </div>
        </div>`
        $('.modal-body').append(child);
      }
      })
    })
    $("#example").on("click", ".wali", function () {
      var userId = $(this).data("user-id");
      fetch(`/api/dashboard/akun/${userId}/wali`)
      .then(response => response.json())
      .then(data => {
        $('.modal-body').html('');
        if(!data.data){
          $('.modal-body').append(`<div style="height:100px;" class="alert alert-warning" role="alert">
          Data Belum DiInput
        </div>`);
        }else{
          var child = `<div class="row">
                <div class="col-12 col-sm-6 mb-1 px">
                    <label class="form-label" for="wali">Nama Orang Tua / Wali</label>
                    <input type="text" class="form-control" id="wali" name="firstName" placeholder="Masukkan Nama"
                    value="${data.data.nama_wali}"  disabled   />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label for="hubungan" class="form-label">Hubungan</label>
                    <select id="hubungan" disabled class="select2 form-select">
                        <option value="" selected  >${data.data.hubungan}</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="kontak">Kontak</label>
                    <input type="text" class="form-control" id="kontak"  placeholder="Masukkan kontak"
                    value="${data.data.kontak}"  disabled />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" 
                        placeholder="Masukkan Pekerjaan" value="${data.data.pekerjaan}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="alamataccountAddress">Alamat</label>
                    <input type="text" class="form-control" id="alamat" 
                        placeholder="Masukkan Alamat" value="${data.data.alamat}"  disabled  />
                </div>
            </div>`
          $('.modal-body').append(child);
        }
      })
    })
    $("#example").on("click", ".jurusan", function () {
      var userId = $(this).data("user-id");
      fetch(`/api/dashboard/akun/${userId}/jurusan`)
      .then(response => response.json())
      .then(data => {
        $('.modal-body').html('');
        if(!data.data){
          $('.modal-body').append(`<div style="height:100px;" class="alert alert-warning" role="alert">
          Data Belum DiInput
        </div>`);
        }else{
          var child = ` <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="fakultas">Fakultas</label>
                    <select id="fakultas" disabled class="select2 form-select">
                        <option value="" selected>${data.data.fakultas}</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select id="prodi" disabled class="select2 form-select">
                      <option value="" selected>${data.data.prodi}</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="reason">Alasan Pilih Jurusan</label>
                    <input type="text" class="form-control" id="reason" placeholder="Masukkan Alasan" value="${data.data.reason}"  disabled  />
                </div>
            </div>`
          $('.modal-body').append(child);
        }
      })
    })
    $("#example").on("click", ".others", function () {
      var userId = $(this).data("user-id");
      fetch(`/api/dashboard/akun/${userId}/others`)
      .then(response => response.json())
      .then(data => {
        $('.modal-body').html('');
        if(!data.data){
          $('.modal-body').append(`<div style="height:100px;" class="alert alert-warning" role="alert">
          Data Belum DiInput
        </div>`);
        }else{
          var child = `<div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="organisasi">Organisasi</label>
                    <input type="text" class="form-control" id="organisasi"  placeholder="Masukkan Nama Organisasi"
                    value="${data.data.organisasi}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan"  placeholder="Masukkan Jabatan"
                    value="${data.data.jabatan_organisasi}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="hobi">Hobby</label>
                    <input type="email" class="form-control" id="hobi"  placeholder="Masukkan Hobi"
                    value="${data.data.hobi}"  disabled  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="prestasi">Prestasi</label>
                    <textarea type="text" disabled class="form-control" id="prestasi" 
                        placeholder="Masukkan prestasi" value="PIXINVENT">
                        ${data.data.prestasi}
                        </textarea>
                </div>
            </div>`
          $('.modal-body').append(child);
        }
      })
    })
    $("#example").on("click", ".berkas", function () {
      var userId = $(this).data("user-id");
      fetch(`/api/dashboard/akun/${userId}/berkas`)
      .then(response => response.json())
      .then(data => {
        $('.modal-body').html('');
        if(!data.data){
          $('.modal-body').append(`<div style="height:100px;" class="alert alert-warning" role="alert">
          Data Belum DiInput
        </div>`);
        }else{
          var child = `<div class="needs-validation" novalidate id="berkasForm" enctype="multipart/form-data">
                                    <div class="d-flex flex-row mb-1">
                                        <label for="ktp" class="form-label w-25">Ktp</label>
                                        <a href="${data.data.ktp}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                    <div class="d-flex flex-row mb-1">
                                        <label for="kk" class="form-label w-25">KK</label>
                                        <a href="${data.data.kk}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                    <div class="d-flex flex-row mb-1">
                                        <label for="ijasah" class="form-label w-25">Ijazah</label>
                                        <a href="${data.data.ijazah}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                    <div class="d-flex flex-row mb-1">
                                        <label for="skl" class="form-label w-25">Surat Keterangan Lulus</label>
                                        <a href="${data.data.skl}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                    <div class="d-flex flex-row mb-1">
                                        <label for="raport" class="form-label w-25">Raport</label>
                                        <a href="${data.data.raport}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                    <div class="d-flex flex-row mb-1">
                                        <label for="sertifikat" class="form-label w-25">Sertifikat</label>
                                        <a href="${data.data.sertifikat}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                    <div class="d-flex flex-row mb-1">
                                        <label for="bukti_pembayaran" class="form-label w-25">Bukti Pembayaran</label>
                                        <a href="${data.data.bukti_pembayaran}" target="_blank" class="">lihat<i class="ti ti-eye"></i></a>
                                    </div>
                                </div>`
          $('.modal-body').append(child);
        }
      })
    })
    $("#example").on("change", ".pengumuman", function () {
      var userId = $(this).data("user-id");
      var selectedValue = $(this).val();
      fetch(`/api/dashboard/akun/${userId}/pengumuman`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          pengumuman: selectedValue,
          id_user: userId
        })
      })
      .then((res) => res.json())
      .then((json) => {
        Swal.fire({
          icon: 'success',
          title: 'Good job!',
          text: 'Data Berhasil diperbaharui',
        })
      })
      // Lakukan apa yang diperlukan dengan nilai yang telah Anda dapatkan
      console.log('Selected Value:', selectedValue);
      console.log('User ID:', userId);
    })
</script> 

@endsection