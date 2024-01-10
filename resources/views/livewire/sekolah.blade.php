<div>
    <div class="card-header border-bottom">
        <h4 class="card-title">Asal Sekolah </h4>
    </div>
    <div class="card-body py-2 ">

        <!-- form -->
        <div class="validate-form mt-2 ">
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nama_sekolah">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Masukkan Nama Sekolah"
                        value="" />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="lastName" placeholder="Masukkan NISN"
                        value="" />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="tahun_lulus">Tahun Lulus</label>
                    <input type="text" class="form-control" id="tahun_lulus" placeholder="Masukkan Tahun Lulus"
                        value="" />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="no_ijazah">No Ijazah</label>
                    <input type="text" class="form-control" id="no_ijazah" placeholder="Masukkan No Ijazah" value="" />
                </div>

                <div class="col-12">
                    <button id="submitSekolah" type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                    <button id="updateSekolah" type="submit" class="btn btn-outline-secondary mt-1" style="display: none;">Update</button>
                </div>
            </div>
        </div>
        <!--/ form -->
    </div>
</div>

<script>
    fetch('/dashboard/akun/{{ Auth::user()->id}}/sekolah',{
        method:'GET',
        headers:{
            'Content-Type':'application/json',
        }
    })
    .then((res)=>res.json())
    .then((json)=>{
        if(json.data){
            document.getElementById('nama_sekolah').value = json.data.nama_sekolah;
            document.getElementById('nisn').value = json.data.nisn;
            document.getElementById('tahun_lulus').value = json.data.tahun_lulus;
            document.getElementById('no_ijazah').value = json.data.no_ijazah;
            $('#updateSekolah').show();
            $('#submitSekolah').hide();
        }
    })
    .catch((error)=>{
        console.log(error)
    })
    const submit = document.getElementById('submitSekolah');
    $(document).ready(function(){
        $('#submitSekolah').click(function(){
            const data = {
                nama_sekolah: document.getElementById('nama_sekolah').value,
                nisn: document.getElementById('nisn').value,
                tahun_lulus: document.getElementById('tahun_lulus').value,
                no_ijazah: document.getElementById('no_ijazah').value,
                id_user: '{{ Auth::user()->id}}'
            }
            $.ajax({
                url: '/dashboard/akun/{{ Auth::user()->id}}/sekolahs',
                type: 'POST',
                data: {
                    ...data,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // penanganan sukses
                    console.log(response)
                    Swal.fire({
                        title: 'Good job!',
                        text: 'Data Berhasil disubmit',
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                    $('#updateSekolah').show();
                    $('#submitSekolah').hide();
                },
                error: function(error) {
                    // penanganan kesalahan
                    Swal.fire({
                        title: 'Error!',
                        text: 'Silahkan Selesaikan Input Form',
                        icon: 'error',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                }
            })
        })

        $('#updateSekolah').click(function(){
            const data = {
                nama_sekolah: document.getElementById('nama_sekolah').value,
                nisn: document.getElementById('nisn').value,
                tahun_lulus: document.getElementById('tahun_lulus').value,
                no_ijazah: document.getElementById('no_ijazah').value,
                id_user: '{{ Auth::user()->id}}'
            }
            $.ajax({
                url: '/dashboard/akun/{{ Auth::user()->id}}/sekolah',
                type: 'PUT',
                data: {
                    ...data,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response)
                    Swal.fire({
                        title: 'Good job!',
                        text: 'Data Berhasil disubmit',
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                },
                error: function(error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'terjadi kesalahan',
                        icon: 'error',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                }
            })
        })
        
    })
</script>