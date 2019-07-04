@extends('adminlte::page')

@section('content_header')
    <h1>Positions</h1>
@stop

@section('content')
    <div class="content-table">
        <h4>Position list</h4>
        <table id="table" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Salary</th>
                    <!--<th>Action</th>-->
                </tr>
            </thead>
        </table>
  </div>
@stop

@section('js')
    <script>
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                cache: false,
                ajax: '{!! route('positionList') !!}',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'salary', name: 'salary' },
                    /*{ data: 'action', name: 'action', orderable: false, searchable: false },*/
                ],
                order: [1,'desc'],
            });
        });
    </script>
@stop
