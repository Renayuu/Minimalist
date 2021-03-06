jQuery(document).ready(function($){
	var item_data = [];
    
    $.ajax({
        type: "GET",
        url: "../lib/get_closet_items.php",
        success: function(data) {
            item_data = JSON.parse(data);
            $("#no_items").text(item_data.length);
            fantastic(item_data);
            isotope_filter();
        }, 
        error: function (err){
            console.log("error:"+err)
        }
    });	

    
});

function fantastic(item_data) {
	for (i=0; i<item_data.length; i++) 
	{	
		//calculates the days since last worn
        //method applied from http://stackoverflow.com/questions/2627650/why-javascript-gettime-is-not-a-function
        var date1 = new Date();
        var date2 = item_data[i].Date_Last_Worn;
        date2 = new Date(date2);
        var daysago = Math.round((date1 - date2) / (1000 * 3600 * 24));
        
		// construct the web page elements
		var page_element = "";
		page_element += "<div class='item-box col-xs-6 col-sm-4 col-md-3 ";

		//add classes for item type
		if (item_data[i].Type == "Tank Tops") {
			page_element += "tank_tops";
		}
		else if (item_data[i].Type == "Short Sleeve Tops"){
			page_element += "short_sleeves_top";
		}
		else if (item_data[i].Type == "Long Sleeve Tops"){
			page_element += "long_sleeves_top";
		}
		else if (item_data[i].Type == "Dresses"){
			page_element += "dresses";
		}
		else if (item_data[i].Type == "Skirts"){
			page_element += "skirts";
		}
		else if (item_data[i].Type == "Shorts"){
			page_element += "shorts";
		}
		else if (item_data[i].Type == "Pants"){
			page_element += "pants";
		}

		// Add classes for colors
		if (item_data[i].Colour == "Multi") {
			page_element += " multi";
		}
		if (item_data[i].Colour == "Black") {
			page_element += " black";
		}
		if (item_data[i].Colour == "Gray") {
			page_element += " gray";
		}
		if (item_data[i].Colour == "White") {
			page_element += " white";
		}
		if (item_data[i].Colour == "Red") {
			page_element += " red";
		}
		if (item_data[i].Colour == "Orange") {
			page_element += " orange";
		}
		if (item_data[i].Colour == "Yellow") {
			page_element += " yellow";
		}
		if (item_data[i].Colour == "Green") {
			page_element += " green";
		}
		if (item_data[i].Colour == "Blue") {
			page_element += " blue";
		}
		if (item_data[i].Colour == "Purple") {
			page_element += " purple";
		}
		if (item_data[i].Colour == "Pink") {
			page_element += " pink";
		}
		if (item_data[i].Colour == "Brown") {
			page_element += " brown";
		}

		if (item_data[i].Favourite == "1") {
			page_element += " favourites";
		}

		page_element += "'>";
		
		// add image
		page_element += "<p>" + "<img src=" + item_data[i].Image_Path + ">" + "</p>";

		// add type
		page_element += "<p > <span class='item_label'>Type: </span> <span class='item_type'>"+ item_data[i].Type + "</span></p>";

		//add price
		page_element += "<p> <span class='item_label'>Price: </span>$<span class='item_price'>" + item_data[i].Price + "</span></p>";

		// add cost per wear
		page_element += "<p> <span class='item_label'>Cost Per Wear: </span>$<span class='item_costpw'>" + (item_data[i].Price / item_data[i].Times_Worn).toFixed(2) + "</span></p>";

		// add colour
		page_element += "<p> <span class='item_label'>Color: </span>" + item_data[i].Colour + "</p>";

		//add times worn
		page_element += "<p><span class='item_label'>Times Worn: </span> <span class='item_timesworn'>" + item_data[i].Times_Worn + "</span></p>";

		// add days ago last worn
		page_element += "<p> <span class='item_label'>Last Worn: </span> ";

		if (daysago == 1){
			page_element += "<span class='item_lastworn'>" + daysago + "</span> day ago</p>";
		}
		else if (daysago == 0){
			page_element += "<span class='item_lastworn' style='visibility: hidden;'>0</span>Today</p>";
		}

		else if (daysago > 1){ 
			page_element += "<span class='item_lastworn'>" + daysago + "</span> days ago</p>";
		}

		else { 
			page_element += "<span class='item_lastworn'> Never </span></p>";
		}


		// Add Avg temp
		page_element += "<p> <span class='item_label'>Average Temp: </span> ";

		if (item_data[i].Avg_Temp){
			page_element += item_data[i].Avg_Temp.toFixed(1) + "&deg;C</p>";
		}

		else {
			page_element += "Unknown</p>";
		}
		

		// Add Favourite Button
		if (item_data[i].Favourite == "0")
		{
			page_element += "<div class='edit-button-container'><button id='"+item_data[i].Item_ID+"' type='submit' onclick='favouriteItem(id);' value='favourite'><span class='glyphicon glyphicon-star-empty' aria-hidden='true'></span></button>"
		}
		else if (item_data[i].Favourite == "1")
		{
			page_element += "<div class='edit-button-container'><button id='"+item_data[i].Item_ID+"' type='submit' onclick='unfavouriteItem(id);' value='unfavourite'><span class='glyphicon glyphicon-star' aria-hidden='true'></span></button>"
		}
		
		// Add Discard button
		page_element += "<button id='"+item_data[i].Item_ID+"' type='submit' onclick='discardItem(id);' value='discard'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>";

		// insert into webpage into the div with id closet
		var html = $.parseHTML(page_element);
		$('#closet').append(html);
	
	};

};

