jQuery(document).ready(function($){
	var item_data = [];
    
    $.ajax({
        type: "GET",
        url: "../lib/get_discarded_items.php",
        success: function(data) {
            item_data = JSON.parse(data);
            $("#no_items").text(item_data.length);
            fantastic(item_data);
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
            page_element += " multi"
        }
        if (item_data[i].Colour == "Black") {
            page_element += " black"
        }
        if (item_data[i].Colour == "Gray") {
            page_element += " gray"
        }
        if (item_data[i].Colour == "White") {
            page_element += " white"
        }
        if (item_data[i].Colour == "Red") {
            page_element += " red"
        }
        if (item_data[i].Colour == "Orange") {
            page_element += " orange"
        }
        if (item_data[i].Colour == "Yellow") {
            page_element += " yellow"
        }
        if (item_data[i].Colour == "Green") {
            page_element += " green"
        }
        if (item_data[i].Colour == "Blue") {
            page_element += " blue"
        }
        if (item_data[i].Colour == "Purple") {
            page_element += " purple"
        }
        if (item_data[i].Colour == "Pink") {
            page_element += " pink"
        }
        if (item_data[i].Colour == "Brown") {
            page_element += " brown"
        }

        page_element += "'>";
        
        page_element += "<p>" + "<img src=" + item_data[i].Image_Path + ">" + "</p>";

        //page_element += "<p > <span class='item_label'>Type: </span> <span class='item_type'>"+ item_data[i].Type + "</span></p>";

        //page_element += "<p> <span class='item_label'>Price: </span>$<span class='item_price'>" + item_data[i].Price + "</span></p>";

        //page_element += "<p> <span class='item_label'>Cost Per Wear: </span>$<span class='item_costpw'>" + (item_data[i].Price / item_data[i].Times_Worn).toFixed(2) + "</span></p>";

        //page_element += "<p> <span class='item_label'>Colour: </span>" + item_data[i].Colour + "</p>";

        //page_element += "<p><span class='item_label'>Times Worn: </span> <span class='item_timesworn'>" + item_data[i].Times_Worn + "</span></p>";

        //page_element += "<p> <span class='item_label'>Last Worn: </span> ";

        //if (daysago == 1){
        //    page_element += "<span class='item_lastworn'>" + daysago + "</span> day ago";
        //}
       // else if (daysago == 0){
         //   page_element += "<span class='item_lastworn' style='visibility: hidden;'>0</span>Today";
        //}
        //else { 
          //  page_element += "<span class='item_lastworn'>" + daysago + "</span> days ago";
        //}
        
        page_element += "<p> <span class='item_label'>Story: </span>" + item_data[i].Story + "</p>";

        page_element += "<div class='edit-button-container'><button class='edit-button edit-button-2'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>"; 
       
        // insert into webpage into the div with id closet
        var html = $.parseHTML(page_element);
        $('#discarded').append(html);
    
    };

};