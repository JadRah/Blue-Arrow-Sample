@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Notes ') }}</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/AddNotes">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content"
                                        value="{{ old('content') }}" required autocomplete="content" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Note Type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="type" name="type" required focus>
                                        <option value="" disabled selected>Please select Type</option>
                                        <option value="Urgent">Urgent</option>
                                        <option value="Normal">Normal</option>
                                        <option value="On Date">On Date</option>
                                    </select>
                                </div>
                            </div>


                            
                            <div class="row mb-3">
                                <label for="Note Type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('publishing') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="publishing" name="publishing" required focus>
                                        <option value="" disabled selected>Please select Publishing Properties</option>
                                        <option value="1">Public</option>
                                        <option value="0">Privte</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3 text-center">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="col-md-4 col-form-label text-md-end"
                                        placeholder="image">
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
