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
                        <h2 class="content-header-title float-start mb-0">Pengumuman</h2>
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
            <div class="col-md-6 col-xl-12">
                <div class="card bg-secondary text-white mb-3">
                  <div class="card-body">
                    <h5 class="card-title text-white" id="pengumuman">Secondary card title</h5>
                  </div>
                </div>
              </div>

        </div>
    </div>
</div>
<!-- END: Content-->

<script>
fetch('/api/dashboard/akun/{{ Auth::user()->id}}/pengumuman')
.then((res) => res.json())
.then((json) => {
    if(json.data?.pengumuman === "true"){
        $('#pengumuman').text('Selamat anda lulus');
    }else if(json.data?.pengumuman === "true"){
        $('#pengumuman').text('Mohon maaf anda tidak lulus');
    }else{
        $('#pengumuman').text('Menunggu Persetujuan');
    }
})
</script>

@endsection