var ContactView = Backbone.View.extend({
	el: '#content',
	map: null,
	initialize: function(){
		$(document).foundation();
		$('#contact_form').validationEngine('attach');
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
		this.map.addMarker({
			lat: this.model.get('lat'),
			lng: this.model.get('lng'),
	        title: 'Papertech',
	        infoWindow: {
	     		content: '<p>Papertech, the coolest paper company</p>'
	        }
	   	});
		this.show_position();
	},
	show_position: function(){
		curr_map = this.map;
		curr_model = this.model;
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
			e.preventDefault();
			var dt = $('#contact_form').serialize();
			$.ajax({
				url: base_url + 'index.php/papertech/email_contact',
				type: 'post',
				data: dt,
				dataType: 'html',
				success: function(data, status, jqxhr){
					$('#contact_form').find('input, textarea').val('');
					$('#contact_form').find('input[type=submit]').val('Submit');
					console.log(data);
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