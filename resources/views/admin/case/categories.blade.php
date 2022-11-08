@extends('layouts.admin')

@section('title')
    Case Categories
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Categories</h1>
        <div class="row" class="d-flex justify-content-between">
            <div class="col-6">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Case</li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered"> Add
                    New</button>
            </div>
        </div>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Case Categories</h5>

                    @if (\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ \Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{ \Session::forget('success') }}
                    @if (\Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            {{ \Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-secondary btn-sm"> Edit</a>
                                            &nbsp;
                                            <a href="" class="btn btn-danger btn-sm"> Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3"> Sorry No Case Category Yet </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </div>
        {{-- modal --}}
        <div class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Case Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('categories.save')}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-12">
                                    <label for="name"> Name: </label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>


                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- End Vertically centered Modal-->
    </section>
@endsection
