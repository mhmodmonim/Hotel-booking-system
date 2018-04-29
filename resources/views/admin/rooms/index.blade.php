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
                    <a href="{{route('rooms.create')}}" class="btn btn-primary btn-block">Add New Room</a>
                </div>
            </div>

        </div>
    </div>

            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Number</th>
                    <th>capacity</th>
                    <th>price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
            </table>

                <script>
                     $(function() {
                        $('#users-table').on('click', '.delete', function (){
                            var buttonId=$(this).prop('id');
                            $.ajax({
                                'url': '{{ route("rooms.delete") }}' ,
                                'data':{ 'id':buttonId , '_token':'{{ csrf_token()}}' }  ,
                                 'method' : 'POST' ,
                                 'success':function(res){
                                     console.log(res.deleteStatus);
                                     if(res.deleteStatus){
                                        $('#'+buttonId).parents('tr').remove();
                                     }else{
                                         alert('This room  has reversation ');
                                     }
                                 }
                            });
                        });
                        $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{route('roomsData')}}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'number', name: 'number ' },
                                { data: 'capacity', name: 'capacity' },
                                { data: 'price', name: 'price' },
                                {
                                    orderable :false,
                                    searchable : false,
                                    render : function(data,type,row){
                                        //check in console what the row will look like
                                        console.log(row);
                                        //here am just passing a hash to the route helper function and will be replaced with the real id from javascript part
                                        var mockedEditRoute = '{{route('rooms.edit','#replaceMeWithUserId')}}'
                                        //here i replaced the hashed string with real id
                                        var realEditRoute= mockedEditRoute.replace('#replaceMeWithUserId',row.id);
                                        //then here i returned the real url with id
                                        return "<a href='"+realEditRoute+"' class='btn btn-primary'> Edit </a>"
                                    }
                                },
                                {
                                    orderable :false,
                                    searchable : false,
                                    render : function(data,type,row){
                                        return "<button class='btn btn-danger delete' onclick='return confirm('Are you sure you want to delete this item?');' id='"+row.id+"'> Delete </button>"
                                    }
                                }
                            ]
                        });
                    });
                </script>
@endsection