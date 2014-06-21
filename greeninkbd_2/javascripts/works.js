var WorksView = Backbone.View.extend({
	el: '#content',
	temp: _.template($('#video').html()),
	initialize: function(){
		$('.slider').bxSlider({
			auto: true,
			slideWidth: 300,
			minSlides: 5,
			maxSlides: 7,
		});
		this.model.bind('change', this.render, this);
		$('#show').css('opacity', '0');
		this.render();
	},
	render: function(){
		$show = $('#show');
		var temp = this.temp;
		var model = this.model;
		$show.animate({
			'opacity': '0'
		}, 500, function(){
			$show.empty();
			$show.html(temp(model.toJSON()));
			$show.animate({
				'opacity': '1'
			}, 1000);
		});
	},
	events: {
		'click .slider img': function(e){
			var $target = $(e.target);
			var video_id = $target.attr('data-video-id');
			var video_title = $target.attr('data-video-title');
			this.model.set({
				'video_id': video_id,
				'video_title': video_title
			});
		}
	}
});
var WorksModel = Backbone.Model.extend({
	defaults:{
		'video_id': 'S4Wt_v3xC6s',
		'video_title': 'Folk Nations 2013'
	}
});