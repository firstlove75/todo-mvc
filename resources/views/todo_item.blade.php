@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Auth::check())
        <div class="col-md-11 add-btn-section">
            <a href="#" class="btn btn-info pull-right btn-add-todo-item" data-toggle="modal" data-target="#addTodoItem">Add new item</a>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">List of items</div>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($todo_items_list as $val)
                        <tr>
                            <td>{{$val['content']}}</td>
                            <td>
                                <a class="btn-edit-todo-item" href="/todo-mvc/todo-item/edit/{{$val['id']}}" data-todo_item_id="{{$val['id']}}" data-todo_item_name="{{$val['content']}}">Edit</a> | 
                                <a class="btn-delete-todo-item" href="/todo-mvc/todo-item/delete/{{$val['id']}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
            </div>
            <a href="#" class="btn btn-info pull-right btn-add-todo-item" data-toggle="modal" data-target="#addTodoItem">Add new item</a>
            <div class="pagination">
                {{$todo_items_list->links()}}
            </div>
        </div>
        <!-- Add form -->
        <div id="addTodoItem" class="modal fade">
            <form id="add_todo_item_form" class="modal-dialog" action="/todo-mvc/todo-item/add" method="post">
                {{ csrf_field() }}
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger errors-add-item">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add todo item</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="todo_name">Name of To-do item:</label>
                                <input type="text" class="form-control" id="todo_item_name" name="content">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input href="#" type="submit" class="btn btn-primary btn-add-item" name="btn-add" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Add form -->
        <!-- Update form -->
        <div id="updateTodoItem" class="modal fade">
            <form id="update_todo_item_form" class="modal-dialog" method="post" action="/todo-mvc/todo-item/edit/{{Session::get('todo_item_id')}}">
                {{ csrf_field() }}
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger errors-update-item">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update todo item</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="todo_name_update">Content of To-do item:</label>
                                <input type="text" class="form-control" id="todo_item_name_update" name="content">
                            </div>
                            <input type="hidden" name="id_todo_item" id="id_todo_items" />
                        </div>
                        <div class="modal-footer">
                            <input href="#" type="submit" class="btn btn-primary btn-update-item" name="btn-update-item" value="Update" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Update form -->
        <!-- #delete-box -->
        <div class="modal fade" id="delete-item-box">
            <div class="modal-dialog delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete todo-list item</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete it?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                        <input href="#" type="submit" class="btn btn-primary btn-delete-item"
                            name="btn-delete-item" value="OK" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end #delete-box -->
        <input type="hidden" id="flg_submit_todo_item_type" value="{{Session::get('flg_submit_type')}}" />
        @endif
        @if(Auth::guest())
        <div class="alert alert-info">
            <strong>Please <a href="/login">Log in!</a></strong>
        </div>
        @endif
    </div>
</div>
@endsection
