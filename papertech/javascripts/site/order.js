var OrderView = Backbone.View.extend({
	el: '#content',
	initialize: function(){
		$('#order_form').validationEngine('attach');
	},
	render: function(){

	},
	events: {
		'submit #order_form': function(e){
			e.preventDefault();
			var dt = $('#order_form').serialize();
			$.ajax({
				url: base_url + 'index.php/papertech/email_order',
				type: 'post',
				data: dt,
				dataType: 'html',
				success: function(data, status, jqxhr){
					$('#order_form').find('input, textarea').val('');
					$('#order_form').find('input[type=submit]').val('Submit');
					console.log(data);
				}
			});
		}
	}
});