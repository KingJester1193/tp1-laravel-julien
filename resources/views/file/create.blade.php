@extends('layouts')
@section('title', 'Ajouter')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one ">
                @lang('lang.add_file')
            </h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post" enctype="multipart/form-data">
                    @csrf
            
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="name">Title</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="control-group col-12">
                            <label for="name_fr">Titre-fr </label>
                            <input type="text" id="name_fr" name="name_fr" class="form-control">
                        </div>
                        <div class="control-group col-12">
                            <input type="file" id="file" name="file" class="form-control">
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