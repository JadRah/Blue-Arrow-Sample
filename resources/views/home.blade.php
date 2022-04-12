@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Notes List ') }}
                    
                        <button type="button" class="btn btn-info btn-sm" onclick="window.location='/generate-pdf'">
                        Generate report
                </div>

                <div class="card-header">

                    <div id="demo_info" class="box"></div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Content</th>
                                <th>Type</th>
                                <th>Publishing</th>
                                <th>image</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $key => $ain)
                            <tr>
                                <td>{{ $ain->content }} </td>
                                <td>{{ $ain->type }} </td>
                                @if ( $ain->publishing == 1 ) <td> Public </td>
                                @else <td>Privte </td> @endif

                                <td> <img src="/image/{{ $ain->img }}" width="50px" height="50px"> </td>
                                <td> <button type="button" class="btn btn-primary btn-sm" onclick="window.location='/EditNotes/{{ $ain->id }}'"> Edit </td>
                                <td> <button type="button" class="btn btn-danger btn-sm" onclick="window.location='/softdelete/{{ $ain->id }}'"> Delete </td>


                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-header">
                    <button type="button" class="btn btn-success btn-sm" onclick="window.location='/CreateNotes'">
                        Add New Note
                </div>



            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js"> </script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>