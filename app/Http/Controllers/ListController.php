<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TodoList;

class ListController extends Controller
{
    private $todoList = null;

    public function __construct() {
        $this->todoList = new TodoList;
    }

    public function show() {
        if (\Auth::check()) {
            $todo_lists = TodoList::where('user_id', '=', \Auth::id())->paginate(5);
            return view('welcome')->withTodoLists($todo_lists);
        } else {
            return redirect('/todo-mvc/login');
        }
    }

    public function add(Request $request) {
        try {
            if (\Auth::check()) {
                $request->session()->put('flg_submit_type', 'add');
                $this->validateTodoList($request);
                $name_todo = $request->input('name');
                $this->todoList->name = $name_todo;
                $this->todoList->user_id = \Auth::id();
                $this->todoList->save();
                return redirect()->back();
            } else {
                return redirect('/todo-mvc/login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id, Request $request) {
        try {
            if (\Auth::check()) {
                $request->session()->put('flg_submit_type', 'update');
                $request->session()->put('todo_item_id', $id);
                $this->validateTodoList($request);
                $id_todo = trim($id);
                $todoName = $request->name;
                $todo_list = \App\TodoList::find($id_todo);
                $todo_list->name = $todoName;
                $todo_list->user_id = \Auth::id();
                $todo_list->save();
                $request->session()->forget('flg_submit_type');
                $request->session()->forget('todo_list_id');
                return redirect()->back();
            } else {
                return redirect('/todo-mvc/login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            if (\Auth::check()) {
                $todo_list = \App\TodoList::find($id);
                $todo_list->delete();
                return redirect()->back();
            } else {
                return redirect('/todo-mvc/login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function validateTodoList(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
    }
}
