@extends('layouts
')
@section('title', 'File List')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one">
                @lang('lang.welcome'): {{Auth::user()->name}}
            </h1>
            <hr>
            <div class="row">
             
                <div class="col-md-4">
                    <a href="{{ route('file.create')}}" class="btn btn-outline-primary">
                        @lang('lang.add_file')
                    </a>
                </div>
            </div>
            <hr>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       @lang('lang.listFile')
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($files as $file)
                            <li><a href="{{ route('file.show', $file->id)}}">{{ $file->name }}</a> 
                            <a href="{{route('file.download', $file->id)}}"><svg id="Layer_1" class="svg_download" style="enable-background:new 0 0 1024 1024;" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M780,80H134.3C104.3,80,80,104.3,80,134.3v755.6c0,29.8,24.3,54.1,54.1,54.1h755.7  c29.9,0,54.1-24.3,54.1-54.1V249L780,80z M347,120h330v237.5c0,7.4-6.1,13.5-13.5,13.5h-303c-7.4,0-13.5-6.1-13.5-13.5V120z   M511.9,835.1c-95.2,0-172.7-77.5-172.7-172.7s77.5-172.7,172.7-172.7s172.7,77.5,172.7,172.7S607.2,835.1,511.9,835.1z" id="XMLID_121_" />
                                        <g id="XMLID_1_" />
                                        <g id="XMLID_2_" />
                                        <g id="XMLID_3_" />
                                        <g id="XMLID_4_" />
                                        <g id="XMLID_5_" />
                                    </svg></a></li>

                            @if(Auth::user()->id == $file->user_id)
                            <div class="row text-center mb-2">
                                <div class="col-6">
                                    <a href="{{route('file.edit', $file->id)}}" class="btn btn-success">@lang('lang.editBtn')</a>
                                </div>
                                <div class="col-6">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        @lang('lang.deleteBtn')
                                    </button>
                                </div>
                            </div>
                            @endif

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
                                            <form action="{{ route('file.edit', $file->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Effacer">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <p>@lang('lang.post_by'): {{$file->fileHasUser->name}}</p>
                            @empty
                            <li class="text-danger">@lang('lang.noFile_msg')</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center" style="width:100px;">
    {{$files}}
</div>


<!-- Modal -->




@endsection