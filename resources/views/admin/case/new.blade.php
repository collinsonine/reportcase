@extends('layouts.admin')

@section('title')
    New Case
@endsection

@section('content')
<div class="pagetitle">
    <h1>New Case</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Case</li>
        <li class="breadcrumb-item active">New</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">



        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Case</h5>
            <form class="insform" action="{{route('case.save')}}" method="post" enctype="multipart/form-data">
                @csrf
            <!-- Quill Editor Full -->
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="name"> Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="Case Description"> Case ID</label>
                        <input type="text" name="case_id" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="Case Description"> Case Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="category"> Case Category</label>
                        <select name="casecategory" id="" class="form-control">
                            @foreach ($categories as $cate)
                                <option value="{{$cate->name}}">{{$cate->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="image"> Image </label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
            </div>
            <div class="p-4">
                <!-- The toolbar will be rendered in this container. -->
           <div id="toolbar-container"></div>
            <!-- This container will become the editable. -->
            <div id="editor" class="border">
                Case Description goes here
            </div>

            </div>
            <div class="p-4">


                <input type="hidden" name="instruction" class="form-control thisist" >
                <div class="d-grid">
                   <button class="btn btn-primary thisidhvb"> Save</button>
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
