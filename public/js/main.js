// Process for to-do list page
$('.btn-add-todo').on('click', function(e) {
	$('input[name="name"]').html('');
	$('.errors-add').remove();
	$('#addTodoList').modal({backdrop: 'static'});
	return false;
});

$('.btn-edit-todo').on('click', function(e) {
	$('.errors-update').remove();
	var todoName = $(this).data('todo_name');
	var todoId = $(this).data('todo_id');
	$('#update_todo_form').find('#todo_name_update').val(todoName);
	$('#update_todo_form').find('#id_todo_list').val(todoId);
	$('#update_todo_form').attr('action', $(this).attr('href'));
	$('#updateTodoList').modal({backdrop: 'static'});
	return false;
});
$('.btn-delete-todo').on('click', function() {
	$('#delete-box').modal({backdrop: 'static'});
	var link = $(this).attr('href');
	$('.btn-delete').on('click', function() {
		window.location = link;
	});
	return false;
});

var err_add_todo_section = $('.errors-add').length;
if (err_add_todo_section > 0) {
	var flg_submit_type = $('#flg_submit_type').val();
	if ('add' == flg_submit_type) {
		$('#addTodoList').modal({backdrop: 'static'});
	}
}

var err_update_todo_section = $('.errors-update').length;
if (err_update_todo_section > 0) {
	var flg_submit_type = $('#flg_submit_type').val();
	if ('update' == flg_submit_type) {
		$('#updateTodoList').modal({backdrop: 'static'});
	}
}

// Process for to-do item page
$('.btn-add-todo-item').on('click', function(e) {
	$('input[name="content"]').html('');
	$('.errors-add-item').remove();
	$('#addTodoItem').modal({backdrop: 'static'});
	return false;
});

var err_add_todo_item_section = $('.errors-add-item').length;
if (err_add_todo_item_section > 0) {
	var flg_submit_todo_item_type = $('#flg_submit_todo_item_type').val();
	if ('add' == flg_submit_todo_item_type) {
		$('#addTodoItem').modal({backdrop: 'static'});
	}
}

$('.btn-edit-todo-item').on('click', function(e) {
	$('.errors-update-item').remove();
	var todoItemName = $(this).data('todo_item_name');
	var todoItemId = $(this).data('todo_item_id');
	$('#update_todo_item_form').find('#todo_item_name_update').val(todoItemName);
	$('#update_todo_item_form').find('#id_todo_items').val(todoItemId);
	$('#update_todo_item_form').attr('action', $(this).attr('href'));
	$('#updateTodoItem').modal({backdrop: 'static'});
	return false;
});

var err_update_todo_item_section = $('.errors-update-item').length;
if (err_update_todo_item_section > 0) {
	var flg_submit_todo_item_type = $('#flg_submit_todo_item_type').val();
	if ('update' == flg_submit_todo_item_type) {
		$('#updateTodoItem').modal({backdrop: 'static'});
	}
}

$('.btn-delete-todo-item').on('click', function() {
	$('#delete-item-box').modal({backdrop: 'static'});
	var link = $(this).attr('href');
	$('.btn-delete-item').on('click', function() {
		window.location = link;
	});
	return false;
});

//set focus input after modal called
$('.modal').on('shown.bs.modal', function () {
    $(this).find('input:first').focus();
})
