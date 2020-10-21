<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
?>
            
            
            <div class="page-content">
                <div class="container-fluid" id="app_div">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">All Admin</h2>
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
                                                        <th style="width:20%;" scope="col">Fullname</th>
                                                        <th scope="col">Email</th>
                                                        <th style="width:20%;" scope="col">Address</th>
                                                        <th scope="col">Number</th>
                                                        <th scope="col">Gender</th>
                                                        <th scope="col">Type</th>
                                                        <th style="width:60%;"scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                    <script>
                                                        $(document).ready(function(){
                                                            $.getJSON("http://recordlabel/api/admin/read.php", function(data){
                                                                // alert(data);
                                                                // console.log(data);  
                                                                var sn = 0;
                                                                var read_admin_html = "";
                                                                $.each(data.records, function(key, val) {
                                                                    // for serial numbering
                                                                    sn++;
                                                                    // creating new table row per record
                                                                    switch (val.access_level) {
                                                                        case 'Admin':
                                                                            access_level = `<span style="color: #fff;" class="badge badge-primary">`+val.access_level+`</span>`
                                                                            break;
                                                                        case 'Auxiliary':
                                                                            access_level = `<span style="color: #fff;" class="badge badge-warning">`+val.access_level+`</span>`
                                                                            break;
                                                                        default:
                                                                            access_level = `<span style="color: #fff;" class="badge badge-success">`+val.access_level+`</span>`
                                                                    }
                                                                    read_admin_html+=`<tr>
                                                                        <th scope="row">` + sn + `</th>
                                                                        <td>` + val.fullname + `
                                                                            <img style="display:block;" src="` + val.profile_img + `" width="100px" height="100px" class="preview" />
                                                                        </td>
                                                                        <td>` + val.email + `</td>
                                                                        <td>` + val.address + `</td>
                                                                        <td>` + val.contact_number + `</td>
                                                                        <td>` + val.gender + `</td>
                                                                        <td>` + access_level + `</td>
                                                                        <td class="btnBasket">
                                                                            <button type="button" class="actionBtn btn-sm btn btn-primary read-one-admin-button" data-id='` + val._id + `'>
                                                                                <span class='glyphicon glyphicon-eye-open'></span>Read
                                                                            </button>
                                                                            <button type="button" class="actionBtn btn-sm btn btn-info update-admin-button" data-id='` + val._id + `'>
                                                                                <span class='glyphicon glyphicon-edit'></span>Edit
                                                                            </button>
                                                                            <button type="button" class="actionBtn btn-sm btn btn-danger delete-admin-button" data-id='` + val._id + `'>
                                                                                <span class='glyphicon glyphicon-remove'></span>Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>`;
                                                                });
                                                                // end table
                                                                read_admin_html+=`</tbody></table>`;
                                                                // inject to 'page-content' of our app
                                                                $("#tbody").html(read_admin_html);
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
            
            
        