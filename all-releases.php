<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
?>
            
            
            <div class="page-content">
                <div class="container-fluid" id="app_div">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">All New Releases</h2>
                        </div>
                    </div>
                    <script>
				        function encodeImage() {
					        var selectedfile = document.getElementById("release_img").files;
					        if (selectedfile.length > 0) {
					          var imageFile = selectedfile[0];
					          var fileReader = new FileReader();
					          fileReader.onload = function(fileLoadedrelease) {
					            var srcData = fileLoadedrelease.target.result;
					            var newImage = document.createElement('img');
					            newImage.style.width = "100%";
								newImage.style.height = "100%";
					            newImage.src = srcData;
					            document.getElementById("dummy").innerHTML = newImage.outerHTML;
					            document.getElementById("release_img_base64").value = srcData;
					          }
					          fileReader.readAsDataURL(imageFile);
					        }
				    	}

				    	function encodeAudio() {
					        var selectedfile = document.getElementById("release_audio").files;
					        if (selectedfile.length > 0) {
					          var imageFile = selectedfile[0];
					          var fileReader = new FileReader();
					          fileReader.onload = function(fileLoadedrelease) {
					            var srcData = fileLoadedrelease.target.result;
					            document.getElementById("release_audio_base64").value = srcData;
					          }
					          fileReader.readAsDataURL(imageFile);
					        }
				    	}

				    	$.getJSON("http://recordlabel/api/genre/read.php", function(data){
						 	var genre_options_html=`<select data-toggle="tooltip" data-placement="top" title="Select multiple music genre" id="genre" multiple="multiple" name="genre[]" class="custom-select form-control">
						 	<option value="" >Select Genre</option>`;
							$.each(data.records, function(key, val){
							    genre_options_html+=`<option value='` + val.genre_name + `'>` + val.genre_name + `</option>`;
							});
							genre_options_html+=`</select>`;
							$('#genre_options_html').html(genre_options_html);
							// console.log(data);  
					    });

					    $.getJSON("http://recordlabel/api/artist/read.php", function(data){
						 	var artist_options_html=`<select data-toggle="tooltip" data-placement="top" title="Select multiple music artist" id="artist" multiple="multiple" name="artist[]" class="custom-select form-control">
						 	<option value="" >Select artist</option>`;
							$.each(data.records, function(key, val){
							    artist_options_html+=`<option value='` + val.stage_name + `'>` + val.stage_name + `</option>`;
							});
							artist_options_html+=`</select>`;
							$('#artist_options_html').html(artist_options_html);
							// console.log(data);  
					    });
				    </script>
                    <div class="row">
                        <div class="row">
	                        <div style="float: right;" class="col-12">
	                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addReleaseModal">
                                    <span class='glyphicon glyphicon-plus'></span>Add
                                </button>
                                <!-- Modal to creae-->
                                <div class="modal fade" id="addReleaseModal" tabindex="-1" role="dialog" aria-labelledby="addReleaseModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addReleaseModalLabel">Add Releases</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="add_release_form" class="needs-validation" enctype="multipart/form-data" novalidate>
                                                	<div class="form-row">
				                                        <div class="col-md-12 mb-6">
				                                            <div class="form-group">
				                                                 <tr>
														            <td>Album/Track Title</td>
														            <td><input type="text" class="form-control" id="release_title" placeholder="Stage Name" name="release_title"></td>
														        </tr>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="form-row">
				                                        <div class="col-md-6 mb-3">
				                                            <div class="form-group">
				                                                <tr>
														            <td>Artist</td>
														            <td><div id="artist_options_html"></div></td>
														        </tr>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6 mb-3">
				                                            <div class="form-group">
				                                                <tr>
														            <td>Producer</td>
														            <td><input type="text" class="form-control" id="producer" name="producer"></td>
														        </tr> 
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="form-row">
				                                        <div class="col-md-6 mb-3">
				                                            <div class="form-group">
				                                                 <tr>
														            <td>Release Date</td>
														            <td>
														            	<input type="text" class="form-control" id="release_date" name="release_date">
														            	<i style="font-size: 11px;font-weight: none;color :#f65656;">Note: MM/DD/YYYY</i>
														            </td>
														        </tr>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6 mb-3">
				                                            <div class="form-group">
				                                            <tr>
													            <td>Genre</td>
													            <td><div id="genre_options_html"></div></td>
													        </tr></div>
				                                        </div>
				                                    </div>

				                                    <div class="form-row">
				                                        <div class="col-md-12 mb-6">
				                                            <div class="form-group">
				                                                <tr>
														            <td>Album/Track Info</td>
														            <td><textarea type="text" class="form-control" id="release_info" name="release_info"></textarea></td>
														        </tr>
				                                            </div>
				                                        </div>
				                                    </div>

				                                    <div class="form-row">
				                                        <div class="col-md-12 mb-6">
				                                            <div class="form-group">
				                                                <tr>
														            <td>Media Link</td>
														            <td><input data-toggle="tooltip" data-placement="top" title="Multiple media links should be sepreated by coma (,)" type="text" class="form-control" id="media_link" name="media_link"></td>
														        </tr>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    
				                                    <div class="form-row" style="position: relative;">
				                                        <div class="col-md-6 mb-6">
				                                            <div class="form-group">
				                                                <!-- <label for="release_img">Choose Image</label> -->
				                                                <tr>
														            <td>Choose Image</td>
														            <td><input required type="file" class="form-control InputBox" id="release_img" placeholder="Choose Image" name="release_img" onchange="encodeImage();"></td>
														        </tr>
				                                            </div>
				                                        </div>

				                                        <div class="col-md-6 mb-6">
				                                            <div class="form-group">
				                                                <!-- <label for="release_img">Choose Image</label> -->
				                                                <tr>
														            <td>Select Album/Track</td>
														            <td><input required type="file" class="form-control InputBox" id="release_audio" placeholder="Choose Album/Track" name="release_audio" onchange="encodeAudio();"></td>
														        </tr>
				                                            </div>
				                                        </div>

				                                        <div>
													      <input id="release_img_base64" name="release_img_base64" type="hidden" />
													    </div>
													    <div>
													      <input id="release_audio_base64" name="release_audio_base64" type="hidden" />
													    </div>

				                                        <div class="col-md-6 mb-6">
				                                            <div class="form-group">
					                                            <div id="dummy" style="width: 80px;height: 80px;display: block;position: absolute;top: 0%;left: 0%;background-image:url(assets/images/avatars/noimage1.png);background-repeat:no-repeat;background-size:cover;">
														    	</div>
				                                            </div>

				                                            <div class="modal-footer">
				                                                <button style="float: right;" id="add_release" name="add_release" type="submit" class="btn btn-text-primary float-right">Save changes</button>
				                                            </div>
				                                        </div>
				                                        <br><br><br>
				                                    </div>
				                                </form>
								                <script>
								                	// trigger when registration form is submitted
													$(document).on('submit', '#add_release_form', function(e){
														e.preventDefault();
														var release_title = $('#release_title').val();
													 	var artist = $('#artist').val();
													 	var genre = $('#genre').val();
													 	var release_date = $('#release_date').val();
													 	var producer = $('#producer').val();
													 	var release_img = $('#release_img').val();
													 	var release_audio = $('#release_audio').val();
													 	var release_info = $('#release_info').val();
													 	var media_link = $('#media_link').val();
													 	var release_audio_base64 = $('#release_audio_base64').val();
													 	var release_img_base64 = $('#release_img_base64').val();

													 	if(release_title == "" || release_date == "" || artist == "" || genre == "" || producer == "" || release_info == "" || media_link == "" || release_audio == "" || release_img == "" ) {
												        	// $('#errorAlert').slideDown(300).delay(5000).slideUp(300).html("Form inputs cannot be empty.");
												            toastr.warning('Form inputs cannot be empty!');
												        }else{

												        	var datePattern = /^[0-9]{2}[\/]{1}[0-9]{2}[\/]{1}[0-9]{4}$/g;
														 	dateValues = release_date.match(datePattern);
															if (dateValues == null){
																toastr.warning('Incorrect date format, use MM/DD/YYYY format!');
																return false;
															}

												        	var obj = { "release_title":release_title, "release_date":release_date, "artist":artist, "producer":producer, "genre":genre, "release_info":release_info, "media_link":media_link, "release_audio":release_audio_base64, "release_img":release_img_base64 };
															var form_data = JSON.stringify(obj);

														 	// alert(form_data);
														 	// console.log(form_data);
														    // submit form data to api
														    $.ajax({
														        url: "../api/release/create.php",
														        type : "POST",
														        contentType : 'application/json',
														        data : form_data,
														        beforeSend: function(){
												                    setTimeout(function () {
																        $('#add_release').html('Loading...').css('cursor', 'not-allowed');
																    }, 100); 
												                },
														        success : function(result) {
														        	// alert(result.message);
														        	// console.log(result.message);
														            toastr.success(result.message);
														            $("#add_release_form")[0].reset();
														            $('#add_release').html('Save Changes');
														            setTimeout(function(){
																	   window.location.reload(true);
																	}, 2000);
														        },
														        error: function(xhr, resp, text){
														            // on error, tell the user sign up failed
														            setTimeout(function () {
														            	toastr.error("Error! Unable to add Album/track.");
																        $('#add_release').html('Save Changes');
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
	                        </div>
	                    </div><br><br>
                        <div class="col-lg-12" >
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
	                                                        <th scope="col">Title</th>
	                                                        <th style="width:10%;" scope="col">Release Date</th>
	                                                        <th style="width:25%;" scope="col">Track</th>
	                                                        <th scope="col">Artist</th>
	                                                        <th scope="col">Producer</th>
	                                                        <th style="width:10%;" scope="col">Description</th>
	                                                        <th style="width:10%;" scope="col">Media Links</th>
	                                                        <th style="width:45%;" scope="col">Action</th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody id="tbody">
	                                                    <script>
	                                                        $(document).ready(function(){
	                                                            $.getJSON("http://recordlabel/api/release/read.php", function(data){
	                                                                // alert(data);
	                                                                // console.log(data);  
	                                                                var sn = 0;
	                                                                var read_release_html = "";
	                                                                $.each(data.records, function(key, val) {
	                                                                    // for serial numbering
	                                                                    sn++;
	                                                                    if (val.release_info.length > 50) {
																	       release_info = val.release_info.substring(0, 50)+'...';
																	    }else{
																	    	release_info = val.release_info;
																	    }
																	    var string = new Array();
																	    string = val.media_link.split(", ");
																	    var media_link = '';
																	 	$.each(string, function(key, val){
																		    media_link+=`<a target='_blank' href='` + val + `'>` + val + `</a><br>`;
																		});
																		// $('#link').html(media_link); 

	                                                                    // creating new table row per record
	                                                                    read_release_html+=`<tr>
	                                                                        <th scope="row">` + sn + `</th>
	                                                                        <td>` + val.release_title + `
	                                                                            <img style="display:block;" src="` + val.release_img + `" width="100px" height="100px" class="preview" />
	                                                                        </td>
	                                                                        <td>` + val.release_date + `</td>
	                                                                        <td><audio style="width:180px;height:50px;" controls preload="metadata" >
									                                            <source src="` + val.release_audio + `"/>;
									                                        </audio></td>
	                                                                        <td>` + val.artist + `</td>
	                                                                        <td>` + val.producer + `</td>
	                                                                        <td>` + release_info + `</td>
	                                                                        <td><div id="link">` + media_link + `</div></td>
	                                                                        <td class="btnBasket">
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-primary read-one-release-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-eye-open'></span>Read
	                                                                            </button>
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-info update-release-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-edit'></span>Edit
	                                                                            </button>
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-danger delete-release-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-remove'></span>Delete
	                                                                            </button>
	                                                                        </td>
	                                                                    </tr>`;
	                                                                });
	                                                                // end table
	                                                                read_release_html+=`</tbody></table>`;
	                                                                // inject to 'page-content' of our app
	                                                                $("#tbody").html(read_release_html);
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
            
            
        