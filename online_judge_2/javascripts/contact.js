// JavaScript Document
$(document).ready(function() {
	var Data = Backbone.Model.extend();
		var data = new Data({
			name: '',
			email: '',
			message: ''
		});
		var Main = Backbone.View.extend({
			el: 'body',
			initialize: function(){
				$("form").validationEngine('attach');
			}
		});
		var ContactForm = Backbone.View.extend({
			el: '#contact',
			events: {
				'keyup #name': function(e){
					var that = e.target.value;
					data.set({name: that})
				},
				'keyup #email': function(e){
					var that = e.target.value;
					data.set({email: that})
				},
				'keyup #message': function(e){
					var that = e.target.value;
					data.set({message: that})
				}
			}
		});
		var Demo = Backbone.View.extend({
			el: '#demo',
			template: _.template($('#temp').html()),
			initialize: function(){
				data.bind('change', this.render, this);
			},
			render: function(){
				var template = this.template,
					el = this.$el;
				el.empty();
				el.append(template(data.toJSON()));
			}
		});
		var AppRouter = Backbone.Router.extend({
			routes:{
				'': function(){
					var x = new ContactForm(),
						y = new Demo(),
						z = new Main();
					y.render();
				}	
			}
		});
		var approuter = new AppRouter();
		Backbone.history.start();
});