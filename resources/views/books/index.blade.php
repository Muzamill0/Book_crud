@extends('layout.main')

@section('title', 'Admin | Books')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-6">
                    <h4>Books</h4>
                </div>
                <div class="col-6 text-end">
                    <a class=" btn btn-primary" href="{{ route('book.create') }}"><i class="fas fa-user-plus"></i> Add Book</a>
                </div>
            </div>
        </div>
        <table class="table table-hover mt-3" id="table">
            <thead>
                @if (count($books) > 0)
                    <tr>
                        <th scope="col">S no:</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Edition</th>
                        <th scope="col">No of Pages</th>
                        <th scope="col">Action</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td scope="row"> {{ $loop->iteration }}</td>
                        <td scope="row"> {{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>{{ $book->no_of_pages }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('book.edit', $book) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('book.delete', $book) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <p>No book Found</p>

            @endif
        </table>
    </div>
@endsection
