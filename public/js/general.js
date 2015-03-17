//
//    Main script of DevOOPS v1.0 Bootstrap Theme
//
"use strict";
/*-------------------------------------------
	Dynamically load plugin scripts
---------------------------------------------*/
//
// Dynamically load Fullcalendar Plugin Script
// homepage: http://arshaw.com/fullcalendar
// require moment.js
//
function LoadCalendarScript(callback){
	function LoadFullCalendarScript(){
		if(!$.fn.fullCalendar){
			$.getScript('bower_components/devoops/plugins/fullcalendar/fullcalendar.js', callback);
		}
		else {
			if (callback && typeof(callback) === "function") {
				callback();
			}
		}
	}
	if (!$.fn.moment){
		$.getScript('bower_components/devoops/plugins/moment/moment.min.js', LoadFullCalendarScript);
	}
	else {
		LoadFullCalendarScript();
	}
}
//
// Dynamically load  OpenStreetMap Plugin
// homepage: http://openlayers.org
//
function LoadOpenLayersScript(callback){
	if (!$.fn.OpenLayers){
		$.getScript('http://www.openlayers.org/api/OpenLayers.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
// Dynamically load  Leaflet Plugin
// homepage: http://leafletjs.com
//
function LoadLeafletScript(callback){
	if (!$.fn.L){
		$.getScript('bower_components/devoops/plugins/leaflet/leaflet.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load  jQuery Timepicker plugin
//  homepage: http://trentrichardson.com/examples/timepicker/
//
function LoadTimePickerScript(callback){
	if (!$.fn.timepicker){
		$.getScript('bower_components/devoops/plugins/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Bootstrap Validator Plugin
//  homepage: https://github.com/nghuuphuoc/bootstrapvalidator
//
function LoadBootstrapValidatorScript(callback){
	if (!$.fn.bootstrapValidator){
		$.getScript('bower_components/devoops/plugins/bootstrapvalidator/bootstrapValidator.min.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load jQuery Select2 plugin
//  homepage: https://github.com/ivaynberg/select2  v3.4.5  license - GPL2
//
function LoadSelect2Script(callback){
	if (!$.fn.select2){
		$.getScript('bower_components/devoops/plugins/select2/select2.min.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load DataTables plugin
//  homepage: http://datatables.net v1.9.4 license - GPL or BSD
//
function LoadDataTablesScripts(callback){
	function LoadDatatables(){
		$.getScript('bower_components/devoops/plugins/datatables/jquery.dataTables.js', function(){
			$.getScript('bower_components/devoops/plugins/datatables/ZeroClipboard.js', function(){
				$.getScript('bower_components/devoops/plugins/datatables/TableTools.js', function(){
					$.getScript('bower_components/devoops/plugins/datatables/dataTables.bootstrap.js', callback);
				});
			});
		});
	}
	if (!$.fn.dataTables){
		LoadDatatables();
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Widen FineUploader
//  homepage: https://github.com/Widen/fine-uploader  v5.0.5 license - GPL3
//
function LoadFineUploader(callback){
	if (!$.fn.fineuploader){
		$.getScript('bower_components/devoops/plugins/fineuploader/jquery.fineuploader-5.0.5.min.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load xCharts plugin
//  homepage: http://tenxer.github.io/xcharts/ v0.3.0 license - MIT
//  Required D3 plugin http://d3js.org/ v3.4.11 license - MIT
//
function LoadXChartScript(callback){
	function LoadXChart(){
		$.getScript('bower_components/devoops/plugins/xcharts/xcharts.min.js', callback);
	}
	function LoadD3Script(){
		if (!$.fn.d3){
			$.getScript('bower_components/devoops/plugins/d3/d3.min.js', LoadXChart)
		}
		else {
			LoadXChart();
		}
	}
	if (!$.fn.xcharts){
		LoadD3Script();
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Flot plugin
//  homepage: http://www.flotcharts.org  v0.8.2 license- MIT
//
function LoadFlotScripts(callback){
	function LoadFlotScript(){
		$.getScript('bower_components/devoops/plugins/flot/jquery.flot.js', LoadFlotResizeScript);
	}
	function LoadFlotResizeScript(){
		$.getScript('bower_components/devoops/plugins/flot/jquery.flot.resize.js', LoadFlotTimeScript);
	}
	function LoadFlotTimeScript(){
		$.getScript('bower_components/devoops/plugins/flot/jquery.flot.time.js', callback);
	}
	if (!$.fn.flot){
		LoadFlotScript();
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Morris Charts plugin
//  homepage: http://www.oesmith.co.uk/morris.js/ v0.4.3 License - MIT
//  require Raphael http://raphael.js
//
function LoadMorrisScripts(callback){
	function LoadMorrisScript(){
		if(!$.fn.Morris){
			$.getScript('bower_components/devoops/plugins/morris/morris.min.js', callback);
		}
		else {
			if (callback && typeof(callback) === "function") {
				callback();
			}
		}
	}
	if (!$.fn.raphael){
		$.getScript('bower_components/devoops/plugins/raphael/raphael-min.js', LoadMorrisScript);
	}
	else {
		LoadMorrisScript();
	}
}
//
//  Dynamically load Am Charts plugin
//  homepage: http://www.amcharts.com/ 3.11.1 free with linkware
//
function LoadAmchartsScripts(callback){
	function LoadAmchartsScript(){
		$.getScript('bower_components/devoops/plugins/amcharts/amcharts.js', LoadFunnelScript);
	}
	function LoadFunnelScript(){
		$.getScript('bower_components/devoops/plugins/amcharts/funnel.js', LoadSerialScript);
	}
	function LoadSerialScript(){
		$.getScript('bower_components/devoops/plugins/amcharts/serial.js', LoadPieScript);
	}
	function LoadPieScript(){
		$.getScript('bower_components/devoops/plugins/amcharts/pie.js', callback);
	}
	if (!$.fn.AmCharts){
		LoadAmchartsScript();
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Chartist plugin
//  homepage: http://gionkunz.github.io/chartist-js/index.html 0.1.15 AS IS
//
function LoadChartistScripts(callback){
	function LoadChartistScript(){
		$.getScript('bower_components/devoops/plugins/chartist/chartist.min.js', callback);
	}
	if (!$.fn.Chartist){
		LoadChartistScript();
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Springy plugin
//  homepage: http://getspringy.com/ 2.6.1 as is
//
function LoadSpringyScripts(callback){
	function LoadSpringyScript(){
		$.getScript('bower_components/devoops/plugins/springy/springy.js', LoadSpringyUIScript);
	}
	function LoadSpringyUIScript(){
		$.getScript('bower_components/devoops/plugins/springy/springyui.js', callback);
	}
	if (!$.fn.Springy){
		LoadSpringyScript();
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
// Draw all test Am Charts
function DrawAllAmCharts(){
	DrawAmChart1();
	DrawAmChart2();
	DrawAmChart3();
	DrawAmChart4();
	DrawAmChart5();
}

//
//  Dynamically load Fancybox 2 plugin
//  homepage: http://fancyapps.com/fancybox/ v2.1.5 License - MIT
//
function LoadFancyboxScript(callback){
	if (!$.fn.fancybox){
		$.getScript('bower_components/devoops/plugins/fancybox/jquery.fancybox.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load jQuery-Knob plugin
//  homepage: http://anthonyterrien.com/knob/  v1.2.5 License- MIT or GPL
//
function LoadKnobScripts(callback){
	if(!$.fn.knob){
		$.getScript('bower_components/devoops/plugins/jQuery-Knob/jquery.knob.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
//
//  Dynamically load Sparkline plugin
//  homepage: http://omnipotent.net/jquery.sparkline v2.1.2  License - BSD
//
function LoadSparkLineScript(callback){
	if(!$.fn.sparkline){
		$.getScript('bower_components/devoops/plugins/sparkline/jquery.sparkline.min.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}
/*-------------------------------------------
	Main scripts used by theme
---------------------------------------------*/
//
//  Function for load content from url and put in $('.ajax-content') block
//
function LoadAjaxContent(url){
	$('.preloader').show();
	$.ajax({
		mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
		url: url,
		type: 'GET',
		success: function(data) {
			$('#ajax-content').html(data);
			$('.preloader').hide();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
		},
		dataType: "html",
		async: false
	});
}
//
//  Function maked all .box selector is draggable, to disable for concrete element add class .no-drop
//
function WinMove(){
	$( "div.box").not('.no-drop')
		.draggable({
			revert: true,
			zIndex: 2000,
			cursor: "crosshair",
			handle: '.box-name',
			opacity: 0.8
		})
		.droppable({
			tolerance: 'pointer',
			drop: function( event, ui ) {
				var draggable = ui.draggable;
				var droppable = $(this);
				var dragPos = draggable.position();
				var dropPos = droppable.position();
				draggable.swap(droppable);
				setTimeout(function() {
					var dropmap = droppable.find('[id^=map-]');
					var dragmap = draggable.find('[id^=map-]');
					if (dragmap.length > 0 || dropmap.length > 0){
						dragmap.resize();
						dropmap.resize();
					}
					else {
						draggable.resize();
						droppable.resize();
					}
				}, 50);
				setTimeout(function() {
					draggable.find('[id^=map-]').resize();
					droppable.find('[id^=map-]').resize();
				}, 250);
			}
		});
}
//
// Swap 2 elements on page. Used by WinMove function
//
jQuery.fn.swap = function(b){
	b = jQuery(b)[0];
	var a = this[0];
	var t = a.parentNode.insertBefore(document.createTextNode(''), a);
	b.parentNode.insertBefore(a, b);
	t.parentNode.insertBefore(b, t);
	t.parentNode.removeChild(t);
	return this;
};
//
//  Screensaver function
//  used on locked screen, and write content to element with id - canvas
//
function ScreenSaver(){
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	// Size of canvas set to fullscreen of browser
	var W = window.innerWidth;
	var H = window.innerHeight;
	canvas.width = W;
	canvas.height = H;
	// Create array of particles for screensaver
	var particles = [];
	for (var i = 0; i < 25; i++) {
		particles.push(new Particle());
	}
	function Particle(){
		// location on the canvas
		this.location = {x: Math.random()*W, y: Math.random()*H};
		// radius - lets make this 0
		this.radius = 0;
		// speed
		this.speed = 3;
		// random angle in degrees range = 0 to 360
		this.angle = Math.random()*360;
		// colors
		var r = Math.round(Math.random()*255);
		var g = Math.round(Math.random()*255);
		var b = Math.round(Math.random()*255);
		var a = Math.random();
		this.rgba = "rgba("+r+", "+g+", "+b+", "+a+")";
	}
	// Draw the particles
	function draw() {
		// re-paint the BG
		// Lets fill the canvas black
		// reduce opacity of bg fill.
		// blending time
		ctx.globalCompositeOperation = "source-over";
		ctx.fillStyle = "rgba(0, 0, 0, 0.02)";
		ctx.fillRect(0, 0, W, H);
		ctx.globalCompositeOperation = "lighter";
		for(var i = 0; i < particles.length; i++){
			var p = particles[i];
			ctx.fillStyle = "white";
			ctx.fillRect(p.location.x, p.location.y, p.radius, p.radius);
			// Lets move the particles
			// So we basically created a set of particles moving in random direction
			// at the same speed
			// Time to add ribbon effect
			for(var n = 0; n < particles.length; n++){
				var p2 = particles[n];
				// calculating distance of particle with all other particles
				var yd = p2.location.y - p.location.y;
				var xd = p2.location.x - p.location.x;
				var distance = Math.sqrt(xd*xd + yd*yd);
				// draw a line between both particles if they are in 200px range
				if(distance < 200){
					ctx.beginPath();
					ctx.lineWidth = 1;
					ctx.moveTo(p.location.x, p.location.y);
					ctx.lineTo(p2.location.x, p2.location.y);
					ctx.strokeStyle = p.rgba;
					ctx.stroke();
					//The ribbons appear now.
				}
			}
			// We are using simple vectors here
			// New x = old x + speed * cos(angle)
			p.location.x = p.location.x + p.speed*Math.cos(p.angle*Math.PI/180);
			// New y = old y + speed * sin(angle)
			p.location.y = p.location.y + p.speed*Math.sin(p.angle*Math.PI/180);
			// You can read about vectors here:
			// http://physics.about.com/od/mathematics/a/VectorMath.htm
			if(p.location.x < 0) p.location.x = W;
			if(p.location.x > W) p.location.x = 0;
			if(p.location.y < 0) p.location.y = H;
			if(p.location.y > H) p.location.y = 0;
		}
	}
	setInterval(draw, 30);
}
//
// Helper for draw Google Chart
//
function drawGoogleChart(chart_data, chart_options, element, chart_type) {
	// Function for visualize Google Chart
	var data = google.visualization.arrayToDataTable(chart_data);
	var chart = new chart_type(document.getElementById(element));
	chart.draw(data, chart_options);
}
//
//  Function for Draw Knob Charts
//
function DrawKnob(elem){
	elem.knob({
		change : function (value) {
			//console.log("change : " + value);
		},
		release : function (value) {
			//console.log(this.$.attr('value'));
			console.log("release : " + value);
		},
		cancel : function () {
			console.log("cancel : ", this);
		},
		draw : function () {
			// "tron" case
			if(this.$.data('skin') == 'tron') {
				var a = this.angle(this.cv);  // Angle
				var sa = this.startAngle;          // Previous start angle
				var sat = this.startAngle;         // Start angle
				var ea;                            // Previous end angle
				var eat = sat + a;                 // End angle
				var r = 1;
				this.g.lineWidth = this.lineWidth;
				this.o.cursor
					&& (sat = eat - 0.3)
					&& (eat = eat + 0.3);
				if (this.o.displayPrevious) {
					ea = this.startAngle + this.angle(this.v);
					this.o.cursor
						&& (sa = ea - 0.3)
						&& (ea = ea + 0.3);
					this.g.beginPath();
					this.g.strokeStyle = this.pColor;
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
					this.g.stroke();
				}
				this.g.beginPath();
				this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
				this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
				this.g.stroke();
				this.g.lineWidth = 2;
				this.g.beginPath();
				this.g.strokeStyle = this.o.fgColor;
				this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
				this.g.stroke();
				return false;
			}
		}
	});
	// Example of infinite knob, iPod click wheel
	var v;
	var up = 0;
	var down=0;
	var i=0;
	var $idir = $("div.idir");
	var $ival = $("div.ival");
	var incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
	var decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
	$("input.infinite").knob(
		{
			min : 0,
			max : 20,
			stopper : false,
			change : function () {
				if(v > this.cv){
					if(up){
						decr();
						up=0;
					} else {
						up=1;down=0;
					}
				} else {
					if(v < this.cv){
						if(down){
							incr();
							down=0;
						} else {
							down=1;up=0;
						}
					}
				}
				v = this.cv;
			}
		});
}
//
// Create OpenLayers map with required options and return map as object
//
function drawMap(lon, lat, elem, layers) {
	var LayersArray = [];
	// Map initialization
	var map = new OpenLayers.Map(elem);
	// Add layers on map
	map.addLayers(layers);
	// WGS 1984 projection
	var epsg4326 =  new OpenLayers.Projection("EPSG:4326");
	//The map projection (Spherical Mercator)
	var projectTo = map.getProjectionObject();
	// Max zoom = 17
	var zoom=10;
	map.zoomToMaxExtent();
	// Set longitude/latitude
	var lonlat = new OpenLayers.LonLat(lon, lat);
	map.setCenter(lonlat.transform(epsg4326, projectTo), zoom);
	var layerGuest = new OpenLayers.Layer.Vector("You are here");
	// Define markers as "features" of the vector layer:
	var guestMarker = new OpenLayers.Feature.Vector(
		new OpenLayers.Geometry.Point(lon, lat).transform(epsg4326, projectTo)
	);
	layerGuest.addFeatures(guestMarker);
	LayersArray.push(layerGuest);
	map.addLayers(LayersArray);
	// If map layers > 1 then show checker
	if (layers.length > 1){
		map.addControl(new OpenLayers.Control.LayerSwitcher({'ascending':true}));
	}
	// Link to current position
	map.addControl(new OpenLayers.Control.Permalink());
	// Show current mouse coords
	map.addControl(new OpenLayers.Control.MousePosition({ displayProjection: epsg4326 }));
	return map
}
//
//  Function for create 2 dates in human-readable format (with leading zero)
//
function PrettyDates(){
	var currDate = new Date();
	var year = currDate.getFullYear();
	var month = currDate.getMonth() + 1;
	var startmonth = 1;
	if (month > 3){
		startmonth = month -2;
	}
	if (startmonth <=9){
		startmonth = '0'+startmonth;
	}
	if (month <= 9) {
		month = '0'+month;
	}
	var day= currDate.getDate();
	if (day <= 9) {
		day = '0'+day;
	}
	var startdate = year +'-'+ startmonth +'-01';
	var enddate = year +'-'+ month +'-'+ day;
	return [startdate, enddate];
}
//
//  Function set min-height of window (required for this theme)
//
function SetMinBlockHeight(elem){
	elem.css('min-height', window.innerHeight - 49)
}
//
//  Helper for correct size of Messages page
//
function MessagesMenuWidth(){
	var W = window.innerWidth;
	var W_menu = $('#sidebar-left').outerWidth();
	var w_messages = (W-W_menu)*16.666666666666664/100;
	$('#messages-menu').width(w_messages);
}
//
// Function for change panels of Dashboard
//
function DashboardTabChecker(){
	$('#content').on('click', 'a.tab-link', function(e){
		e.preventDefault();
		$('div#dashboard_tabs').find('div[id^=dashboard]').each(function(){
			$(this).css('visibility', 'hidden').css('position', 'absolute');
		});
		var attr = $(this).attr('id');
		$('#'+'dashboard-'+attr).css('visibility', 'visible').css('position', 'relative');
		$(this).closest('.nav').find('li').removeClass('active');
		$(this).closest('li').addClass('active');
	});
}
//
// Helper for run TinyMCE editor with textarea's
//
function TinyMCEStart(elem, mode){
	var plugins = [];
	if (mode == 'extreme'){
		plugins = [ "advlist anchor autolink autoresize autosave bbcode charmap code contextmenu directionality ",
			"emoticons fullpage fullscreen hr image insertdatetime layer legacyoutput",
			"link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace",
			"tabfocus table template textcolor visualblocks visualchars wordcount"]
	}
	tinymce.init({selector: elem,
		theme: "modern",
		plugins: plugins,
		//content_css: "css/style.css",
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
		style_formats: [
			{title: 'Header 2', block: 'h2', classes: 'page-header'},
			{title: 'Header 3', block: 'h3', classes: 'page-header'},
			{title: 'Header 4', block: 'h4', classes: 'page-header'},
			{title: 'Header 5', block: 'h5', classes: 'page-header'},
			{title: 'Header 6', block: 'h6', classes: 'page-header'},
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		]
	});
}
//
// Helper for draw Sparkline plots on Dashboard page
//
function SparkLineDrawBarGraph(elem, arr, color){
	if (color) {
		var stacked_color = color;
	}
	else {
		stacked_color = '#6AA6D6'
	}
	elem.sparkline(arr, { type: 'bar', barWidth: 7, highlightColor: '#000', barSpacing: 2, height: 40, stackedBarColor: stacked_color});
}
//
//  Helper for open ModalBox with requested header, content and bottom
//
//
function OpenModalBox(header, inner, bottom){
	var modalbox = $('#modalbox');
	modalbox.find('.modal-header-name span').html(header);
	modalbox.find('.devoops-modal-inner').html(inner);
	modalbox.find('.devoops-modal-bottom').html(bottom);
	modalbox.fadeIn('fast');
	$('body').addClass("body-expanded");
}
//
//  Close modalbox
//
//
function CloseModalBox(){
	var modalbox = $('#modalbox');
	modalbox.fadeOut('fast', function(){
		modalbox.find('.modal-header-name span').children().remove();
		modalbox.find('.devoops-modal-inner').children().remove();
		modalbox.find('.devoops-modal-bottom').children().remove();
		$('body').removeClass("body-expanded");
		$('#modalbox').removeClass("wide");
	});
}
//
//  Beauty tables plugin (navigation in tables with inputs in cell)
//  Created by DevOOPS.
//
(function( $ ){
	$.fn.beautyTables = function() {
		var table = this;
		var string_fill = false;
		this.on('keydown', function(event) {
		var target = event.target;
		var tr = $(target).closest("tr");
		var col = $(target).closest("td");
		if (target.tagName.toUpperCase() == 'INPUT'){
			if (event.shiftKey === true){
				switch(event.keyCode) {
					case 37: // left arrow
						col.prev().children("input[type=text]").focus();
						break;
					case 39: // right arrow
						col.next().children("input[type=text]").focus();
						break;
					case 40: // down arrow
						if (string_fill==false){
							tr.next().find('td:eq('+col.index()+') input[type=text]').focus();
						}
						break;
					case 38: // up arrow
						if (string_fill==false){
							tr.prev().find('td:eq('+col.index()+') input[type=text]').focus();
						}
						break;
				}
			}
			if (event.ctrlKey === true){
				switch(event.keyCode) {
					case 37: // left arrow
						tr.find('td:eq(1)').find("input[type=text]").focus();
						break;
					case 39: // right arrow
						tr.find('td:last-child').find("input[type=text]").focus();
						break;
				case 40: // down arrow
					if (string_fill==false){
						table.find('tr:last-child td:eq('+col.index()+') input[type=text]').focus();
					}
					break;
				case 38: // up arrow
					if (string_fill==false){
						table.find('tr:eq(1) td:eq('+col.index()+') input[type=text]').focus();
					}
						break;
				}
			}
			if (event.keyCode == 13 || event.keyCode == 9 ) {
				event.preventDefault();
				col.next().find("input[type=text]").focus();
			}
			if (string_fill==false){
				if (event.keyCode == 34) {
					event.preventDefault();
					table.find('tr:last-child td:last-child').find("input[type=text]").focus();}
				if (event.keyCode == 33) {
					event.preventDefault();
					table.find('tr:eq(1) td:eq(1)').find("input[type=text]").focus();}
			}
		}
		});
		table.find("input[type=text]").each(function(){
			$(this).on('blur', function(event){
			var target = event.target;
			var col = $(target).parents("td");
			if(table.find("input[name=string-fill]").prop("checked")==true) {
				col.nextAll().find("input[type=text]").each(function() {
					$(this).val($(target).val());
				});
			}
		});
	})
};
})( jQuery );
//
// Beauty Hover Plugin (backlight row and col when cell in mouseover)
//
//
(function( $ ){
	$.fn.beautyHover = function() {
		var table = this;
		table.on('mouseover','td', function() {
			var idx = $(this).index();
			var rows = $(this).closest('table').find('tr');
			rows.each(function(){
				$(this).find('td:eq('+idx+')').addClass('beauty-hover');
			});
		})
		.on('mouseleave','td', function(e) {
			var idx = $(this).index();
			var rows = $(this).closest('table').find('tr');
			rows.each(function(){
				$(this).find('td:eq('+idx+')').removeClass('beauty-hover');
			});
		});
	};
})( jQuery );
//
//  Function convert values of inputs in table to JSON data
//
//
function Table2Json(table) {
	var result = {};
	table.find("tr").each(function () {
		var oneRow = [];
		var varname = $(this).index();
		$("td", this).each(function (index) { if (index != 0) {oneRow.push($("input", this).val());}});
		result[varname] = oneRow;
	});
	var result_json = JSON.stringify(result);
	OpenModalBox('Table to JSON values', result_json);
}

/*-------------------------------------------
	Function for File upload page (form_file_uploader.html)
---------------------------------------------*/
function FileUpload(){
	$('#bootstrapped-fine-uploader').fineUploader({
		template: 'qq-template-bootstrap',
		classes: {
			success: 'alert alert-success',
			fail: 'alert alert-error'
		},
		thumbnails: {
			placeholders: {
				waitingPath: "assets/waiting-generic.png",
				notAvailablePath: "assets/not_available-generic.png"
			}
		},
		request: {
			endpoint: 'server/handleUploads'
		},
		validation: {
			allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
		}
	});
}

/*-------------------------------------------
	Functions for Progressbar page (ui_progressbars.html)
---------------------------------------------*/
//
// Function for Knob clock
//
function RunClock() {
	var second = $(".second");
	var minute = $(".minute");
	var hour = $(".hour");
	var d = new Date();
	var s = d.getSeconds();
	var m = d.getMinutes();
	var h = d.getHours();
	if (h > 11) {h = h-12;}
		$('#knob-clock-value').html(h+':'+m+':'+s);
		second.val(s).trigger("change");
		minute.val(m).trigger("change");
		hour.val(h).trigger("change");
}
//
// Function for create test sliders on Progressbar page
//
function CreateAllSliders(){
	$(".slider-default").slider();
	var slider_range_min_amount = $(".slider-range-min-amount");
	var slider_range_min = $(".slider-range-min");
	var slider_range_max = $(".slider-range-max");
	var slider_range_max_amount = $(".slider-range-max-amount");
	var slider_range = $(".slider-range");
	var slider_range_amount = $(".slider-range-amount");
	slider_range_min.slider({
		range: "min",
		value: 37,
		min: 1,
		max: 700,
		slide: function( event, ui ) {
			slider_range_min_amount.val( "$" + ui.value );
		}
	});
	slider_range_min_amount.val("$" + slider_range_min.slider( "value" ));
	slider_range_max.slider({
		range: "max",
		min: 1,
		max: 100,
		value: 2,
		slide: function( event, ui ) {
			slider_range_max_amount.val( ui.value );
		}
	});
	slider_range_max_amount.val(slider_range_max.slider( "value" ));
	slider_range.slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			slider_range_amount.val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	slider_range_amount.val( "$" + slider_range.slider( "values", 0 ) +
	  " - $" + slider_range.slider( "values", 1 ) );
	$( "#equalizer > div.progress > div" ).each(function() {
		// read initial values from markup and remove that
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			animate: true,
			orientation: "vertical"
		});
	});
}
/*-------------------------------------------
	Function for jQuery-UI page (ui_jquery-ui.html)
---------------------------------------------*/
//
// Function for make all Date-Time pickers on page
//
function AllTimePickers(){
	$('#datetime_example').datetimepicker({});
	$('#time_example').timepicker({
		hourGrid: 4,
		minuteGrid: 10,
		timeFormat: 'hh:mm tt'
	});
	$('#date3_example').datepicker({ numberOfMonths: 3, showButtonPanel: true});
	$('#date3-1_example').datepicker({ numberOfMonths: 3, showButtonPanel: true});
	$('#date_example').datepicker({});
}
/*-------------------------------------------
	Function for Calendar page (calendar.html)
---------------------------------------------*/
//
// Example form validator function
//
function DrawCalendar(){
	/* initialize the external events
	-----------------------------------------------------------------*/
	$('#external-events div.external-event').each(function() {
		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};
		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
	});
	/* initialize the calendar
	-----------------------------------------------------------------*/
	var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		eventLimit: true, // allow "more" link when too many events
		eventSources: [
		    {
		        url: 'event/calendarjson',
		        type: 'GET',
		        data: {
		            show_users: function dumpInArray(){
							   var items = []; $.each($("input[name='show_users[]']:checked"), function() {items.push($(this).val());})
							   return items;
					},
		            show_types: function dumpInArray(){
							   var items = []; $.each($("input[name='show_types[]']:checked"), function() {items.push($(this).val());})
							   return items;
					}
		        },
		        error: function() {
		            alert('there was an error while fetching events!');
		        },
		        color: 'yellow',   // a non-ajax option
		        textColor: 'black' // a non-ajax option
		    }
    	],
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			var form = $('<form id="event_form">'+
				'<div class="form-group has-success has-feedback">Not working yet!!<br>'+
				'<label">Event name</label>'+
				'<div>'+
				'<input type="text" id="newevent_name" class="form-control" placeholder="Name of event">'+
				'</div>'+
				'<label>Description</label>'+
				'<div>'+
				'<textarea rows="3" id="newevent_desc" class="form-control" placeholder="Description"></textarea>'+
				'</div>'+
				'</div>'+
				'</form>');
			var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left">'+
							'<span><i class="fa fa-clock-o txt-danger"></i></span>'+
							'Cancel'+
							'</button>'+
							'<button type="submit" id="event_submit" class="btn btn-primary btn-label-left pull-right">'+
							'<span><i class="fa fa-clock-o"></i></span>'+
							'Add'+
							'</button>');
			OpenModalBox('Add event', form, buttons);
			$('#event_cancel').on('click', function(){
				CloseModalBox();
			});
			$('#event_submit').on('click', function(){
				var new_event_name = $('#newevent_name').val();
				if (new_event_name != ''){
					calendar.fullCalendar('renderEvent',
						{
							title: new_event_name,
							description: $('#newevent_desc').val(),
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				CloseModalBox();
			});
			calendar.fullCalendar('unselect');
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
		},
		eventRender: function (event, element, icon) {
			if (event.description != "") {
				element.attr('title', event.description);
			}
		},
		eventClick: function(calEvent, jsEvent, view) {
			popupEditEvent(calEvent.id)
		}
		});
		$('#new-event-add').on('click', function(event){
			event.preventDefault();
			var event_name = $('#new-event-title').val();
			var event_description = $('#new-event-desc').val();
			if (event_name != ''){
			var event_template = $('<div class="external-event" data-description="'+event_description+'">'+event_name+'</div>');
			$('#events-templates-header').after(event_template);
			var eventObject = {
				title: event_name,
				description: event_description
			};
			// store the Event Object in the DOM element so we can get to it later
			event_template.data('eventObject', eventObject);
			event_template.draggable({
				zIndex: 999,
				revert: true,
				revertDuration: 0
			});
			}
		});
}
//
// Load scripts and draw Calendar
//
function DrawFullCalendar(){
	LoadCalendarScript(DrawCalendar);
}
//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
//
//      MAIN DOCUMENT READY SCRIPT OF DEVOOPS THEME
//
//      In this script main logic of theme
//
//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
$(document).ready(function () {
	$('body').on('click', '.show-sidebar', function (e) {
		e.preventDefault();
		$('div#main').toggleClass('sidebar-show');
		setTimeout(MessagesMenuWidth, 250);
	});
	var ajax_url = location.hash.replace(/^#/, '');
	if (ajax_url.length < 1) {
		ajax_url = 'ajax/dashboard.html';
	}
	//LoadAjaxContent(ajax_url);
	var item = $('.main-menu li a[href$="' + ajax_url + '"]');
	item.addClass('active-parent active');
	$('.dropdown:has(li:has(a.active)) > a').addClass('active-parent active');
	$('.dropdown:has(li:has(a.active)) > ul').css("display", "block");
	$('.main-menu').on('click', 'a', function (e) {
		var parents = $(this).parents('li');
		var li = $(this).closest('li.dropdown');
		var another_items = $('.main-menu li').not(parents);
		another_items.find('a').removeClass('active');
		another_items.find('a').removeClass('active-parent');
		if ($(this).hasClass('dropdown-toggle') || $(this).closest('li').find('ul').length == 0) {
			$(this).addClass('active-parent');
			var current = $(this).next();
			if (current.is(':visible')) {
				li.find("ul.dropdown-menu").slideUp('fast');
				li.find("ul.dropdown-menu a").removeClass('active')
			}
			else {
				another_items.find("ul.dropdown-menu").slideUp('fast');
				current.slideDown('fast');
			}
		}
		else {
			if (li.find('a.dropdown-toggle').hasClass('active-parent')) {
				var pre = $(this).closest('ul.dropdown-menu');
				pre.find("li.dropdown").not($(this).closest('li')).find('ul.dropdown-menu').slideUp('fast');
			}
		}
		if ($(this).hasClass('active') == false) {
			$(this).parents("ul.dropdown-menu").find('a').removeClass('active');
			$(this).addClass('active')
		}
		if ($(this).hasClass('ajax-link')) {
			e.preventDefault();
			if ($(this).hasClass('add-full')) {
				$('#content').addClass('full-content');
			}
			else {
				$('#content').removeClass('full-content');
			}
			var url = $(this).attr('href');
			window.location.hash = url;
			LoadAjaxContent(url);
		}
		if ($(this).attr('href') == '#') {
			e.preventDefault();
		}
	});
	var height = window.innerHeight - 49;
	$('#main').css('min-height', height)
		.on('click', '.expand-link', function (e) {
			var body = $('body');
			e.preventDefault();
			var box = $(this).closest('div.box');
			var button = $(this).find('i');
			button.toggleClass('fa-expand').toggleClass('fa-compress');
			box.toggleClass('expanded');
			body.toggleClass('body-expanded');
			var timeout = 0;
			if (body.hasClass('body-expanded')) {
				timeout = 100;
			}
			setTimeout(function () {
				box.toggleClass('expanded-padding');
			}, timeout);
			setTimeout(function () {
				box.resize();
				box.find('[id^=map-]').resize();
			}, timeout + 50);
		})
		.on('click', '.collapse-link', function (e) {
			e.preventDefault();
			var box = $(this).closest('div.box');
			var button = $(this).find('i');
			var content = box.find('div.box-content');
			content.slideToggle('fast');
			button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
			setTimeout(function () {
				box.resize();
				box.find('[id^=map-]').resize();
			}, 50);
		})
		.on('click', '.close-link', function (e) {
			e.preventDefault();
			var content = $(this).closest('div.box');
			content.remove();
		});
	$('#locked-screen').on('click', function (e) {
		e.preventDefault();
		$('body').addClass('body-screensaver');
		$('#screensaver').addClass("show");
		ScreenSaver();
	});
	$('body').on('click', 'a.close-link', function(e){
		e.preventDefault();
		CloseModalBox();
	});
	$('#top-panel').on('click','a', function(e){
		if ($(this).hasClass('ajax-link')) {
			e.preventDefault();
			if ($(this).hasClass('add-full')) {
				$('#content').addClass('full-content');
			}
			else {
				$('#content').removeClass('full-content');
			}
			var url = $(this).attr('href');
			window.location.hash = url;
			LoadAjaxContent(url);
		}
	});
	$('#search').on('keydown', function(e){
		if (e.keyCode == 13){
			e.preventDefault();
			$('#content').removeClass('full-content');
			ajax_url = 'ajax/page_search.html';
			window.location.hash = ajax_url;
			LoadAjaxContent(ajax_url);
		}
	});
	$('#screen_unlock').on('mouseover', function(){
		var header = 'Enter current username and password';
		var form = $('<div class="form-group"><label class="control-label">Username</label><input type="text" class="form-control" name="username" /></div>'+
					'<div class="form-group"><label class="control-label">Password</label><input type="password" class="form-control" name="password" /></div>');
		var button = $('<div class="text-center"><a href="index.html" class="btn btn-primary">Unlock</a></div>');
		OpenModalBox(header, form, button);
	});
	$('.about').on('click', function(){
		$('#about').toggleClass('about-h');
	})
	$('#about').on('mouseleave', function(){
		$('#about').removeClass('about-h');
	})
});

function popupEditEvent(id){

	$.ajax({
				mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
				url: base_url+'/event/popupedit/'+id,
				type: 'GET',
				success: function(data) {
					var form = $(data);
							
					OpenModalBox('Change event', form);
					$('#event_cancel').on('click', function(){
						CloseModalBox();
					});
					$('#event_delete').on('click', function(){
						calendar.fullCalendar('removeEvents' , function(ev){
							return (ev._id == calEvent._id);
						});
						CloseModalBox();
					});
					$('#event_change').on('click', function(){
						calEvent.title = $('#newevent_name').val();
						calEvent.description = $('#newevent_desc').val();
						calendar.fullCalendar('updateEvent', calEvent);
						CloseModalBox()
					});
			
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				},
				dataType: "html",
				async: true
			});
}


function popupNewEvent(type_id, cust_id) {
			$.ajax({
				mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
				url: base_url+'/event/popupnew/'+type_id+'-'+cust_id,
				type: 'GET',
				success: function(data) {
					var form = $(data);
							
					OpenModalBox('Change event', form);
					$('#event_cancel').on('click', function(){
						CloseModalBox();
					});
					$('#event_delete').on('click', function(){
						calendar.fullCalendar('removeEvents' , function(ev){
							return (ev._id == calEvent._id);
						});
						CloseModalBox();
					});
					$('#event_change').on('click', function(){
						calEvent.title = $('#newevent_name').val();
						calEvent.description = $('#newevent_desc').val();
						calendar.fullCalendar('updateEvent', calEvent);
						CloseModalBox()
					});
			
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				},
				dataType: "html",
				async: true
		});
}
