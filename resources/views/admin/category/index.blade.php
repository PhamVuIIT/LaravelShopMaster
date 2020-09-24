@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])

        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @can('category-add')
                                <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
                            @endcan
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$category->id}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{route('categories.edit', ['id' => $category->id])}}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                <a data-url="{{route('categories.delete', ['id' => $category->id])}}"
                                                   class="btn btn-danger action_delete">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
        </div>

    </div>

@endsection



