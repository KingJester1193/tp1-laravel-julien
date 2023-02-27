@extends('layouts')
@section('title', 'Ajouter')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one ">
                @lang('lang.addBlog')
            </h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="control-group col-12">
                            <label for="title_fr">Titre-fr </label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control">
                        </div>
                        <div class="control-group col-12">

                            <label for="blog">Article</label>
                            <textarea name="blog" id="blog" class="form-control"></textarea>
                        </div>
                        <div class="control-group col-12">
                            <label for="blog_fr">Article-fr</label>
                            <textarea name="blog_fr" id="blog_fr" class="form-control"></textarea>
                        </div>                    
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('lang.addBtn')" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection