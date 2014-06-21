var ProductsView = Backbone.View.extend({
	el: '#content',
	initialize: function(){
		$('.slider').bxSlider({
			auto: true,
			slideWidth: 250,
			minSlides: 2,
			maxSlides: 3,
		});
	},
	render: function(){

	},
	events: {

	}
});