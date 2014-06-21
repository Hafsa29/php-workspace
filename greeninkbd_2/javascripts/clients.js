var ClientsView = Backbone.View.extend({
	el: '#content',
	initialize: function(){
		this.render();
	},
	render: function(){

	},
	events: {
		'mouseenter img.testimonial_1': function(e){
			var target = $('img.testimonial_1');
			target.hide();
			target.parent().css('background-color', '#002E5F');
			target.next('div.testimonial_1').show();
		},
		'mouseleave div.testimonial_1': function(e){
			var target = $('div.testimonial_1');
			target.hide();
			target.prev('img.testimonial_1').show();
		},
		'mouseenter img.testimonial_2': function(e){
			var target = $('img.testimonial_2');
			target.hide();
			target.parent().css('background-color', '#73553D');
			target.next('div.testimonial_2').show();
		},
		'mouseleave div.testimonial_2': function(e){
			var target = $('div.testimonial_2');
			target.hide();
			target.prev('img.testimonial_2').show();
		},
		'mouseenter img.testimonial_3': function(e){
			var target = $('img.testimonial_3');
			target.hide();
			target.parent().css('background-color', '#53BD37');
			target.next('div.testimonial_3').show();
		},
		'mouseleave div.testimonial_3': function(e){
			var target = $('div.testimonial_3');
			target.hide();
			target.prev('img.testimonial_3').show();
		},
		'mouseenter img.testimonial_4': function(e){
			var target = $('img.testimonial_4');
			target.hide();
			target.next('div.testimonial_4').show();
		},
		'mouseleave div.testimonial_4': function(e){
			var target = $('div.testimonial_4');
			target.hide();
			target.prev('img.testimonial_4').show();
		},
		'mouseenter img.testimonial_5': function(e){
			var target = $('img.testimonial_5');
			target.hide();
			target.next('div.testimonial_5').show();
		},
		'mouseleave div.testimonial_5': function(e){
			var target = $('div.testimonial_5');
			target.hide();
			target.prev('img.testimonial_5').show();
		}
		
	}
});