@extends('layouts.admin')

@section('title')
    Edit News
@endsection

@section('content')
<div class="pagetitle">
    <h1>Edit News</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item">News</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">



        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit News</h5>
            <form class="insform" action="{{url('admin/news/update/'.$news->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <!-- Quill Editor Full -->
            <div class="row">


                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="Case Description"> News Title</label>
                        <input type="text" name="title" value="{{$news->title}}" class="form-control">
                    </div>
                </div>


            </div>
            <div class="p-4">
                <!-- The toolbar will be rendered in this container. -->
           <div id="toolbar-container"></div>
            <!-- This container will become the editable. -->
            <div id="editor" class="border">
                {!!$news->content!!}
            </div>

            </div>
            <div class="p-4">


                <input type="hidden" name="instruction" class="form-control thisist" >
                <div class="d-grid">
                   <button class="btn btn-primary thisidhvb"> Update</button>
                </div>

                </form>
            </div>

          </div>
        </div>


      </div>

    </div>
  </section>
@endsection
@section('script')
<script src="{{asset('admin/assets/js/new/ckeditor.js')}}"></script>
<script>
    DecoupledEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                const toolbarContainer = document.querySelector( '#toolbar-container' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );
            } )
            .catch( error => {
                console.error( error );
            } );
            $('#editor').blur(function (e) {
                e.preventDefault();
                $('.thisist').val($('#editor').html());
            });

            $('.thisidhvb').click(function (e) {
                e.preventDefault();
                $('.insform').submit();
            });
            $(document).ready(function () {
                $('.thisist').val($('#editor').html());
            });
     </script>
@endsection
