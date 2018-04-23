@extends('admin.admin_template')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Confirm</th>
                </tr>
                </thead>
                <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Confirm</th>
                        </tr>
                </tfoot>
            </table>


                <script>
                    // document.getElementById("btn").addEventListener("click",function(){
                    //     window.location.replace("add/id");
                    // });
                        $('#table').on('click', 'a.editor_remove', function (e) {
                            e.preventDefault();
                    
                            editor.remove( $(this).closest('tr'), {
                                title: 'Delete record',
                                message: 'Are you sure you wish to remove this record?',
                                buttons: 'Delete'
                            } );
                        } );

                    $(function() {
                        $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: 'http://laravel.local/admin/receptionists/show',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'name' },
                                { data: 'email', name: 'email' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'updated_at', name: 'updated_at' },
                                { data: 'confirm' , defaultContent : '<button id="btn"><a href="" class="editor_remove">Confirm</a></button>' }
                            ]
                        })
                    });
                </script>
                  
                        

@endsection