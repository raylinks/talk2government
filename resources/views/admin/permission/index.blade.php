@extends('layouts.admin')
@section('title')
<a href="{{ route('role.create') }}"  class="btn btn-success waves-effect waves-light">Add Role <i class="mdi mdi-plus-circle-outline"></i></a><br>
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
                                <a href="/admin/users" aria-expanded="false" class="nav-link ">
                                    User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/roles"  aria-expanded="true" class="nav-link">
                                    Roles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/priviledges" aria-expanded="false" class="nav-link active">
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
                                <th data-priority="2">Name</th>
                                <th data-priority="3">Description</th>
                                {{-- <th></th> --}}
                                {{-- <th></th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->description}}</td>
                                    </tr>
                                    @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 































    
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