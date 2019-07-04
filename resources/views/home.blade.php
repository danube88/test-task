@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div class="content-table">
        <h4>Employee list</h4>
        <table id="table" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Date of employment</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <!--<th>Action</th>-->
                </tr>
            </thead>
        </table>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/my_style.css">
@stop

@section('js')
    <script>
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                cache: false,
                ajax: '{!! route('employeeList') !!}',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                columns: [
                    { data: 'photo', name: 'photo',
                      render: function(data, type, row) {
                          return '<img src="'+data+{{--/*'?'+Math.random()+*/--}}'" width="30px" height="30px" style="border-radius: 50%" />';
                        }, orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'position', name: 'position' },
                    { data: 'employment_date', name: 'employment_date' },
                    { data: 'phone', name: 'phone' },
                    { data: 'email', name: 'email' },
                    { data: 'salary', name: 'salary' },
                    /*{ data: 'action', name: 'action', orderable: false, searchable: false },*/
                ],
                order: [1,'asc'],
            });
        });
    </script>
@stop
