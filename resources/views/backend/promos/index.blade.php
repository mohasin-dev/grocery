@extends('backend.layouts.app')
@section('title', 'Promos')

@push('styles')
<style>
    #promos_previous {
        padding-right: 57px!important;
    }
    table tbody tr td {
        font-size: 14px!important;
        color: #212527!important;
    }
    table tbody tr td a {
        color: #884FFB;
        font-size: 18px;
    }
</style>
@endpush
@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">promos</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('admin.promos.create') }}" class="btn_1">Add New</a>
                                </div>
                            </div>

                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="promos">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Code</th>
                                            <th>Used</th>
                                            <th>Limit</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
    function deletePromo(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                  event.preventDefault();
                  document.getElementById('delete-form-'+id).submit();
              }
            })
    }
</script>

<script>
    // Banner Status Change
    function ChangePromoStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#promoStatus-' + id).data('href');
                }
            });
        }
</script>

<script>
    $(document).ready(function () {
        $('#promos').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.allpromos') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "title" },
                { "data": "type" },
                { "data": "code" },
                { "data": "used" },
                { "data": "limit" },
                { "data": "status" },
                { "data": "created_at" },
                { "data": "actions" }
            ]
        });
    });
</script>
@endpush
