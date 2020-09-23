<?php
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
?>

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Video Streams</h2>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    List of video streams according to date.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       

                       <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Video 1</h5>
                                    <video width="320" height="240" controls>
                                        <source src="assets/video/a.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Video 2</h5>
                                    <video width="320" height="240" controls>
                                        <source src="assets/video/a.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Video 3</h5>
                                    <video width="320" height="240" controls>
                                        <source src="assets/video/a.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Video 4</h5>
                                    <video width="320" height="240" controls>
                                        <source src="assets/video/a.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div><!-- Page Content -->


<?php require_once 'partials/footer.inc.php';  ?>