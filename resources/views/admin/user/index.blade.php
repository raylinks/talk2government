@extends('layouts.admin')
@section('title')
<a href="/admin/user/create"  class="btn btn-success waves-effect waves-light">Add User <i class="mdi mdi-plus-circle-outline"></i></a><br>

@endsection
@section('more_css')
 <link href="{{ asset('css/dataTables.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
 <link href="{{ asset('css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card-box">
                <ul class="nav nav-tabs tabs-bordered nav-justified">
                    <li class="nav-item">
                        <a href="/admin/users" aria-expanded="false" class="nav-link active">
                            User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/roles"  aria-expanded="true" class="nav-link">
                            Roles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/priviledges" aria-expanded="false" class="nav-link">
                            Priviledges
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="home-b2">
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">Matric Number</th>
                                <th data-priority="3">Name</th>
                                <th data-priority="4">Role</th>
                                <th></th>
                                {{-- <th></th> --}}
                            </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>14N02/019</td>
                                    <td>Emmanuel Tokson</td>
                                    <td>Fin sec</td>
                                    <td><a href="#" class="btn btn-danger waves-effect waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal2"> <i class="fa  fa-pencil m-r-5"></i> <span>Edit</span> </a>
                                    </td>
                                    {{-- <td><button class="btn btn-danger waves-effect waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal3"> <i class="fa   fa-trash m-r-5"></i> <span>Delete</span> </button></td> --}}
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- <div class="container mt-3">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" href="/admin/users">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/roles">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/priviledges">Priviledges</a>
            </li>
        </ul>
        <div class="my-card p-3">
            <a href="/admin/user/create" role="button" class="mt-2 mb-2 mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                Create user
            </a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">ID</th>
                        <th>Matric No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>14N02/019</td>
                        <td>Emmanuel Tokson</td>
                        <td>Fin sec</td>
                        <td><a href="#">Edit priviledges</a> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@stop
@section('more_js')
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/jszip.min.js')}}"></script>
<script src="{{ asset('js/pdfmake.min.js')}}"></script>
<script src="{{ asset('js/vfs_fonts.js')}}../plugins/datatables/"></script>
<script src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/dataTables.select.min.js')}}"></script>
<script src="{{ asset('js/jquery.core.js')}}"></script>
<script src="{{ asset('js/jquery.app.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });
        $('#key-table').DataTable({
            keys: true
        });
        $('#responsive-datatable').DataTable();
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });
        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection