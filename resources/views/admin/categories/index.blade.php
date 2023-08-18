@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <input type="name" name="name"  id="name" class="form-control inline-block">
        </div>
            <div class="col">
                <button type="submit" class="btn btn-primary "><i class="fa-solid fa-plus me-2"></i>Add</button>
            </form>
        </div> 
        
    </div>
           
            <table class="table mt-4">
                <thead >
                    <tr class="table-warning">
                       
                        <th>#</th>
                        <th>NAME</th>
                        <th>COUNT</th>
                        <th>LAST UPDATE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach( $all_categories as $category)
                <tbody>
                    <tr>
                        <td></td>   
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name}}</td>
                        <td> {{ $category->categoryPost->count( ) }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                        <button type="button" class="btn btn-outline-warning ms-3 " data-bs-toggle="modal" data-bs-target="#update-modal-{{ $category->id }}"><i class="fa-solid fa-pencil text-warning "></i></button>   
                        @include('admin.categories.modal.edit')


                                    
                        <button type="button" class="btn btn-outline-danger ms-3 " data-bs-toggle="modal" data-bs-target="#category-modal-{{ $category->id }}"><i class="fa-solid fa-trash text-danger"></i>
                     </button>   
                           
                        </td>
                    </tr>
                   
                    @include('admin.categories.modal.status')
                    @endforeach
                    <tr class="table-bordered">
                        <td class="text-center p-0">
                            <span class="fw-bold">Uncategorized</span>
                            <br>
                            <p>hidden posts are not included.</p>
                        </td>
                        <td class="col-2">
                               {{ $uncategoized_count; }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
               
            </table>
       
    
@endsection