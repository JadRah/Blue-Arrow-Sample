@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Notes ') }}</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/UpdateNote/{{ $note->id }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="{{ $note->content }}" required autocomplete="content" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Note Type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="type" name="type" required focus>
                                    <option value="{{$note->type}}">Please select Type : Now ( {{$note->type}} )</option>
                                    <option value="Urgent">Urgent</option>
                                    <option value="Normal">Normal</option>
                                    <option value="On Date">On Date</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Note Type" class="col-md-4 col-form-label text-md-end">{{ __('publishing') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="publishing" name="publishing" required focus>
                                    @if( $note->publishing == 1)
                                    <option value="1" >Please select Publishing Properties : Now ( Public )</option>
                                    @else
                                    <option value="0" >Please select Publishing Properties : Now ( Privte )</option>
                                    @endif
                                    <option value="1">Public</option>
                                    <option value="0">Privte</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 text-center">
                            <div class="form-group">
                                <strong>New Image: </strong>
                                <input type="file" name="img" class="col-md-4 col-form-label text-md-end" placeholder="image">
                                <img src="/image/{{ $note->img }}" width="75px" height="75px">
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection