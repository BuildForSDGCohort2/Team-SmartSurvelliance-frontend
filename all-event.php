<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
?>
            
            
            <div class="page-content">
                <div class="container-fluid" id="app_div">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">All Event</h2>
                        </div>
                    </div>
                    <script>
				        function encode() {
					        var selectedfile = document.getElementById("event_img").files;
					        if (selectedfile.length > 0) {
					          var imageFile = selectedfile[0];
					          var fileReader = new FileReader();
					          fileReader.onload = function(fileLoadedEvent) {
					            var srcData = fileLoadedEvent.target.result;
					            var newImage = document.createElement('img');
					            newImage.style.width = "100%";
								newImage.style.height = "100%";
					            newImage.src = srcData;
					            document.getElementById("dummy").innerHTML = newImage.outerHTML;
					            document.getElementById("event_img_base64").value = srcData;
					          }
					          fileReader.readAsDataURL(imageFile);
					        }
				    	}
				    </script>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="modal-body">
		                                <form id="add_event_form" class="needs-validation" enctype="multipart/form-data" novalidate>
		                                	<div class="form-row">
		                                        <div class="col-md-12 mb-6">
		                                            <div class="form-group">
		                                                 <tr>
												            <td>Event Title</td>
												            <td><input type="text" class="form-control" id="event_title" name="event_title"></td>
												        </tr>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-row">
		                                        <div class="col-md-6 mb-3">
		                                            <div class="form-group">
		                                                <tr>
												            <td>Event Date </td>
												            <td>
												            	<input type="text" class="form-control" id="event_date" name="event_date">
												            	<i style="font-size: 11px;font-weight: none;color :#f65656;">DD/MM/YYYY or MM/DD/YYYY</i>
												            </td>
												        </tr>
		                                            </div>
		                                        </div>
		                                        <div class="col-md-6 mb-3">
		                                            <div class="form-group">
		                                                <tr>
												            <td>Event Time </td>
												            <td>
												            	<input type="text" placeholder="00:00 AM/PM" class="form-control" id="event_time" name="event_time">
												            	<i style="font-size: 11px;font-weight: none;color :#f65656;">00:00 AM/PM</i>
												            </td>
												        </tr> 
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-row">
		                                        <div class="col-md-12 mb-6">
		                                            <div class="form-group">
		                                                <tr>
												            <td>Event Location</td>
												            <td><textarea type="text" class="form-control" id="event_location" name="event_location"></textarea></td>
												        </tr>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-row">
		                                        <div class="col-md-12 mb-6">
		                                            <div class="form-group">
		                                                <tr>
												            <td>Event Description</td>
												            <td><textarea type="text" class="form-control" id="event_desc" name="event_desc"></textarea></td>
												        </tr>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-row" style="position: relative;">
		                                        <div class="col-md-6 mb-6">
		                                            <div class="form-group">
		                                                <!-- <label for="event_img">Choose Image</label> -->
		                                                <input required type="file" class="form-control InputBox" id="event_img" placeholder="Choose Image" name="event_img" onchange="encode();">
		                                            </div>
		                                        </div>

		                                        <div>
											      <input id="event_img_base64" name="event_img_base64" type="hidden" />
											    </div>

		                                        <div class="col-md-6 mb-6">
		                                            <div class="form-group">
			                                            <div id="dummy" style="width: 80px;height: 80px;display: block;position: absolute;top: 0%;left: 0%;background-image:url(assets/images/avatars/noimage1.png);background-repeat:no-repeat;background-size:cover;">
												    	</div>
		                                            </div>
		                                        </div>

		                                    </div><br>
		                                    <div class="col-md-12" style="position: relative;">
			                                    <button class="btn btn-primary float-right" id="add_event" name="add_event" type="submit">Add</button>
			                                    <button id="event_loader" style="display: none;cursor: not-allowed;" class="btn btn-primary float-right" type="button" disabled>
			                                        <span class="spinner-border spinner-border-sm" role="status"></span>
			                                        Loading...
			                                    </button>  
	                                        </div></br></br></br>
		                                </form>
		                                <script>
		                                	// trigger when registration form is submitted
											$(document).on('submit', '#add_event_form', function(e){
												e.preventDefault();
											 	var event_title = $('#event_title').val();
											 	var event_date = $('#event_date').val();
											 	var event_time = $('#event_time').val();
											 	var event_location = $('#event_location').val();
											 	var event_desc = $('#event_desc').val();
											 	var event_img = $('#event_img').val();
											 	var event_img_base64 = $('#event_img_base64').val();

											 	if(event_title == "" || event_date == "" || event_time == "" || event_location == "" || event_desc == "" || event_img == "" ) {
										        	// $('#errorAlert').slideDown(300).delay(5000).slideUp(300).html("Form inputs cannot be empty.");
										            toastr.warning('Form inputs cannot be empty!');
										        }else{

										        	var datePattern = /^[0-9]{2}[\/]{1}[0-9]{2}[\/]{1}[0-9]{4}$/g;
												 	dateValues = event_date.match(datePattern);
	    											if (dateValues == null){
	    												toastr.warning('Incorrect date format, use DD/MM/YYYY format!');
	    												return false;
	    											}

										        	var timePattern = /^\d{2,}:\d{2}\s[APap][mM]$/;
												 	timeValues = event_time.match(timePattern);
	    											if (timeValues == null){
	    												toastr.warning('Incorrect time format, use 00:00 then space am/pm');
	    												return false;
	    											}

										        	var obj = { "event_title":event_title, "event_date":event_date, "event_time":event_time, "event_location":event_location, "event_desc":event_desc, "event_img":event_img_base64 };
													var form_data = JSON.stringify(obj);

												 	// alert(form_data);
												    // submit form data to api
												    $.ajax({
												        url: "../api/event/create.php",
												        type : "POST",
												        contentType : 'application/json',
												        data : form_data,
												        beforeSend: function(){
										                    setTimeout(function () {
														        $('#add_event').html('Loading...');
														    }, 100); 
										                },
												        success : function(result) {
												        	// alert(result.message);
												        	// console.log(result.message);
												            toastr.success('Event created successfully.');
												            $("#add_event_form")[0].reset();
												            setTimeout(function(){
												            	('#add_event').delay(3000).html('Add');
															   window.location.reload(true);
															}, 2000);
												        },
												        error: function(xhr, resp, text){
												            // on error, tell the user sign up failed
												            setTimeout(function () {
												            	toastr.error("Error! Unable to add event.");
														        $('#add_event').html('Add');
														    }, 4000); 
												        }
												    });
												 
												    return false;
										        }
											});
											 
											// function to make form values to json format
											$.fn.serializeObject = function(){
											 
											    var o = {};
											    var a = this.serializeArray();
											    $.each(a, function() {
											        if (o[this.name] !== undefined) {
											            if (!o[this.name].push) {
											                o[this.name] = [o[this.name]];
											            }
											            o[this.name].push(this.value || '');
											        } else {
											            o[this.name] = this.value || '';
											        }
											    });
											    return o;
											};
		                                </script>
		                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" >
	                        <div class="row">
	                            <div class="card">
	                                <div class="card-body">
	                                    <!-- <div id="genreList"></div> -->
	                                    <div class="table-container">
	                                        <div class="table-responsive" style="height: 450px;overflow: auto;">
	                                            <table class="table">
	                                                <thead>
	                                                    <tr>
	                                                        <th scope="col">S/N</th>
	                                                        <th style="width:20%;" scope="col">Title</th>
	                                                        <th style="width:10%;"scope="col">Date</th>
	                                                        <th style="width:5%;"scope="col">Time</th>
	                                                        <th style="width:20%;" scope="col">Location</th>
	                                                        <th style="width:20%;" scope="col">Description</th>
	                                                        <th style="width:40%;"scope="col">Action</th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody id="tbody">
	                                                    <script>
	                                                        $(document).ready(function(){
	                                                            $.getJSON("http://recordlabel/api/event/read.php", function(data){
	                                                                // alert(data);
	                                                                // console.log(data);  
	                                                                var sn = 0;
	                                                                var read_event_html = "";
	                                                                $.each(data.records, function(key, val) {
	                                                                    // for serial numbering
	                                                                    sn++;
	                                                                    // creating new table row per record
	                                                                    read_event_html+=`<tr>
	                                                                        <th scope="row">` + sn + `</th>
	                                                                        <td>` + val.event_title + `
	                                                                            <img style="display:block;" src="` + val.event_img + `" width="100px" height="100px" class="preview" />
	                                                                        </td>
	                                                                        <td>` + val.event_date + `</td>
	                                                                        <td>` + val.event_time + `</td>
	                                                                        <td>` + val.event_location + `</td>
	                                                                        <td>` + val.event_desc + `</td>
	                                                                        <td class="btnBasket">
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-primary read-one-event-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-eye-open'></span>Read
	                                                                            </button>
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-info update-event-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-edit'></span>Edit
	                                                                            </button>
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-danger delete-event-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-remove'></span>Delete
	                                                                            </button>
	                                                                        </td>
	                                                                    </tr>`;
	                                                                });
	                                                                // end table
	                                                                read_event_html+=`</tbody></table>`;
	                                                                // inject to 'page-content' of our app
	                                                                $("#tbody").html(read_event_html);
	                                                            });
	                                                        });
	                                                    </script>
	                                                </tbody>
	                                            </table>
	                                        </div>      
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                </div>
                
            </div><!-- Page Content -->

            <?php 
                require_once 'partials/chatBar.inc.php';
                require_once 'partials/footer.inc.php';
            ?>
            
            
        