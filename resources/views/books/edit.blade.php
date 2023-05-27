@extends('layout.main')

@section('title', 'Admin | Books')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-6">
                    <h4 class=" mt-3">Add Book</h4>
                </div>
                <div class="col-6 text-end">
                    <a class=" btn btn-primary mt-3" href="{{ route('books') }}"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-warning mt-2" role="alert">
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('failed'))
                <div class="alert alert-danger mt-2" role="alert">
                    {{ session()->get('failed') }}
                </div>
            @endif
            <form action="{{ route('book.edit', $book ) }}" method="POST" class=" p-3">
                @csrf
                <div class="col-md-12">
                    <label for="title" class="mt-2 ">Title</label>
                    <input class="form-control" type="text" id="title" name="title"
                        value="{{  old('tilte') ? old('tilte') : $book->title }}" placeholder="Enter book title">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="author" class="mt-2 ">Author</label>
                    <input class="form-control" type="text" id="author" name="author" value="{{  old('author') ? old('author') : $book->author }}"
                        placeholder="Enter book author name">
                    @error('author')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="edition" class="mt-2 ">Edition</label>
                    <input class="form-control" type="edition" id="edition" name="edition"
                        placeholder="Enter book edition" value="{{  old('edition') ? old('edition') : $book->edition }}">
                    @error('edition')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="no_of_pages" class="mt-2 ">No of Pages</label>
                    <input class="form-control" type="no_of_pages" id="no_of_pages" name="no_of_pages"
                        placeholder="Enter number of pages" value="{{  old('no_of_pages') ? old('no_of_pages') : $book->no_of_pages }}">
                    @error('no_of_pages')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>

    </div>

@endsection