function isotope_filter() {
	//http://codepen.io/desandro/pen/GFbAs

	var $container = $('#closet').isotope({
    	itemSelector: '.item-box',
    	getSortData: {
			price: '.item_price parseInt',
			costpw: '.item_costpw parseFloat',
			timesworn: '.item_timesworn parseInt',
			lastworn: '.item_lastworn parseInt',
    	}
	});

	// filter with colours and types
	var $colours = $('#colour-group select');
	var $types = $('#type-group input');
	var $favourites = $('#favourite-group input');
  
	$colours.add( $types ).add( $favourites ).change( function() {
		console.log("hello");
	    // map input values to an array
	    var exclusives = [];
	    var inclusives = [];

	    // exclusive filters from selects
	    $colours.each( function( i, elem ) {
	      if ( elem.value ) {
	        exclusives.push( elem.value );
	      }
	    });

	    // inclusive filters from checkboxes
	    $types.each( function( i, elem ) {
	      // if checkbox, use value if checked
	      if ( elem.checked ) {
	        inclusives.push( elem.value );
	      }
	    });

	    $favourites.each( function( i, elem ) {
	      // if checkbox, use value if checked
	      if ( elem.checked ) {
	        exclusives.push( elem.value );
	      }
	});


	    //item_data[i].Favourites == "1"

	    // combine exclusive and inclusive filters

	    // first combine exclusives
	    exclusives = exclusives.join('');
	    
	    var filterValue;
	    if ( inclusives.length ) {
	      // map inclusives with exclusives for
	      filterValue = $.map( inclusives, function( value ) {
	        return value + exclusives;
	      });
	      filterValue = filterValue.join(', ');
	    } 
	    else {
	      filterValue = exclusives;
	    }

	    $container.isotope({ filter: filterValue });

	    // shows no results message
	    if ( !$container.data('isotope').filteredItems.length ) {
			$('#noResultsContainer').show();
		}
		else {
			$('#noResultsContainer').hide();
		}
	});

	// bind sort button click
	$('.sort-by-button-group').on( 'click', 'button', function() {
		var sortValue = $(this).attr('data-sort-value');
		var sortDirection = $(this).attr('data-sort-direction');

		// if($(this).hasClass('is-checked')) {
			if ($(this).hasClass('button_asc')){
              $(this).removeClass('button_asc').addClass('button_desc');
              sortDirection = sortDirection === false;
            }
            else if ($(this).hasClass('button_desc')){
              $(this).removeClass('button_desc').addClass('button_asc');
              sortDirection == true;
            }
		// };
		console.log(sortValue);
		console.log(sortDirection);

		$container.isotope({ 
			sortBy: sortValue, 
			sortAscending: sortDirection 
		});
	       
	});

  // change is-checked class on buttons
	$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
		});
	});
};

function discardItem(someid) {
	if(confirm("Are you sure you want to discard this?")) {
		$.ajax({
	        type: "POST",
	        url: "../lib/update_discard.php",
	        data: {
	        	"itemID":someid
	        },
	        success: function(msg) {
	        	console.log(msg);
	        	window.location.reload();
	        }, 
	        error: function (err){
	            console.log("error:"+err)
	        }
	    });
	};
};
	
function favouriteItem(someid)	{
		$.ajax({
	        type: "POST",
	        url: "../lib/update_favourite.php",
	        data: {
	        	"itemID":someid
	        },
	        success: function(msg) {
	        	console.log(msg);
	        	window.location.reload();
	        }, 
	        error: function (err){
	            console.log("error:"+err)
	        }
	    });
	};

function unfavouriteItem(someid)	{
		$.ajax({
	        type: "POST",
	        url: "../lib/update_unfavourite.php",
	        data: {
	        	"itemID":someid
	        },
	        success: function(msg) {
	        	console.log(msg);
	        	window.location.reload();
	        }, 
	        error: function (err){
	            console.log("error:"+err)
	        }
	    });
	};
	






