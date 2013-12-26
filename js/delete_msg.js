$(document).ready(function(){				   
 $(document).on("click", ".panel-default .delete", function(){
		var msg_id = $(this).attr("value");
		var obj = $(this).parents(".panel-default");
		$('#my_confirm').modal('show');
			$(".modal .btn-danger").on("click", function(){
		$.post(base_url+'msg/delete', {msg_id: msg_id});
		obj.fadeOut();
		});
	}); 
});