var AppView = Backbone.View.extend({
	el: 'body',
	initialize: function(){
		this.render();
	},
	render: function(){
		var currentX = 0;
		setInterval(function(){
			currentX++;
			$('body').css('background-position', currentX+'px 0px');
			if(currentX == 1024) currentX = 0;
		}, 50);
	},
	events: {
		'mouseover nav a': function(e){
			$(e.target).parent().next().css('visibility', 'visible');
		},
		'mouseleave nav a': function(e){
			$(e.target).parent().next().css('visibility', 'hidden');	
		}
	}
});
var AppRouter = Backbone.Router.extend({
	initialize: function(){
		var appview  = new AppView();
	},
	routes: {
		'': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/home',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var homeview = new HomeView();
				}
			});
		},
		'home': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/home',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var homeview = new HomeView();
				}
			});
		},
		'about_us': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/about_us',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
				}
			});
		},
		'products': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/products',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var productsview = new ProductsView();
				}
			});
		},
		'resources': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/resources',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
				}
			});
		},
		'clients': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/clients',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var clientsview = new ClientsView(); 
				}
			});
		},
		'events': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/events',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var eventsview = new EventsView();
				}
			});
		},
		'contact': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/contact',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var contactview = new ContactView({model: new ContactModel()});
				}
			});
		},
		'order': function(e){
			$.ajax({
				url: base_url+'index.php/papertech/order',
				type: 'get',
				dataType: 'html',
				success: function(data, status, jqxhr){
					$content = $('#content');
					$content.html(data);
					var orderview = new OrderView();
				}
			});
		}
	}
});
$(window).load(function(){
	var approuter = new AppRouter();
	Backbone.history.start();
});