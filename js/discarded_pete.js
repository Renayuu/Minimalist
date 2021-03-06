jQuery(document).ready(function($){

	console.log("Pete's version of discarded");
	
	//globals
	var item_data = [];
	var item_id;
	var story_id;  
	var image_path_2;
    
    // get data for initial page load
    $.ajax({
        type: "GET",
        url: "../lib/get_discarded_items.php",
        success: function(data) {
            item_data = JSON.parse(data);
            $("#no_items").text(item_data.length);
            fantastic(item_data);

            $('#discarded').isotope({
                itemSelector: '.item-box',
                masonry: {
                }
              });

        }, 
        error: function (err){
            console.log("error:"+err)
        }
    });	

	// functions for stories
	
	$(document).on('click', '.story', function() {
	    //$('#editStoryModal').modal('show');
	    item_id = $(this).attr("data-id"); 
	    console.log(item_id);
	    transferID(item_id);
	    $('#editStoryModal').modal('show');
	    //console.log("modal should close");
	});
	
	$('#modalCloseStory').click(function() {
	    story_text = $("#story").val();
	    //console.log(story_text);
	    editStory(item_id, story_text);
	});
	
	// functions for photos
	
	$(document).on('click', '.photo', function(){
	    $('#uploadPhotoModal').modal('show');
	    item_id = $(this).attr("data-id");
	    uploadPhoto(item_id);
	});
	
	$("#uploadPhotoModal").on('hide', function() {
        //window.location.reload();
	});

	// submits modal form - fixes form submission problem, tutorial from:
	//http://stackoverflow.com/questions/9349142/twitter-bootstrap-2-modal-form-dialogs/9349329#9349329
	
	$('#modalClosePhoto').click(function(e){
	    // We don't want this to act as a link so cancel the link action
	    e.preventDefault();
	    console.log("hello");

	    // Find form and submit it
	    $('#uploadPhotoForm').submit();
	    
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


        if (item_data[i].Image_Path_2 != "") {
            page_element += "<p>" + "<img src=" + item_data[i].Image_Path_2 + ">" + "</p>";
        }

        if (item_data[i].Story != "") {
        page_element += "<p> <span class='item_label'>Story: </span>" + item_data[i].Story + "</p>";
        }

        page_element += "<div class='edit-button-container edit-button-2'>";

        page_element += "<button class = 'photo' data-id='"+item_data[i].Item_ID+"' type='button' value='photo'><span class='glyphicon glyphicon-picture' aria-hidden='true'></span></button>"; 

        page_element += "<button class = 'story' data-id='"+item_data[i].Item_ID+"' type='button' value='story'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></div>"; 
       
        // insert into webpage into the div with id closet
        var html = $.parseHTML(page_element);
        $('#discarded').append(html);
    
    };

};

//http://www.w3schools.com/bootstrap/bootstrap_carousel.asp
// <a class="left carousel-control" href="#carousel-memories" role="button" data-slide="prev">
//     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
//     <span class="sr-only">Previous</span>
//   </a>
//   <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
//     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
//     <span class="sr-only">Next</span>
//   </a>
// </div>

function transferID(item_id) {
        $.ajax({
            type: "POST",
            url: "../get_story.php",
            data: {
                "ItemID":item_id
            },
            success: function(data) {
                console.log(data);
                console.log("itemID should transfer");
                //window.location.reload();
                var existingStory = data;
                console.log(existingStory.length);
                $('#story').val(existingStory);
            }, 
            error: function (err){
                console.log("error:"+err)
            }
        });
    };


function editStory(item_id, story_text)  {
        $.ajax({
            type: "POST",
            url: "../lib/edit_story.php",
            data: {
                "itemID":item_id,
                "story":story_text
            },
            success: function(msg) {
                //console.log(msg);
                window.location.reload();
            }, 
            error: function (err){
                console.log("error:"+err)
            }
        });
    };


function uploadPhoto(item_id)  {
        $.ajax({
            type: "POST",
            url: "../insert_memory_photo.php",
            data: {
                "itemID":item_id
                //"photo":image_path_2
            },
            success: function(msg) {
                //console.log(msg);
                //window.location.reload();
            }, 
            error: function (err){
                console.log("error:"+err)
            }
        });
    };