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
                           <a href="{{route('Receptionists.create')}}" class="btn btn-primary btn-block">Add New Receptionist</a>
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
                    <th>Created At</th>
                    @if($loginAdminRole == 'Admin')
                    <th>manager name </th>
                    @endif
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Ban</th>
                </tr>
                </thead>
            </table>

                <script>
                    $(function() {
                        $("#users-table").dataTable().fnDestroy();
                        // Delete action with ajax
                        $('#users-table').on('click', '.delete', function (){
                            var res=  confirm("Are you sure?");
                             if(res){
                            var buttonId=$(this).prop('id');
                            $.ajax({
                                'url': '{{ route("Receptionists.delete") }}' ,
                                'data':{ 'id':buttonId , '_token':'{{ csrf_token()}}' }  ,
                                 'method' : 'POST' ,
                                 'success':function(res){
                                    $('#'+buttonId).parents('tr').remove();
                                 }
                            });
                             }
                        });
                        // Ban Action with Ajax
                        $('#users-table').on('click', '.Ban', function (){
                                var buttonId=$(this).prop('id');
                            $.ajax({
                                'url': '{{ route("Receptionists.ban") }}' ,
                                'data':{ 'id':buttonId , '_token':'{{ csrf_token()}}' }  ,
                                 'method' : 'POST',
                                 'success':function(res){  
                                     console.log("success")
                                     var btnBan =$('#'+buttonId+'.Ban');
                                     if(res.statusBan){
                                         $(btnBan).html("Ban")
                                     }else{
                                        $(btnBan).html("unBan")
                                     }
                                 }
                            });
                             
                           
                        });

                        $("#users-table").dataTable().fnDestroy();
                        $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            select: true,
                            ajax: '{{route('ReceptionistsData')}}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'name' },
                                { data: 'email', name: 'email' },
                                { data: 'created_at', name: 'created_at' },
                            <?php if($loginAdminRole == 'Admin'): ?>
                                { data: 'employee.name', name: 'employee.name' },
                            <?php endif ?>

                                {
                                    orderable :false,
                                    searchable : false,
                                    render : function(data,type,row){
                                        //check in console what the row will look like
                                        //console.log(row);
                                        //here am just passing a hash to the route helper function and will be replaced with the real id from javascript part
                                        var mockedEditRoute = '{{route('Receptionists.edit','#replaceMeWithUserId')}}'
                                        //here i replaced the hashed string with real id
                                        var realEditRoute= mockedEditRoute.replace('#replaceMeWithUserId',row.id);
                                        //then here i returned the real url with id
                                        <?php if($loginAdminRole == 'Receptionist') : ?>
                                                if(row.id==   <?= $loginAdminId ?>)
                                                return "<a href='"+realEditRoute+"' class='btn btn-primary' id="+row.id+" > Edit </a>"
                                                else
                                                 return "No action"; 
                                        <?php else:   ?>          
                                                return "<a href='"+realEditRoute+"' class='btn btn-primary' id="+row.id+" > Edit </a>"
                                        <?php endif   ?>
                                    }
                                },
                                {
                                    orderable :false,
                                    searchable : false,
                                    render : function(data,type,row){
                                        <?php if($loginAdminRole == 'Receptionist') : ?>
                                                if(row.id==   <?= $loginAdminId ?>)
                                                    return "<button  class='btn btn-danger delete' id="+row.id+"> Delete </button>"
                                                else
                                                    return "No action";  
                                        <?php else:  ?>
                                              return "<button  class='btn btn-danger delete' id="+row.id+"> Delete </button>"
                                        <?php endif   ?>
                                    }
                                },{
                                    orderable :false,
                                    searchable : false,
                                    render : function(data,type,row){
                                        <?php if($loginAdminRole == 'Receptionist') : ?>
                                                    if(row.id==   <?= $loginAdminId ?>)
                                                        if(row.banned_at){
                                                                return "<button class='btn btn-danger Ban' id="+row.id+"> unBan </button>"                                        
                                                            }else{
                                                                return "<button class='btn btn-danger Ban' id="+row.id+"> Ban </button>"                                        
                                                            }
                                                    else
                                                    return "<div>No action<div>";  
                                        <?php else: ?>
                                        if(row.banned_at){
                                                return "<button class='btn btn-danger Ban' id="+row.id+"> unBan </button>"                                        
                                        }else{
                                                return "<button class='btn btn-danger Ban' id="+row.id+"> Ban </button>"                                        
                                                            }
                                        <?php endif   ?>
                                    }
                                }
                            ]
                        });
                       
                    });
                </script>
@endsection