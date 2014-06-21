var ContactView = Backbone.View.extend({
	el: '#content',
	map: null,
	initialize: function(){
		$("form").validationEngine('attach');
		this.render();
	},
	render: function(){
		this.map = new GMaps({
			el: '#map_canvas',
			lat: this.model.get('lat'),
    		lng: this.model.get('lng'),
    		zoom: 15,
    		zoomControl : true,
    		zoomControlOpt: {
        		style : 'SMALL',
        		position: 'TOP_LEFT'
    		},
    		panControl : false,
		});
		this.map.drawOverlay({
			lat: this.model.get('lat'),
			lng: this.model.get('lng'),
			title: 'Green Ink',
			content: '<div data-tooltip class="has-tip" title="Green Ink" id="home">Home</div>'
		});
		this.show_position();
	},
	show_position: function(){
		curr_map = this.map;
		curr_model = this.model;
		this.map.removeMarkers();
		GMaps.geolocate({
			success: function(p){
				curr_map.addMarker({
					lat: p.coords.latitude,
					lng: p.coords.longitude,
					title: 'Your Position'
				});
				curr_map.drawRoute({
					origin: [p.coords.latitude, p.coords.longitude],
		        	destination: [curr_model.get('lat'), curr_model.get('lng')],
		        	travelMode: 'driving',
		        	strokeColor: '#000',
		        	strokeOpacity: 0.8,
		        	strokeWeight: 4
		      });
			},
			error: function(p){
				alert('We have encountered some problem');
			}
		});
	},
	events: {
		'submit #contact_form': function(e){
			alert('This is working');
			e.preventDefault();
			var d = $('form').serialize();
			$.ajax({
				url: base_url + 'index.php/greeninkbd/email',
				type: 'post',
				data: d,
				dataType: 'html',
				success: function(data, status, jqxhr){
					$('#result').html(data);
				}
			});
		}
	}
});
var ContactModel = Backbone.Model.extend({
	defaults: {
		lat: 23.773886,
		lng: 90.411931
	}
});