@extends('admin.layouts.master')

@section('title', 'Blog Category')

@section('content')

<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="col-6">Add Category</h4>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{ route('admin.page', ['slug' => 'prex-blogs']) }}">Blogs</a>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.add_category') }}" method="post">
            @csrf
            <div class="card-body">
                @for($i=0; $i<=5; $i++)
                <div class="row my-3">
                    @if(isset($categories) && isset($categories[$i]))
                    <input type="hidden" name="category_id[{{$i}}]" value="{{ $categories[$i]->id }}">
                    @endif
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">Name (English)</label>
                            <input type="text" class="form-control en_name" name="en_name[{{$i}}]" value="{{ isset($categories[$i]) ? $categories[$i]->en_name : '' }}">
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">Name (Japanese)</label>
                            <input type="text" class="form-control ja_name" name="ja_name[{{$i}}]" value="{{ isset($categories[$i]) ? $categories[$i]->ja_name : '' }}">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary mt-4" value="Submit">
            </div>
        </form>
    </div>
</div>

@endsection