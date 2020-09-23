<?php ob_start();
    require_once 'partials/header.inc.php';
    require_once 'partials/quickSearch.inc.php';
    require_once 'partials/sideBar.inc.php'; 
    
?>
            <div class="page-content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mailbox-list">
                                <ul class="list-unstyled" id="list-unstyled">
                                    
                                    <?php 
                                        $api_url = "http://recordlabel/api/contact/read.php";
                                        $client = curl_init($api_url);
                                        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                                        $response = curl_exec($client);
                                        $response = json_decode($response);
                                        // var_dump($response);
                                        foreach ($response as $process) {
                                            // var_dump($process[0]);
                                            foreach ($process as $result) {
                                                if (strlen($result->message) <= 50) {
                                                  $message = $result->message;
                                                } else {
                                                  $message = substr($result->message, 0, 50) . '...';
                                                }
                                                $time = date("M n, Y H:i:s A", strtotime($result->created));
                                                if ($result->seen == 0) { ?>
                                                    <li>
                                                        <a href="read-mail.php?_id=<?= $result->_id ?>" class="mail mail-active">
                                                            <div class="mail-checkbox">
                                                                <input type="checkbox" class="filled-in" id="mail-checkbox3">
                                                                <label for="mail-checkbox3"></label>
                                                            </div>
                                                            <h5 class="mail-author"><?= ucwords($result->name); ?></h5>
                                                            <h4 class="mail-title"><?= ucfirst($result->subject); ?></h4>
                                                            <p class="d-sm-none d-md-block mail-text"><?= ucfirst($message); ?></p>
                                                            <div class="mail-date"><?= $time; ?></div>
                                                            <input type="hidden"id="_id" name="_id" value="<?= $result->_id; ?>">
                                                        </a>
                                                    </li>

                                    <?php }else{ ?>
                                        <li>
                                            <a href="read-mail.php?_id=<?= $result->_id ?>" class="mail">
                                                <div class="mail-checkbox">
                                                    <input type="checkbox" class="filled-in" id="mail-checkbox4">
                                                    <label for="mail-checkbox4"></label>
                                                </div>
                                                <h5 class="mail-author"><?= ucwords($result->name); ?></h5>
                                                <h4 class="mail-title"><?= ucfirst($result->subject); ?></h4>
                                                <p class="d-sm-none d-md-block mail-text"><?= ucfirst($message); ?></p>
                                                <div class="mail-date"><?= $time; ?></div>
                                            </a>
                                        </li>
                                    <?php }}}?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Page Content -->
        </div><!-- App Container -->
        
<?php 
    require_once 'partials/chatBar.inc.php';
    require_once 'partials/footer.inc.php';
?>