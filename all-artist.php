<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
?>
            
            
            <div class="page-content">
                <div class="container-fluid" id="app_div">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">All Artist</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-container">
                                        <div class="table-responsive" style="height: 450px;overflow: auto;">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">S/N</th>
                                                        <th style="width:10%;" scope="col">Fullname</th>
                                                        <th scope="col">Stage Name</th>
                                                        <th style="width:15%;" scope="col">Description</th>
                                                        <th scope="col">Gender</th>
                                                        <th scope="col">Age</th>
                                                        <th scope="col">Genre</th>
                                                        <th scope="col"> Media Links</th>
                                                        <th scope="col">Location</th>
                                                        <th style="width:75%;"scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                    <script>
                                                        $(document).ready(function(){
                                                            $.getJSON("http://recordlabel/api/artist/read.php", function(data){
                                                                // alert(data);
                                                                // console.log(data);  
                                                                var sn = 0;
                                                                var info;
                                                                var read_artist_html = "";
                                                                $.each(data.records, function(key, result) {
                                                                    // for serial numbering
                                                                    sn++;
                                                                    // creating new table row per record
                                                                    if (result.stage_name) {
                                                                        stage_name = `<span style="color: #fff;" class="badge badge-info">`+result.stage_name+`</span>` 
                                                                    }

                                                                    if (result.info.length > 30) {
                                                                       info = result.info.substring(0, 30)+'...';
                                                                    }else{
                                                                        info = result.info;
                                                                    }

                                                                    var string = new Array();
                                                                    string = result.social_media_link.split(", ");
                                                                    var social_media_link = '';
                                                                    $.each(string, function(key, result){
                                                                        social_media_link+=`<a target='_blank' href='` + result + `'>` + result + `</a><br>`;
                                                                    });

                                                                    read_artist_html+=`<tr>
                                                                        <th scope="row">` + sn + `</th>
                                                                        <td>` + result.fullname + `
                                                                            <img style="display:block;" src="` + result.artist_img + `" width="100px" height="100px" class="preview" />
                                                                        </td>
                                                                        <td>` + stage_name + `</td>
                                                                        <td>` + info + `</td>
                                                                        <td>` + result.artist_gender + `</td>
                                                                        <td>` + result.age + `</td>
                                                                        <td>` + result.genre + `</td>
                                                                        <td><div id="link">` + social_media_link + `</div></td>
                                                                        <td>` + result.location + `</td>
                                                                        <td class="btnBasket">
                                                                            <button type="button" class="actionBtn btn-sm btn btn-primary read-one-artist-button" data-id='` + result._id + `'>
                                                                                <span class='glyphicon glyphicon-eye-open'></span>Read
                                                                            </button>
                                                                            <button type="button" class="actionBtn btn-sm btn btn-info update-artist-button" data-id='` + result._id + `'>
                                                                                <span class='glyphicon glyphicon-edit'></span>Edit
                                                                            </button>
                                                                            <button type="button" class="actionBtn btn-sm btn btn-danger delete-artist-button" data-id='` + result._id + `'>
                                                                                <span class='glyphicon glyphicon-remove'></span>Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>`;
                                                                });
                                                                // end table
                                                                read_artist_html+=`</tbody></table>`;
                                                                // inject to 'page-content' of our app
                                                                $("#tbody").html(read_artist_html);
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
                
            </div><!-- Page Content -->

            <?php 
                require_once 'partials/chatBar.inc.php';
                require_once 'partials/footer.inc.php';
            ?>
            
            
        