@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Auth::check())
        <div class="col-md-11 add-btn-section">
            <a href="#" class="btn btn-info pull-right btn-add-todo" data-toggle="modal" data-target="#addTodoList">Add new todo list</a>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">List of Todo List</div>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($todo_lists as $val)
                        <tr>
                            <td>{{$val['name']}}</td>
                            <td>
                                <a href="/todo-mvc/todo-item/{{$val['id']}}">View Items</a> | 
                                <a class="btn-edit-todo" href="/todo-mvc/edit/{{$val['id']}}" data-todo_id="{{$val['id']}}" data-todo_name="{{$val['name']}}">Edit</a> | 
                                <a class="btn-delete-todo" href="/todo-mvc/delete/{{$val['id']}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
            </div>
            <a href="#" class="btn btn-info pull-right btn-add-todo" data-toggle="modal" data-target="#addTodoList">Add new todo list</a>
            <div class="pagination">
                {{$todo_lists->links()}}
            </div>
        </div>
        <!-- Add form -->
        <div id="addTodoList" class="modal fade">
            <form id="add_todo_form" class="modal-dialog" action="/todo-mvc/add" method="post">
                {{ csrf_field() }}
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger errors-add">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add todo list</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="todo_name">Name of To-do list:</label>
                                    <input type="text" class="form-control" id="todo_name" name="name">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input href="#" type="submit" class="btn btn-primary btn-add" name="btn-add" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Add form -->
        <!-- Update form -->
        <div id="updateTodoList" class="modal fade">
            <form id="update_todo_form" class="modal-dialog" method="post" action="/todo-mvc/edit/{{Session::get('todo_list_id')}}">
                {{ csrf_field() }}
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger errors-update">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update todo list</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="todo_name_update">Name of To-do list:</label>
                                <input type="text" class="form-control" id="todo_name_update" name="name">
                            </div>
                            <input type="hidden" name="id_todo" id="id_todo_list" />
                        </div>
                        <div class="modal-footer">
                            <input href="#" type="submit" class="btn btn-primary btn-update" name="btn-update" value="Update" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Update form -->
        <!-- #delete-box -->
        <div class="modal fade" id="delete-box">
            <div class="modal-dialog delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete todo-list</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete it?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                        <input href="#" type="submit" class="btn btn-primary btn-delete"
                            name="btn-delete" value="OK" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end #delete-box -->
        <input type="hidden" id="flg_submit_type" value="{{Session::get('flg_submit_type')}}" />
        @endif
        @if(Auth::guest())
        <div class="alert alert-info">
            <strong>Please <a href="/login">Log in!</a></strong>
        </div>
        @endif
    </div>
</div>
@endsection
