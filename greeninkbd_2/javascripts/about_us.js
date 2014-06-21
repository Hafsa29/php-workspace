var ProfileView = Backbone.View.extend({
	el: '#content',
	initialize: function(){
		$('#slides').slidesjs({
	      	play: {
	        	active: true,
	         	auto: true,
	          	interval: 4000,
	          	swap: true
	        },
	        pagination: {
	        	active: false
	        }
      	});
	},
	render: function(){

	},
	events: {
		'mouseover img.profile': function(e){
			e.preventDefault();
			if($(e.target).attr('id') != 'ceo_pic'){
				$(e.target).next('h3').next('p.profile').fadeIn(500);
			}
		},
		'mouseleave img.profile': function(e){
			e.preventDefault();
			if($(e.target).attr('id') != 'ceo_pic'){
				$(e.target).next('h3').next('p.profile').fadeOut(500);
			}
		},
		'mouseover #ceo img': function(e){
			e.preventDefault();
		},
		'mouseleave #ceo img': function(e){
			e.preventDefault();
		}
	}
});