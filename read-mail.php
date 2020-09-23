<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
    
?>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <?php  
                            if (isset($_GET['_id'])) {
                                // echo $_GET['_id'];
                                $_id = $_GET['_id'];

                                $api_url = "http://recordlabel/api/contact/read_single.php?_id=".$_id;
                                $client = curl_init($api_url);
                                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                                $pro = curl_exec($client);
                                $pro = json_decode($pro);
                                $recipient = ucfirst("info@recordlabel.com");
                                // var_dump($pro); 
                                $msg_subject = ucwords($pro->subject);
                                $msg_time = ucfirst($pro->created);
                                $msg_time = date("M n, Y H:i A", strtotime($msg_time));
                                { ?>
                                    <script>
                                        $(document).ready(function(){
                                            function ajaxSubmit() {
                                                var id = "<?= $_GET['_id']; ?>";
                                                // console.log(id);
                                                var seen = 1;
                                                var obj = { "seen":seen, "_id":id };
                                                var form_data = JSON.stringify(obj);

                                                $.ajax({
                                                    url: "http://recordlabel/api/contact/mark_as_read.php",
                                                    type : "PUT",
                                                    dataType: 'json',
                                                    contentType : 'application/json',
                                                    data : form_data,
                                                    success: function(response) {
                                                        if(response == "Successful")
                                                        {
                                                            $('form').removeAttr('onsubmit'); // prevent endless loop
                                                            $('form').submit();
                                                        }
                                                    }
                                                });

                                                return false;
                                            }
                                            ajaxSubmit();
                                        });
                                    </script>
                                    <div class="col-lg-9 col-md-7 col-sm-12">
                                        <div class="mailbox-options">
                                            <ul class="list-unstyled">
                                                <li><a href="#">Reply</a></li>
                                                <li><a href="#">Forward</a></li>
                                                <li><a href="#">Spam</a></li>
                                                <li><a href="#">Mark as read</a></li>
                                            </ul>
                                        </div>
                                        <?php
                                            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                                            // echo "<a href='$url' class='previous round'>&#8249;</a>"; 
                                            echo "<a href='$url' class='btn btn-text-secondary m-t-xs'>&#8249;Go Back</a>";
                                        ?>
                                        <div class="mailbox-view">
                                            <div class="mailbox-view-header">
                                                <div class="float-left">
                                                    <div class="float-left">
                                                        <span class="mailbox-title"><?php if ($_GET['_id']): ?>
                                                            <?= $msg_subject; ?>
                                                        <?php endif ?></span>
                                                        <span class="mailbox-author"><?= $pro->email; ?></span>
                                                    </div>
                                                </div>
                                                <div class="float-right">
                                                    <a href="#" class="btn btn-text-secondary m-t-xs">Print</a>
                                                    <a href="#" class="btn btn-text-danger m-t-xs">Delete</a>
                                                </div>
                                            </div>
                                            <div class="divider mailbox-divider"></div>
                                            <div class="mailbox-text">
                                                <div class="mailbox-details">
                                                    <a href="javascript:void(0);" class="details-toggle">Details</a>
                                                    <div class="row ">
                                                        <div class="col-sm-4 first-col">
                                                            <span>From</span>
                                                            <span>To</span>
                                                            <span>Date</span>
                                                        </div>
                                                        <div class="col-sm-8 second-col">
                                                            <span><?= ucfirst($pro->email); ?></span>
                                                            <span><?= $recipient; ?></span>
                                                            <span><?= $msg_time; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p><?= $pro->message; ?></p>
                                                <div class="divider mailbox-divider"></div>
                                                
                                            </div>
                                            <a href="#" class="btn btn-danger mailbox-compose" data-toggle="modal" data-target="#composeMessage"><i class="material-icons">mode_edit</i></a>
                                            <div class="modal fade" id="composeMessage" tabindex="-1" role="dialog" aria-labelledby="composeMessage" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Compose</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="recipient">To</label>
                                                                    <input type="email" class="form-control" id="recipient" placeholder="To" value="<?= $pro->email; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subject">Subject</label>
                                                                    <input type="text" class="form-control" id="subject" placeholder="Subject" value="<?= $pro->subject; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="messageBody">Message</label>
                                                                    <textarea class="form-control" id="messageBody" rows="3"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-text-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-text-primary">Send</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php }} else { ?>
                            <div class="col-lg-9 col-md-7 col-sm-12">
                                <p>No email found.</p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- Page Content -->
            </div><!-- App Container -->
        
<?php 
    require_once 'partials/chatBar.inc.php';
    require_once 'partials/footer.inc.php';
?>