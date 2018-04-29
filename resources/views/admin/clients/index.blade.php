@extends('admin.admin_template')
@section('content')


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <div class="continaer">
        <div class="row mt-5 mb-5">
            <div class="col-6">
                <div class="ml-5 ">
                    <a href="{{route('clients.create')}}" class="btn btn-primary btn-block">Add New Client</a>
                </div>
            </div>

        </div>
    </div>
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Manager Name</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Approve</th>
                </tr>
                </thead>
            </table>

                <script>
                    $(function() {
                        $("#users-table").dataTable().fnDestroy();
                        $('#users-table').on('click', '.destroy ', function (){
                            var val =confirm("are you sure?")
                            $('#'+buttonId).parents('tr').remove();
                            if(val){
                                $.ajax({
                                'url': '{{ route("clients.destroy") }}' ,
                                'data':{ 'id':buttonId , '_token':'{{ csrf_token()}}' }  ,
                                 'method' : 'POST' ,
                                 'success':function(res){
                                     console.log(res.deleteStatus);
                                 }
                            });
                            }  
                        });
                      
                        $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{route('clientsData')}}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'name' },
                                { data: 'email', name: 'email' },
                                { data: 'employee.name', name: 'employee.name' },
                                { data: 'created_at', name: 'created_at' },
                                {
                                    orderable :false,
                                    searchable : false,
                                    render : function(data,type,row){
                                        //check in console what the row will look like
                                        console.log(row);
                                        //here am just passing a hash to the route helper function and will be replaced with the real id from javascript part
                                        var mockedEditRoute = '{{route('clients.Edit','#replaceMeWithUserId')}}'
                                        //here i replaced the hashed string with real id
                                        var realEditRoute= mockedEditRoute.replace('#replaceMeWithUserId',row.id);
                                        //then here i returned the real url with id
                                        return "<a href='"+realEditRoute+"' class='btn btn-primary'> Edit </a>"
                                    }
                                },
                                {
                                    orderable :false,
                                    render : function(data,type,row){
                                        return "<button  class='btn btn-danger destroy'  id='"+row.id+"'> Delete </button>"
                                    }
                                },
                                {
                                    orderable :false,
                                    render : function(data,type,row){
                                        return "<button  class='btn btn-primary approve' id='"+row.id+"'> Approve </button>"
                                    }
                                },
                              
                            ],
                        });
                    });
                </script>
@endsection