@extends('admin.layout.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/admin/assets/css/lib/chosen/chosen.css') }}">
  <script src="{{ asset('/public/admin/assets/js/lib/chosen/chosen.jquery.js') }}"></script>
  @push('javascript')
  <script type="text/javascript">

      $(document).ready(function() {
          $('.myselect').chosen({
              disable_search_threshold: 10,
              no_results_text: "Oops, nothing found!",
              width: "100%"
          });

           $('textarea.my-editor').ckeditor({
            filebrowserImageBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
        
      });
     
  </script>
@endpush
<div class="row">
    <div class="col-md-12">
        <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Post Create Page</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                              @if(count($errors)>0)
                              <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li> {{$error}}   </li>
                                    @endforeach
                                </ul>
                                </div>
                                @endif
                                    {{
                                        Form::model($post,['route'=>['post-update',$post->id],'method'=>'PUT','enctype'=>'multipart/form-data'])
                                    }}
                                
                                  <!--<form action="" method="post" novalidate="novalidate"-->
                                    
                            <div class="form-group">
                            {{Form::label('title', 'Title', ['class' => 'control-label mb-1'])}}
                            {{ Form::text('title',null,['class'=>'form-control','id'=>'title']) }}
                            </div>
                            <div class="form-group">
                            {{Form::label('category', 'category', ['class' => 'control-label mb-1'])}}
                            {{ Form::select('category_id',$categories,null,['class'=>'myselect form-control','data-placeholder'=>'Select Category'] )  }}
                            </div>
                            <div class="form-group">
                            {{Form::label('short_description', 'Short Description', ['class' => 'control-label mb-1'])}}
                            {{ Form::textarea('short_description',null,['class'=>'form-control my-editor','id'=>'short_description']) }}
                            </div>
                            <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'control-label mb-1'])}}
                            {{ Form::textArea('description',null,['class'=>'form-control','id'=>'description']) }}
                            </div>
                            <div class="form-group">
                            {{Form::label('image', 'Image', ['class' => 'control-label mb-1'])}}
                            {{ Form::file('image',['class'=>'form-control']) }}
                            </div>

                                                        
                                      <div>
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-lock fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount" >Submit</span>
                                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                                          </button>
                                      </div>
                                  <!--/form-->
                                {{ Form::close() }}
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->
    </div>
</div>
                    
@endsection