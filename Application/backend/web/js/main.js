$(function(){


	$(document).on('click','.fc-title',function(){
		var id = $(this).attr('id')
		$.get('index.php?r=event/update',{'id':id},function(data){
			$('#modal').modal('show')
			.find('#modalContent')
			.html(data);

		});

		
		});
	$(document).on('click','.fc-day',function(){
		var date = $(this).attr('data-date');

		$.get('index.php?r=event/create',{'date':date},function(data){
			$('#modal').modal('show')
			.find('#modalContent')
			.html(data);

		});

		
		});
	$('#modalButton').click(function (){
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});
});