<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TodoItem;

class ListItemController extends Controller
{
    private $todoItem = null;

    public function __construct() {
        $this->todoItem = new TodoItem;
    }

    public function show($todo_list_id, Request $request) {
        if (\Auth::check()) {
            $request->session()->put('todo_list_id', $todo_list_id);
            $todo_items_list = TodoItem::where('id_todo_list', '=', $todo_list_id)->paginate(5);
            return view('todo_item')->withTodoItemsList($todo_items_list);
        } else {
            return redirect('/login');
        }
    }

    public function add(Request $request) {
        try {
            if (\Auth::check()) {
                $request->session()->put('flg_submit_type', 'add');
                $this->validateTodoItem($request);
                $content_todo = $request->input('content');
                $this->todoItem->content = $content_todo;
                $this->todoItem->id_todo_list = $request->session()->get('todo_list_id');
                $this->todoItem->save();
                return redirect()->back();
            } else {
                return redirect('/login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($todo_item_id, Request $request) {
        try {
            if (\Auth::check()) {
                $request->session()->put('flg_submit_type', 'update');
                $request->session()->put('todo_item_id', $todo_item_id);
                $this->validateTodoItem($request);
                $id_todo_item = trim($todo_item_id);
                $todoItemContent = $request->content;
                $todo_item = \App\TodoItem::find($id_todo_item);
                $todo_item->content = $todoItemContent;
                $todo_item->id_todo_list = $request->session()->get('todo_list_id');
                $todo_item->save();
                return redirect()->back();
            } else {
                return redirect('/login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            if (\Auth::check()) {
                $todo_item = \App\TodoItem::find($id);
                $todo_item->delete();
                return redirect()->back();
            } else {
                return redirect('/login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function validateTodoItem(Request $request) {
        $this->validate($request, [
            'content' => 'required'
        ]);
    }
}
