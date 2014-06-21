// JavaScript Document
$(document).ready(function() {
	var Main = Backbone.View.extend({
		el: 'body',
		initialize: function(){
			$('.flexslider').flexslider({
				animation: "slide"
			});
			$("form").validationEngine('attach');
		},
		events: {
			'click .alert': function(e){
				e.preventDefault();
				var that = e.target;
				var href = that.href;
				alertify.confirm("Are you sure?", function (e) {
					if (e) {
						window.location.href = href;
					}
				});
			}
		}
	});
	var AppRouter = Backbone.Router.extend({
		routes: {
			'': new Main()
		}
	});
	var approuter = new AppRouter();
	Backbone.history.start();
});