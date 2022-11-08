@extends('layouts.admin')

@section('title')
    All News
@endsection
@section('content')
<div class="pagetitle">
        <h1>All Cases</h1>
        <div class="row" class="d-flex justify-content-between">
            <div class="col-6">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">News</li>
                        <li class="breadcrumb-item active">All News</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-primary btn-sm" href="{{route('news.new')}}"> Add
                    New</a>
            </div>
        </div>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All News</h5>

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
                                <th scope="col">SN</th>
                                <th scope="col">Title</th>
                                <th scope="col">News Content</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($news as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->content }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{url('/admin/news/edit/'.$data->id)}}" class="btn btn-secondary btn-sm"> Edit</a>
                                            &nbsp;
                                            <a href="{{url('/admin/news/delete/'.$data->id)}}" class="btn btn-danger btn-sm"> Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4"> Sorry No News Yet </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </div>

    </section>
@endsection

