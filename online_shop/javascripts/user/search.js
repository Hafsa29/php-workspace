$(document).ready(function(){
	$('#search_field').on('keydown', function(e){
		var formdata = $('#search').serialize();
		$.ajax({
			url: base_url+'index.php/user/search',
			type: 'post',
			data: formdata,
			dataType: 'json',
			success: function(data, status, jqxhr){
				$('#search_list').empty();
				$.each(data, function(k, v){
					var el = '<li><a href="'+base_url+'index.php/user/product/'+id+'/'+v.pro_id+'">'+v.pro_name+'</a></li>';
					$('#search_list').append(el);
				});
			}
		});
	});
});