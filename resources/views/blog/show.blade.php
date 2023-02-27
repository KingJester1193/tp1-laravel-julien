@extends('layouts')
@section('title', 'Blog')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-sm">@lang('lang.backBtn')</a>
            <h4 class="display-one mt-2">
                {{ $blogPost->title }}
            </h4>
            <hr>
            <p> {!! $blogPost->blog !!}</p>
            <p><strong>@lang('lang.author'):</strong> {{ $blogPost->blogHasUser->name}}</p>
            <hr>
        </div>
    </div>

    @if(Auth::user()->id == $blogPost->user_id)
    <div class="row text-center mb-2">
        <div class="col-6">
            <a href="{{route('blog.edit', $blogPost->id)}}" class="btn btn-success">@lang('lang.editBtn')</a>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            @lang('lang.deleteBtn')
            </button>           
        </div>
    </div>
    @endif


</div>



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.confirm_msg_del')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.closeBtn_modalDel')</button>
        <form action="{{ route('blog.edit', $blogPost->id)}}" method="post">
                @csrf
                @method('delete')
            <input type="submit" class="btn btn-danger" value="@lang('lang.deleteBtn')">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
