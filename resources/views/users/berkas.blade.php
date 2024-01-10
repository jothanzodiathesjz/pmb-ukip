@extends('layouts.user.user')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Berkas</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Berkas </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Validation -->
            <section class="bs-validation">
                <div class="row">
                    <!-- Bootstrap Validation -->
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 id="berkasTitle" class="card-title">Upload Berkas</h4>
                            </div>
                            <div class="card-body">
                                <div class="needs-validation" novalidate id="berkasForm" enctype="multipart/form-data">
                                    <div class="mb-1">
                                        <label for="ktp" class="form-label">Ktp</label>
                                        <input class="form-control" type="file" id="ktp" name="ktp" required />
                                        <i>jpg/png/pdf</i>
                                    </div>
                                    <div class="mb-1">
                                        <label for="kk" class="form-label">KK</label>
                                        <input class="form-control" type="file" id="kk" name="kk" required />
                                        <i>jpg/png/pdf</i>
                                    </div>
                                    <div class="mb-1">
                                        <label for="ijasah" class="form-label">Ijazah</label>
                                        <input class="form-control" type="file" id="ijazah" name="ijazah" required />
                                        <i>jpg/png/pdf</i>
                                    </div>
                                    <div class="mb-1">
                                        <label for="skl" class="form-label">Surat Keterangan Lulus</label>
                                        <input class="form-control" type="file" id="skl" name="skl" required />
                                        <i>jpg/png/pdf</i>
                                    </div>
                                    <div class="mb-1">
                                        <label for="raport" class="form-label">Raport</label>
                                        <input class="form-control" type="file" id="raport" name="raport" required />
                                        <i>pdf</i>
                                    </div>
                                    <div class="mb-1">
                                        <label for="sertifikat" class="form-label">Sertifikat</label>
                                        <input class="form-control" type="file" id="sertifikat" name="sertifikat" required />
                                        <i>jpg/png/pdf</i>
                                    </div>
                                    <div class="mb-1">
                                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                                        <input class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran" required />
                                        <i>jpg/png/pdf</i>
                                    </div>
                                    
                                    <button id="submitBerkas" type="button" onclick="postData()" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Bootstrap Validation -->
                </div>
            </section>
            <!-- /Validation -->

        </div>
    </div>
</div>
<!-- END: Content-->

<script>

    const myform = document.getElementById('berkasForm');
        
        const ktp = document.getElementById('ktp');
        const kk = document.getElementById('kk');
        const ijasah = document.getElementById('ijazah');
        const skl = document.getElementById('skl');
        const raport = document.getElementById('raport');
        const sertifikat = document.getElementById('sertifikat');
        const bukti = document.getElementById('bukti_pembayaran');
    function postData() {
        

        const formData = new FormData();
        formData.append('ktp', ktp.files[0]);
        formData.append('kk', kk.files[0]);
        formData.append('ijazah', ijasah.files[0]);
        formData.append('skl', skl.files[0]);
        formData.append('raport', raport.files[0]);
        formData.append('sertifikat', sertifikat.files[0]);
        formData.append('bukti_pembayaran', bukti.files[0]);
        formData.append('id_user', '{{ Auth::user()->id}}');

        console.log(formData);
        Swal.fire({
            title: "Are Kamu Yakin",
            text: "Pastikan Data yang kamu upload sudah benar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, save it!"
          }).then((result) => {
            if (result.isConfirmed) {
                fetch('/api/berkas', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.message == 'failed'){
                        Swal.fire({
                            title: "Failed!",
                            text: error,
                            icon: "error"
                          });
                          return
                    }
                    console.log('Success:', data);
                    Swal.fire({
                        title: "Success!",
                        text: "Your file has been saved.",
                        icon: "success"
                      });
                })
                .catch((error) => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Failed!",
                        text: error,
                        icon: "error"
                      });
                });
              
            }
          });
        
    }

    function getBerkas(){
        fetch('/api/berkas/{{ Auth::user()->id}}',
        {
            method:'GET',
            headers:{
                'Content-Type':'application/json',
            }
        })
        .then((res)=>res.json())
        .then((json)=>{
            //ktp.
            //kk.
            //ijasah.
            //skl.
            //raport.
            //sertifikat.
            //bukti.
        
            if(json.data){
                const button = document.getElementById('submitBerkas');
                const berkastitle = document.getElementById('berkasTitle');
                berkastitle.innerText = 'Berkas Sudah Di Upload';
                button.disabled = true;
            }
        })
    }
getBerkas()
</script>

@endsection