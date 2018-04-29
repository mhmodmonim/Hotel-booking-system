@extends('admin.admin_template')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    

            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>PaidPrice</th>
                    <th>Client accompany number</th>
                    <th>Room number</th>
                    <th>Client paid price</th>
                </tr>
                </thead>
            </table>

                <script>
                    $(function() {
                        $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{route('clients.myreservation.dataTables')}}',
                            columns: [
                                { data: 'paidPrice', name: 'paidPrice' },
                                { data: 'clientAccompanyNumber', name: 'clientAccompanyNumber' },
                                { data: 'number', name: 'number' },
                                { data: 'name', name: 'name' },
                            ]
                        });
                    });
                </script>
     
    <br/>
    <br/> 
    <a href="http://laravel.local/admin/receptionists"><button class="btn btn-primary" >Return Back</button></a>

@endsection