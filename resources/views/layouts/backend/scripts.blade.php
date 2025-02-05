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

@if(Request::path() == "backend-pengguna-murid" || Request::path() == "backend-kelas")
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

@if(Request::path() == "murid-ajar")
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