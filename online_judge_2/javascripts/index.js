// JavaScript Document
$(document).ready(function() {
	var Main = Backbone.View.extend({
		el: 'body',
		initialize: function(){
			$('.flexslider').flexslider({
				animation: "slide"
			});
			$("form").validationEngine('attach');
			$('#capcha').s3Capcha();
		}
	});

	var AppRouter = Backbone.Router.extend({
		routes: {
			'': new Main()
		}
	})

	var approuter = new AppRouter();
	Backbone.history.start();
});