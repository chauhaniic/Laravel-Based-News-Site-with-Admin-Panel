@extends('admin.layout.master')
@section('content')

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $page_name}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">

        @if($message=Session::get('success'))
        <div class="alert alert-success">
            {{ $message}}
        </div>
        @elseif($message=Session::get('danger'))
        <div class="alert alert-danger">
            {{ $message}}
        </div>
        @endif
                       
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                      <tr>
                        <td> {{++$i}} </td>
                        <td> {{$row->name}} </td>
                        <td> {{ $row->post->title }} </td>
                        <td> {{$row->comment}} </td>
                        <td> 
                        {{ Form::open(['method'=>'PUT','url'=>['/back/comment/status/'.$row->id],'style'=>'display:inline' ]) }} 
                        @if($row->status === 1)
                            {{ Form::submit('UnPublish',['class'=>'btn btn-danger']) }}
                        @else
                            {{ Form::submit('Publish',['class'=>'btn btn-success']) }}
                        @endif
                        {{ Form::close() }}
                        </td>
                        <td> 
                            @permission(['Post Update','All'])
                            <a href="{{ url('/back/comment/reply/'.$row->post_id) }} " class="btn btn-primary">Reply</a>
                            @endpermission
                           
                            

                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    <script src="{{ asset('public/admin/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>
    
        <script src="{{ asset('public/admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

@endsection