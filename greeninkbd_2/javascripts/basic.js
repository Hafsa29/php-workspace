var AppRouter = Backbone.Router.extend({
	$content: $('#content'),
	initialize: function(){
		alert('This site is under construction');
		$('#da-slider').cslider();
		$(document).foundation();
	},
	routes: {
		'': function(){
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 1000);
		},
		'home': function(){
			console.log(this.$content);
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 500, function(){
				$.ajax({
					url: base_url+'index.php/greeninkbd/home',
					type: 'get',
					dataType: 'html',
					success: function(data, status, jqxhr){
						$content = $('#content');
						$content.html(data);
						var homeview = new HomeView();
						$content.animate({
							'height': '1000px',
							'padding': '30px 0px'
						}, 1000);
					}
				});
			});
		},
		'works': function(){
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 500, function(){
				$.ajax({
					url: base_url+'index.php/greeninkbd/works',
					type: 'get',
					dataType: 'html',
					success: function(data, status, jqxhr){
						$content = $('#content');
						$content.html(data);
						var worksview = new WorksView({model: new WorksModel()});
						$content.animate({
							'height': '700px',
							'padding': '30px 0px'
						}, 1000);
					}
				});
			});
		},
		'clients': function(){
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 500, function(){
				$.ajax({
					url: base_url+'index.php/greeninkbd/clients',
					type: 'get',
					dataType: 'html',
					success: function(data, status, jqxhr){
						$content = $('#content');
						$content.html(data);
						var clientsview = new ClientsView();
						$content.animate({
							'height': '700px',
							'padding': '30px 0px'
						}, 1000);
					}
				});
			});
		},
		'contact': function(){
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 500, function(){
				$.ajax({
					url: base_url+'index.php/greeninkbd/contact',
					type: 'get',
					dataType: 'html',
					success: function(data, status, jqxhr){
						$content = $('#content');
						$content.html(data);
						$content.animate({
							'height': '800px',
							'padding': '50px 0px'
						}, 1000);
						var contactview = new ContactView({model: new ContactModel()});
					}
				});
			});
		},
		'news': function(){
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 500, function(){
				$.ajax({
					url: base_url+'index.php/greeninkbd/news',
					type: 'get',
					dataType: 'html',
					success: function(data, status, jqxhr){
						$content = $('#content');
						$content.html(data);
						$content.animate({
							'height': '500px',
							'padding': '50px 0px'
						}, 1000);
					}
				});
			});
		},
		'news/:id': function(e, id){
			this.$content.animate({
				'height': '0px',
				'padding': '0px 0px'
			}, 500, function(){
				$.ajax({
					url: base_url+'index.php/greeninkbd/news/'+id,
					type: 'get',
					dataType: 'html',
					success: function(data, status, jqxhr){
						$content = $('#content');
						$content.html(data);
						$content.animate({
							'height': '500px',
							'padding': '50px 0px'
						}, 1000);
					}
				});
			});
		}
	}
});
$(window).load(function(){
	var approuter = new AppRouter();
	Backbone.history.start();
});