<!-- BEGIN: Vendor JS-->
<script src="{{asset('Assets/Backend/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('Assets/Backend/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('Assets/Backend/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('Assets/Backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('Assets/Backend/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('Assets/Backend/js/scripts/tables/table-datatables-advanced.js')}}"></script>
<script src="{{asset('Assets/Backend/js/scripts/forms/form-select2.js')}}"></script>
<script src="{{asset('Assets/Backend/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<script src="{{asset('Assets/Backend/js/scripts/components/components-modals.js')}}"></script>
<!-- END: Page JS-->

@if(Request::path() == "home")
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
       let detectRole = document.getElementById('detectRole');

       if(detectRole.value == "Admin"){
        fetch("/visitors")
            .then(response => response.json())
            .then(data => {
                let dates = data.map(item => item.date);
                let counts = data.map(item => item.count);
    
                let ctx = document.getElementById("visitorChart").getContext("2d");
                new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: dates,
                        datasets: [{
                            label: "Jumlah Pengunjung",
                            data: counts,
                            borderColor: "blue",
                            borderWidth: 2,
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: "Tanggal" } },
                            y: { title: { display: true, text: "Jumlah Pengunjung" }, beginAtZero: true }
                        }
                    }
                });
            });
        }else if(detectRole.value == "Guru"){
            fetch("/totalMuridAjar")
            .then(response => response.json())
            .then(data => {
                let jumlahSemuaMurid = data.map(item => item.jumlah_semua_murid);
                let jumlahLakiLaki = data.map(item => item.jumlah_laki_laki);
                let jumlahPerempuan = data.map(item => item.jumlah_perempuan);

                let ctx = document.getElementById("muridChart").getContext("2d");

                new Chart(ctx, {
                    type: "pie",
                    data: {
                        labels: ["Jumlah Semua Murid", "Jumlah Laki-Laki", "Jumlah Perempuan"],
                        datasets: [{
                            data: [jumlahSemuaMurid, jumlahLakiLaki, jumlahPerempuan],
                            backgroundColor: ["#36A2EB", "#4CAF50", "#FF6384"],
                            borderColor: ["#2980B9", "#388E3C", "#D32F2F"],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: "top"
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let value = tooltipItem.raw;
                                        return ` ${value} Murid`;
                                    }
                                }
                            }
                        }
                    }
                });
            })
        }

            function updateClock() {
          
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let seconds = now.getSeconds().toString().padStart(2, '0');

            let fullSecs = `${hours}:${minutes}:${seconds}`;

            document.getElementById('clock').textContent = fullSecs;
        }

        setInterval(updateClock, 1000); 
        updateClock();
    });
</script>
@endif


@if(Request::path() == "absensi")
<script>
    function btnAbsenModal(id){
        let murid_id = document.getElementById('murid_id');
        murid_id.value = id;
    }

    function btnUpdateAbsenModal(id, status, keterangan) {
        let statusOptions = document.querySelectorAll('.statusOption');
        let keteranganValue = document.querySelector('.keterangan');
        let murid_id_old = document.getElementById('murid_id_old');

        statusOptions.forEach(option => {
            if (option.value === status) {
                option.selected = true;
            }
        });

        keteranganValue.value = keterangan;
        murid_id_old.value = id;
    }
   
</script>

@elseif(Request::path() == "penilaian")
<script>
    function btnPenilaianModal(id){
        let murid_id = document.getElementById('murid_id');
        murid_id.value = id;
    }

    function btnUpdatePenilaianModal(id, kategori, nilai, keterangan) {
        let kategoriOptions = document.querySelectorAll('.kategoriOption');
        let nilaiValue = document.querySelector('.nilai');
        let keteranganValue = document.querySelector('.keterangan');
        let murid_id_old = document.getElementById('murid_id_old');

        kategoriOptions.forEach(option => {
            if (option.value === kategori) {
                option.selected = true;
            }
        });

        nilaiValue.value = nilai;
        keteranganValue.value = keterangan;
        murid_id_old.value = id;
    }
   
</script>
@endif

@if(Request::path() == "backend-pengguna-murid" || Request::path() == "backend-kelas" || Request::path() ==
"backend-mata-pelajaran")
<script>
    // Menangani perubahan pada input file dan otomatis submit form
    document.getElementById('fileInput').addEventListener('change', function() {
        document.getElementById('importForm').submit();
    });
</script>
@endif

@php
$currentUrl = Request::url();
@endphp

@if(Request::path() == "murid-ajar" || Request::path() == "absensi" || Request::path() == "penilaian")
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#table');
</script>
@endif

@if(Request::path() == "backend-pengguna-pengajar/create" || Request::path() == "backend-pengguna-pengajar" ||
strpos($currentUrl, 'backend-pengguna-pengajar') != false)
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#table');

    let kelasValue = document.querySelector('.kelasValue');
    let namaKelasValue = document.getElementById('nama_kelas');
    let kelasKe = document.getElementById('kelas-ke');

    function pilihKelas(kelas, nama_kelas){
        kelasValue.value = kelas;
        namaKelasValue.value = nama_kelas;

        if(kelasKe){
            kelasKe.innerHTML = kelas;
        }

        $('#pilihKelas').modal('hide');
        $('.modal-backdrop').remove();

    }
</script>
@endif

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>