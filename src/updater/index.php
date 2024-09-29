<?php
    require_once ("../cnf.inc.php");
    require_once ("../sys.inc.php");

    $writable = "";
    $bwritable = "";

if (!empty($_POST)) {
   
    
    // Store wizard form data to post
    $query = "INSERT INTO tbl_order (billing_name, billing_email, billing_state, billing_city, billing_country, billing_zip, shipping_name, shipping_email, shipping_state, shipping_city, shipping_country, shipping_zip, discount_code, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $paramType = 'ssssssssssssss';
    $paramValue = array(
        $_POST["customer_billing_name"],
        $_POST["billing_email"],
        $_POST["billing_state"],
        $_POST["billing_city"],
        $_POST["billing_country"],
        $_POST["billing_zipcode"],
        $_POST["customer_shipping_name"],
        $_POST["shipping_email"],
        $_POST["shipping_state"],
        $_POST["shipping_city"],
        $_POST["shipping_country"],
        $_POST["shipping_zipcode"],
        $_POST["discount_coupon"],
        $_POST["notes"],
    );
}
?>

<!DOCTYPE html>
<html lang="it" xml:lang="it">

<head>
    <title>fanKounter - Update Wizard</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.9/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.9/dist/js/uikit-icons.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/splash.css" />
    <link rel="stylesheet" type="text/css" href="css/wizard.css" />
</head>

<body>

    <nav class="uk-navbar-container">
        <div class="uk-container">
            <div uk-navbar>

                <div class="uk-navbar-center">
                    
                    <div class="uk-navbar-center-left">
                    </div>
                    
                    <a class="uk-navbar-item uk-logo" href="#" aria-label="Back to Home">
                        <img src="../img/fankounter3.0.png" alt="fanKounter" style="width:230px"/>
                    </a>

                    <div class="uk-navbar-center-right">
                    </div>

                </div>

            </div>
        </div>
    </nav>


    <div class="splash_box fade-in">
        <div class="content round shadow">
            <h1 class="uk-heading-line uk-text-center uk-text-primary">Update Wizard</h1>

            <form method="POST" id="checkout-form" onSubmit="return validateCheckout()">
                <div class="wizard-flow-chart">
                    <span class="fill">1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                </div>
                <?php if (isset($message)) { ?>
                    <div class="message <?php echo $type; ?>"><?php echo $message; ?></div>
                <?php } ?>
                
                <!-- Wizard section 1 -->
                <section id="welcome-session" style="text-align:left">
                    <h2 class="uk-heading-bullet">Benvenuto in fanKounter <?=VERSION ?></h2>
                    <div class="row">
                        Per poter continuare ad utilizzare fanKounter è necessario procedere all'aggiornamemto dei file
                        dati dei contatori alla nuova versione.<br/>
                        Questo processo ti guiderà passo passo fino al completamanto dell'aggiornamento.
                    </div>
                    
                    <div class="row button-row">
                        <hr>
                        <button class="uk-button uk-button-primary uk-button-small" type="button" onClick="validate(this)">Avanti ></button>
                    </div>
                </section>

                <!-- Wizard section 2 -->
                <section id="licence-section" class="display-none" style="text-align:left">
                    <h2 class="uk-heading-bullet">Licenza - fanKounter è un software libero!</h2>

                    <div class="row uk-panel uk-panel-scrollable" style="height:250px">
                        <?php require_once ('docs/AGPL_EN.html'); ?>
                    </div>

                    <div class="row">
                        <input class="uk-checkbox" type="checkbox" name="licence" required> Accetto la licenza</label>
                    </div>
                    
                    <div class="row button-row">
                        <hr>
                        <button class="uk-button uk-button-primary uk-button-small" type="button" onClick="showPrevious(this)">< Indientro</button>
                        <button class="uk-button uk-button-primary uk-button-small" type="button" onClick="validate(this)">Avanti ></button>
                    </div>
                </section>


                <!-- Wizard section 3 -->
                <section id="discount-section" class="display-none"  style="text-align:left">
                    <h2 class="uk-heading-bullet">Da aggiornare</h2>
                    
                    <div class="row">
                        Saranno aggiornati i seguenti contatori e i dati di browscap:
                    </div>

                    <div class="row">
                        <table class="uk-table uk-table-striped uk-table-hover uk-table-small">
                            <thead>
                                <tr>
                                    <th>Contatore</th>
                                    <th>Scrivibile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    //Check contatori da aggiornare
                                    $files = new DirectoryIterator('../'.DATA_FOLDER);

                                    foreach($files as $file) {
                                        $ext = $file->getExtension();
                                        if($ext == "php"){
                                
                                            $dataName = $file->getBasename(".$ext");

                                            $writable = "<span class='uk-form-danger'>NO</span>";
                                            if($file->isWritable()){
                                                $writable = "<span class='uk-form-success'>SI</span>";
                                            }
                                
                                            echo <<<FILE
                                                    <tr>
                                                        <td>$dataName</td>
                                                        <td>$writable</td>
                                                    </tr>
                                                FILE;
                                        }
                                    }

                                    //Check db browscap
                                    $bwritable = "<span class='uk-form-danger'>NO</span>";
                                    $tmp_dir = "../".TEMP_FOLDER;
                                    $browscapdir = $tmp_dir."cache";

                                    if(!file_exists($tmp_dir)){
                                        if(is_writable('../')){
                                            _mkdir_($tmp_dir);
                                            _mkdir_($browscapdir);
                                            $bwritable = "<span class='uk-form-success'>SI</span>";
                                        }
                                    }elseif(!file_exists($browscapdir)){
                                        if (is_writable($tmp_dir)){
                                            _mkdir_($browscapdir);
                                            $bwritable = "<span class='uk-form-success'>SI</span>";
                                        }
                                    }elseif (is_dir($browscapdir) && is_writable($browscapdir)){
                                            $bwritable = "<span class='uk-form-success'>SI</span>";
                                    }
                                    
                                                                        
                                    echo <<<FILE
                                        <tr>
                                            <td>Browscap data</td>
                                            <td>$bwritable</td>
                                        </tr>
                                    FILE;

                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="row button-row">
                        <hr>
                        <!-- button type="button" onClick="showPrevious(this)">Previous</button -->
                        <button class="uk-button uk-button-primary uk-button-small" type="button" onClick="validate(this)">Procedi</button>
                    </div>
                </section>

                <!-- Wizard section 4 -->
                <section id="others-section" class="display-none">
                    <h3>Others:</h3>
                    <div class="row">
                        <label>Notes</label>
                        <textarea name="notes" rows="4" cols="50" id="notes"></textarea>
                    </div>
                    <div class="row button-row">
                        <hr>
                        <button type="button" onClick="showPrevious(this)">Previous</button>
                        <button type="submit">Checkout</button>
                    </div>
                </section>
            </form>
        </div>
    </div>

    <div class="footer fade-in">
		<div class = "part1">
			<b>
                Copyright ©2024 <a href="https://www.hzknight.org">HZKnight.Org</a>
			</b> - Some rights reserved | Powered by eXperience UpdaterWizard v1.0.0
		</div>
		<div class = "part2">
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../libs/js/wizard.js"></script>
</body>

</html>
