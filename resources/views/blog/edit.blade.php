@extends('layouts')
@section('title', 'Mettre a jour')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one ">
                @lang('lang.editBlog_title')
            </h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                  
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $blogPost->title}}">
                        </div>
                        <div class="control-group col-12">
                            <label for="title_fr">Titre-fr</label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{ $blogPost->title_fr}}">
                        </div>
                        
                        
                        <div class="control-group col-12">
                            <label for="blog">Article</label>
                            <textarea name="blog" id="blog" class="form-control">{{ $blogPost->blog }}</textarea>
                        </div>
                           
                        <div class="control-group col-12">
                            <label for="blog_fr">Article-fr</label>
                            <textarea name="blog_fr" id="blog_fr" class="form-control">{{ $blogPost->blog_fr }}</textarea>
                        </div>
                        
                        
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('lang.editBtn')" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection