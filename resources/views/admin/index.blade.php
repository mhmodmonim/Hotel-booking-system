@extends('admin.admin_template')


@section('content')

<h2>Welcome to my test content</h2>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin Area
                <small>Control the whole website</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
        <table class="table table-bordered table-striped table-hover" id="data-table">
             <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>mobile</th>
                    <th>Created At</th>
                        @can('edit_users', 'delete_users')
                            <th class="text-center">Actions</th>
                        @endcan
                </tr>
            </thead>
</table>
           

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
@endsection