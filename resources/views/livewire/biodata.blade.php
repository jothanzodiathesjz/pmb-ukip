<div>
    <div class="card-header border-bottom">
        <h4 class="card-title">Biodata </h4>

    </div>
    <div class="card-body py-2 ">
        <!-- form -->
        @if (!empty($message)))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif



        <div class="validate-form mt-2">
            <div class="">
                <div class="d-flex flex-col justify-center gap-3 w-full">
                    <div class="w-50">
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountFirstName">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik"
                                value="" />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountLastName">Nama Lengkap</label>
                            <input type="text" class="form-control
                            " id="namalengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="" />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountEmail">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="" />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountOrganization">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="select2 form-select">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountPhoneNumber">Tempat Lahir</label>
                            <input type="text" class="form-control " id="tempatLahir" name="tempat_lahir"
                                placeholder="Masukkan Tempat Lahir" value="" />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountAddress">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir"
                                placeholder="Masukkan Tanggal Lahir" />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountState">Status</label>
                            <select id="status" class="select2 form-select">
                                <option value="">Pilih Status</option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountZipCode">No Telepon</label>
                            <input type="text" class="form-control account-zip-code" id="notelepon" name="zipCode"
                                placeholder="Masukkan No Telepone" maxlength="14" />
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountZipCode">Agama</label>
                            <select id="agama" class="select2 form-select">
                                <option value="">Pilih Status</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Islam">Islam</option>
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="accountZipCode">Alamat </label>
                            <input type="text" class="form-control account-zip-code" id="alamat" name="zipCode"
                                placeholder="Masukkan Alamat" />
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="country">Provinsi</label>
                            <select id="provinsi" class="select2 form-select">

                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label class="form-label" for="select-country">Kab/Kota</label>
                            <div>
                                <select id="kota" class="form-select select2" name="select-country" <option value=""
                                    </select>
                            </div>
                        </div>

                        <div class="w-100 mb-1">
                            <label for="language" class="form-label">Kecamatan</label>
                            <select class="form-select select2" id="kecamatan" name="kecamatan">
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="language" class="form-label">Kecamatan</label>
                            <select class="form-select select2" id="kecamatan" name="kecamatan">
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="timeZones" class="form-label">Kelurahan</label>
                            <select class="form-select select2" id="kelurahan" name="select-country">
                            </select>
                        </div>
                        <div class="w-100 mb-1">
                            <label for="timeZones" class="form-label">Dusun</label>
                            <input type="text" class="form-control account-zip-code" id="dusun" name="zipCode"
                                placeholder="Masukkan Dusun" />
                        </div>
                        <div class="w-100 mb-1">
                            <label for="timeZones" class="form-label">RT/RW</label>
                            <input type="text" class="form-control account-zip-code" id="rtrw" name="zipCode"
                                placeholder="Masukkan RT/RW" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-inline" id="submitButton">
                <div class="col-12">
                    <button id="submitHandler" type="submit" class="btn btn-primary mt-1 me-1">Save
                        changes</button>
                    <button id="updateHandler" type="submit" class="btn btn-primary mt-1 me-1"
                        style="display: none">Update</button>
                </div>
            </div>
        </div>
        <!--/ form -->
    </div>



    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>--}}
    {{-- <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
           
           
        function clearOptions(id) {

        $('#' + id).empty().trigger('change');
        }
        
        var urlporvinsi = "{{ asset('indonesia/provinsi.json') }}";
        var urlKabupaten = "{{ asset('indonesia/kabupaten/') }}";
        var urlKecamatan = "{{ asset('indonesia/kecamatan/') }}";
        var urlKelurahan = "{{ asset('indonesia/kelurahan/') }}";
    
       $.get( urlporvinsi).done(function(data){
        //    selct2
           $('#provinsi').select2({
               placeholder: 'Pilih Provinsi',
               data : data.map(function(item) {
                    return {
                        id: item.id,
                        text: item.nama // Sesuaikan dengan properti yang sesuai
                    };
                })
           })
       });
    
       
      
       var biodata = {
           
       }

       $(jenis_kelamin).change(function () {
           biodata['jenis_kelamin'] = $(this).val();
       });
       
       

    
       var selectProv = $('#provinsi');
       $(selectProv).change(function () {
            var value = $(selectProv).val();
            clearOptions('kota');

            if (value) {

                var text = $('#provinsi :selected').text();
             
                $.getJSON(urlKabupaten +'/' + value + ".json", function(res) {

                    res = $.map(res, function (obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kabupaten -",
                        text: "- Pilih Kabupaten -"
                    }].concat(res);

                    //implemen data ke select provinsi
                    $("#kota").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    })
                })
            }
        });

        var selectKab = $('#kota');
        $(selectKab).change(function () {
            var value = $(selectKab).val();
            clearOptions('kecamatan');

            if (value) {

                var text = $('#kota :selected').text();
              
                $.getJSON(urlKecamatan + '/' + value + ".json", function(res) {

                    res = $.map(res, function (obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kecamatan -",
                        text: "- Pilih Kecamatan -",
                    }].concat(res);

                    //implemen data ke select provinsi
                    $("#kecamatan").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    })
                })
            }
        });

        var selectKec = $('#kecamatan');
        $(selectKec).change(function () {
            var value = $(selectKec).val();
            clearOptions('kelurahan');

            if (value) {
                console.log("on change selectKec");

                var text = $('#kecamatan :selected').text();
               
                $.getJSON(urlKelurahan +'/' + value + ".json", function(res) {

                    res = $.map(res, function (obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kelurahan -",
                        text: "- Pilih Kelurahan -"
                    }].concat(res);

                    //implemen data ke select provinsi
                    $("#kelurahan").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    })
                })
            }
        });
        var selectKel = $('#kelurahan');
        $(selectKel).change(function () {
            var value = $(selectKel).val();

           
        });
        function getData() {
                $.ajax({
                        url: '/dashboard/akun/{{ Auth::user()->id}}/biodata',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if(response.data !== null){
                                $('#nik').val(response.data.nik)
                                $('#namalengkap').val(response.data.nama_lengkap)
                                $('#email').val(response.data.email)
                                $('#status').val(response.data.status)
                                $('#alamat').val(response.data.alamat)
                                $('#tempatLahir').val(response.data.tempat_lahir)
                                $('#tanggalLahir').val(response.data.tanggal_lahir)
                                $('#notelepon').val(response.data.no_telepon)
                                $('#dusun').val(response.data.dusun)
                                $('#rtrw').val(response.data.rt_rw)
                                $('#provinsi :selected').text(response.data.provinsi)
                                $('#kota').val(response.data.kabupaten)
                                $('#kecamatan').val(response.data.kecamatan)
                                $('#kelurahan').val(response.data.kelurahan)
                                $('#agama').val(response.data.agama)
                                $('#jenis_kelamin').val(response.data.jenis_kelamin)

                                $("#submitHandler").remove();
                                $("#updateHandler").show();
                            
                            }
                        },
                        error: function(error) {
                            // Kesalahan dalam permintaan
                            console.log(error)
                        }
                    });
            }
        getData()
       $('#submitHandler').click(function(){
        var nik = $("#nik").val();
        var nama_lengkap = $("#namalengkap").val();
        var email = $("#email").val();
        //    var provinsi;
        var status = $('#status').val();
        var jenis_kelamin = $("#jenis_kelamin").val();
        var alamat = $("#alamat").val();
        var agama = $("#agama").val();
        var telepon = $("#notelepon").val();
        var tempat_lahir = $("#tempatLahir").val();
        var tanggallahir = $("#tanggalLahir").val();
        var dusun = $("#dusun").val();
        var rtrw = $("#rtrw").val();
        var provinsi = $('#provinsi :selected').text();
        var kecamatan = $('#kecamatan :selected').text();
        var kabupaten = $('#kota :selected').text();
        var kelurahan = $('#kelurahan :selected').text();

        data={
            nik:nik,
            nama_lengkap:nama_lengkap,
            email:email,
            jenis_kelamin:jenis_kelamin,
            alamat:alamat,
            agama:agama,
            no_telepon:telepon,
            tempat_lahir:tempat_lahir,
            tanggal_lahir:tanggallahir,
            dusun:dusun,
            rt_rw:rtrw,
            provinsi:provinsi,
            kecamatan:kecamatan,
            kota:kabupaten,
            kelurahan:kelurahan,
            status:status,
            id_user:'{{Auth::user()->id}}'

        }

        console.log(data)

        $.ajax({
                url: '/dashboard/akun/{{Auth::user()->id}}/biodata',
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
            });
            getData()
        });

        $('#updateHandler').click(function(){
            var nik = $("#nik").val();
        var nama_lengkap = $("#namalengkap").val();
        var email = $("#email").val();
        //    var provinsi;
        var status = $('#status').val();
        var jenis_kelamin = $("#jenis_kelamin").val();
        var alamat = $("#alamat").val();
        var agama = $("#agama").val();
        var telepon = $("#notelepon").val();
        var tempat_lahir = $("#tempatLahir").val();
        var tanggallahir = $("#tanggalLahir").val();
        var dusun = $("#dusun").val();
        var rtrw = $("#rtrw").val();
        var provinsi = $('#provinsi :selected').text();
        var kecamatan = $('#kecamatan :selected').text();
        var kabupaten = $('#kota :selected').text();
        var kelurahan = $('#kelurahan :selected').text();

        data={
            nik:nik,
            nama_lengkap:nama_lengkap,
            email:email,
            jenis_kelamin:jenis_kelamin,
            alamat:alamat,
            agama:agama,
            no_telepon:telepon,
            tempat_lahir:tempat_lahir,
            tanggal_lahir:tanggallahir,
            dusun:dusun,
            rt_rw:rtrw,
            provinsi:provinsi,
            kecamatan:kecamatan,
            kota:kabupaten,
            kelurahan:kelurahan,
            status:status,
            id_user:'{{Auth::user()->id}}'

        }

        console.log(data)

        $.ajax({
                url: '/dashboard/akun/{{Auth::user()->id}}/biodata',
                type: 'put',
                data: {
                    ...data,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // penanganan sukses
                    console.log(response)
                    Swal.fire({
                        title: 'Good job!',
                        text: 'Data Berhasil diupdate',
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                },
                error: function(error) {
                    // penanganan kesalahan
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal Update server Error',
                        icon: 'error',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                }
            });
            getData()
        })

        })
    </script>
</div>