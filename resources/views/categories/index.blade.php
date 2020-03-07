@extends('layouts.app')

@section('header')
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1>
                <i class="fas fa-folder"></i> Categories</h1>
            </div>
        </div>
        </div>
    </header>
@endsection


@section('content')

    <section id="categories">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Categories</h4>
                        </div>
                        @if ($categories->count()>0)
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Posts</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <img src="{{asset("storage/$category->image")}}" width="60" alt="">
                                            </td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                {{$category->posts->count()}}
                                            </td>

                                            <td>
                                                View
                                            </td>

                                            <td>
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger btn-sm"  onclick="handleDelete({{$category->id}})" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <h3>No Categories</h3>
                        @endif


                        <form action="" method="POST" id="deleteCategory">

                            @csrf
                            @method('DELETE')

                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Catagory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Are You Sure To Delete?</p>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">No Go Back</button>
                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                    </div>
                                </div>
                                </div>
                            </div>



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        function handleDelete(id){

            var form = document.getElementById('deleteCategory')
            form.action='/category/'+id

        }

    </script>
@endsection
