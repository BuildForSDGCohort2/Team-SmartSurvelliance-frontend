<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
?>
            
            
            <div class="page-content">
                <div class="container-fluid" id="app_div">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">All Banner</h2>
                        </div>
                    </div>
                    <script>
				        function encode() {
					        var selectedfile = document.getElementById("banner_img").files;
					        if (selectedfile.length > 0) {
					          var imageFile = selectedfile[0];
					          var fileReader = new FileReader();
					          fileReader.onload = function(fileLoadedbanner) {
					            var srcData = fileLoadedbanner.target.result;
					            var newImage = document.createElement('img');
					            newImage.style.width = "100%";
								newImage.style.height = "100%";
					            newImage.src = srcData;
					            document.getElementById("dummy").innerHTML = newImage.outerHTML;
					            document.getElementById("banner_img_base64").value = srcData;
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
		                                <form id="add_banner_form" class="needs-validation" enctype="multipart/form-data" novalidate>
		                                	<div class="form-row">
		                                        <div class="col-md-12 mb-6">
		                                            <div class="form-group">
		                                                 <tr>
												            <td>Banner Title</td>
												            <td><input type="text" class="form-control" id="banner_title" name="banner_title"></td>
												        </tr>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-row" style="position: relative;">
		                                        <div class="col-md-6 mb-6">
		                                            <div class="form-group">
		                                                <!-- <label for="banner_img">Choose Image</label> -->
		                                                <input required type="file" class="form-control InputBox" id="banner_img" placeholder="Choose Image" name="banner_img" onchange="encode();">
		                                            </div>
		                                        </div>

		                                        <div>
											      <input id="banner_img_base64" name="banner_img_base64" type="hidden" />
											    </div>

		                                        <div class="col-md-6 mb-6">
		                                            <div class="form-group">
			                                            <div id="dummy" style="width: 80px;height: 80px;display: block;position: absolute;top: 0%;left: 0%;background-image:url(assets/images/avatars/noimage1.png);background-repeat:no-repeat;background-size:cover;">
												    	</div>
		                                            </div>
		                                        </div>

		                                    </div><br>
		                                    <div class="col-md-12" style="position: relative;">
			                                    <button class="btn btn-primary float-right" id="add_banner" name="add_banner" type="submit">Add</button>
			                                    <button id="banner_loader" style="display: none;cursor: not-allowed;" class="btn btn-primary float-right" type="button" disabled>
			                                        <span class="spinner-border spinner-border-sm" role="status"></span>
			                                        Loading...
			                                    </button>  
	                                        </div></br></br></br>
		                                </form>
		                                <script>
		                                	// trigger when registration form is submitted
											$(document).ready(function(){
										        $(document).on('submit', '#add_banner_form', function(e){
										            e.preventDefault();
										            // alert('Hey');
												    var banner_title = $('#banner_title').val();
												 	var banner_img = $('#banner_img').val();
												 	var banner_img_base64 = $('#banner_img_base64').val();

												 	if(banner_title == "" || banner_img == "" ) {
											        	// $('#errorAlert').slideDown(300).delay(5000).slideUp(300).html("Form inputs cannot be empty.");
											            toastr.warning('Form inputs cannot be empty!');
											        }else{

											        	var obj = { "banner_title":banner_title, "banner_img":banner_img_base64 };
														var form_data = JSON.stringify(obj);

													 	// alert(form_data);
													    // submit form data to api
													    $.ajax({
													        url: "../api/banner/create.php",
													        type : "POST",
													        contentType : 'application/json',
													        data : form_data,
													        beforeSend: function(){
											                    setTimeout(function () {
															        $('#add_banner').html('Loading...');
															    }, 100); 
											                },
													        success : function(result) {
													        	// alert(result.message);
													        	// console.log(result.message);
													            toastr.success(result.message);
													            $("#add_banner_form")[0].reset();
													            setTimeout(function(){
													            	$('#add_banner').delay(3000).html('Add');
																   window.location.reload(true);
																}, 2000);
													        },
													        error: function(xhr, resp, text){
													            // on error, tell the user sign up failed
													            setTimeout(function () {
													            	toastr.error(result.message);
															        $('#add_banner').html('Add');
															    }, 4000); 
													        }
													    });
													 
													    return false;
											        }
										        });
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
	                                        <div class="table-responsive" style="height: 400px;overflow: auto;">
	                                            <table class="table">
	                                                <thead>
	                                                    <tr>
	                                                        <th scope="col">S/N</th>
	                                                        <th style="width:25%;" scope="col">Banner Title</th>
	                                                        <th style="width:20%;" scope="col">Banner Image</th>
	                                                        <th style="width:55%;"scope="col">Action</th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody id="tbody">
	                                                    <script>
	                                                        $(document).ready(function(){
	                                                            $.getJSON("http://recordlabel/api/banner/read.php", function(data){
	                                                                // alert(data);
	                                                                // console.log(data);  
	                                                                var sn = 0;
	                                                                var read_banner_html = "";
	                                                                $.each(data.records, function(key, val) {
	                                                                    // for serial numbering
	                                                                    sn++;
	                                                                    // creating new table row per record
	                                                                    read_banner_html+=`<tr>
	                                                                        <th scope="row">` + sn + `</th>
	                                                                        <td>` + val.banner_title + `</td>
	                                                                        <td>
	                                                                        <img style="display:block;" src="` + val.banner_img + `" width="100px" height="100px" class="preview" />
	                                                                        </td>
	                                                                        <td class="btnBasket">
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-primary read-one-banner-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-eye-open'></span>Read
	                                                                            </button>
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-info update-banner-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-edit'></span>Edit
	                                                                            </button>
	                                                                            <button type="button" class="actionBtn btn-sm btn btn-danger delete-banner-button" data-id='` + val._id + `'>
	                                                                                <span class='glyphicon glyphicon-remove'></span>Delete
	                                                                            </button>
	                                                                        </td>
	                                                                    </tr>`;
	                                                                });
	                                                                // end table
	                                                                read_banner_html+=`</tbody></table>`;
	                                                                // inject to 'page-content' of our app
	                                                                $("#tbody").html(read_banner_html);
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
            
            
        