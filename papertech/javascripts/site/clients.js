var ClientsView = Backbone.View.extend({
	el: "#content",
	flag_1: true,
	initialize: function(){
	},
	render: function(){

	},
	events: {
		'click #client_image_1': function(e){
			$('#client_image_1').hide();
			$('#client_title_1').hide();
			$('#client_testimonial_1').slideDown(500);
		},
		'click #client_title_1': function(e){
			$('#client_image_1').hide();
			$('#client_title_1').hide();
			$('#client_testimonial_1').slideDown(500);
		},
		'click #client_testimonial_1': function(e){
			$('#client_testimonial_1').slideUp(500, function(){
				$('#client_image_1').fadeIn();
				$('#client_title_1').fadeIn();
			});
		},
		'click #client_image_2': function(e){
			$('#client_image_2').hide();
			$('#client_title_2').hide();
			$('#client_testimonial_2').slideDown(500);
		},
		'click #client_title_2': function(e){
			$('#client_image_2').hide();
			$('#client_title_2').hide();
			$('#client_testimonial_2').slideDown(500);
		},
		'click #client_testimonial_2': function(e){
			$('#client_testimonial_2').slideUp(500, function(){
				$('#client_image_2').fadeIn();
				$('#client_title_2').fadeIn();
			});
		}
	}
});