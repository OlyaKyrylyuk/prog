@extends('layouts.app')

@section('content')
    <div>Chrome {{$chrome}}    Opera {{$opera}}     Firefox {{$firefox}}</div>
    {!! Form::submit('Add Category',['class'=>'btn btn-success','data-toggle'=>'modal', 'data-target'=>'#addCategory']) !!}

        <table class="table table-striped ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)

                <tr>

                    <td>{{ $category->id }}</td>
                    <td>{{$category->name}}</td>
                    <td>{{ $category->description }}</td>
                    <td>{!! Form::open(['url'=>'categories/edit/'.$category->id]) !!}
                        {{method_field('GET')}}
                        {!! Form::submit('Edit',['class'=>'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {{method_field('POST')}}
                        {!! Form::open(['url'=>'categories/delete/'.$category->id]) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    </td>
                    <td>{!! Form::open(['url'=>'categories/posts/'.$category->id]) !!}
                        {{method_field('GET')}}
                        {!! Form::submit('More..',['class'=>'btn btn-primary  pull-right']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    </div>
    <!-- Modal add -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel">
        <form action="/categories/create" method = "post" id="frm-insert">
            <input type="hidden" name="_token" value="ssdfdsfsdfsdfs32r23442">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="addCategoryLabel">Adding new category</h4>

                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        </div>

                    </div>

                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">

                            {!! Form::label('name','Name of category:')  !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}

                        </div>

                    </div>

                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">

                            {!! Form::label('description','Description:')  !!}
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}

                        </div>

                    </div>


                    <div class="modal-footer">
                        {{csrf_field()}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id = "save" class="btn btn-primary">Save</button>

                    </div>

                </div>

            </div>
        </form>
    </div>
    <!-- Modal edit-->
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel">
        <form action="/categories/edit" method = "post" id="frm-edit">
            <script>$data = $(this).attr('data-id')</script>
            <input type="hidden" name="data" value="$id">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <input type="hidden" id="us_id" value=""/>
                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="editCategoryLabel">Editing new category</h4>

                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        </div>

                    </div>

                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">

                            {!! Form::label('name','Name of category:')  !!}
                            {!! Form::text('name',null,['class'=>'form-control','id'=>'editname']) !!}
                        </div>

                    </div>

                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">

                            {!! Form::label('description','Description:')  !!}
                            {!! Form::textarea('description',null,['class'=>'form-control','id'=>'editdescription']) !!}

                        </div>

                    </div>


                    <div class="modal-footer">
                        {{csrf_field()}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id = "edit" class="btn btn-primary">Save</button>

                    </div>

                </div>
            </div>
        </form>
    </div>
    <!-- Modal delete-->
    <div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryLabel">
        <form action="/categories/delete" method = "delete" id="frm-delete">
            <input type="hidden" name="_token" value="ssdfdsfsdfsdfs32r23442">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="deleteCategoryLabel">Deleting new category</h4>

                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        </div>

                    </div>

                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">

                            {!! Form::label('id','Id:')  !!}
                            {!! Form::text('id',null,['class'=>'form-control']) !!}

                        </div>

                    </div>



                    <div class="modal-footer">
                        {{csrf_field()}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id = "delete" class="btn btn-primary">Delete</button>

                    </div>

                </div>

            </div>
        </form>
    </div>

    <script>
        $(function() {
            $.ajaxSetup({
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $('#save').on('click',function(){
                var name = $('#name').val();
                var description = $('#description').val();
                $.ajax({
                    url:  'categories/create',
                    method: "POST",
                    data:{ name:name,description:description, "_token": $('#token').val()},
                    dataType: 'html',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function (data) {

                        $('#addCategory').modal('hide');

                        console.log(name);
                        window.location.reload();
                    },

                    error: function (msg) {

                        alert('Ошибка');

                    }

                });

            });

        })

    </script>

@endsection

