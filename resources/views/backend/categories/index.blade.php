@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breidcrumb')
<ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>

                                    <li class="breadcrumb-item"><a href="http://localhost:8000/admin/dashboard">Dashboard</a></li>
                                                <li class="breadcrumb-item active">User Management</li>
    </ol>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Categories Managemnet <small class="text-muted">All Categories</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create New"><i class="fas fa-plus-circle"></i></a>
</div>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                        <td>{{$category->title}}</td>
                        <td><a href="{{route('admin.categories.edit' , $category->id)}}"> <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button></a>
                        <a href="{{route('admin.categories.delete' , $category->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                   
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
