<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 30/06/2017
 * Time: 12:38
 */ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Freelance</title>

    <?php include_once 'head.php'; ?>

</head>
<body>

<!-- START #fh5co-header -->
<?php include_once 'menu.php' ?>

<!-- START #fh5co-hero -->
<aside id="fh5co-hero" style="background-image: url(../public/assets/images/hero.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="fh5co-hero-wrap">
                    <div class="fh5co-hero-intro">
                        <h2>Get Started<span></span></h2>
                        <h1>PLACE YOUR ORDER</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<div id="fh5co-main">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fh5co-uppercase-heading-sm text-center">CALCULATE THE PRICE OF YOUR ORDER</h2>
                    <div class="fh5co-spacer fh5co-spacer-sm"></div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form action="#" method="post" enctype="multipart/form-data">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="discipline" class="control-label">Discipline Type</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="ti-panel"></i>
                                    </div>
                                    <select class="form-control input-lg" id="discipline">
                                        <option>--Discipline Type--</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="discipline" class="control-label">Project Type</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="ti-target"></i>
                                    </div>
                                    <select class="form-control input-lg" id="discipline">

                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                            </div>
                        </div>




                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="noOfPages" class="control-label">Number of Pages</label>
                            <div class="input-group">

                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-number input-lg" disabled="disabled" data-type="minus"
                                                      data-field="noOfPages">
                                                  <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>

                                <input type="text" name="noOfPages" class="form-control input-number input-lg" value="1" min="1"
                                                                       max="100">
                                     <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary btn-number input-lg" data-type="plus" data-field="noOfPages">
                                                  <span class="glyphicon glyphicon-plus"></span>
                                              </button>
                                     </span>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="noOfref" class="control-label">Number of References</label>
                                <div class="input-group">

                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-number input-lg" disabled="disabled" data-type="minus"
                                                data-field="noOfref">
                                                  <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>

                                    <input type="text" name="noOfref" class="form-control input-number input-lg" value="1" min="1"
                                           max="100">
                                    <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary btn-number input-lg" data-type="plus" data-field="noOfref">
                                                  <span class="glyphicon glyphicon-plus"></span>
                                              </button>
                                     </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="discipline" class="control-label">Format</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="ti-dashboard"></i>
                                    </div>
                                    <select class="form-control input-lg" id="format">

                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deadline" class="control-label">Deadline in Hours</label>
                                <div class="input-group">

                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-number input-lg" disabled="disabled" data-type="minus"
                                                data-field="deadline">
                                                  <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>

                                    <input type="text" name="deadline" class="form-control input-number input-lg" value="1" min="1"
                                           max="10000">
                                    <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary btn-number input-lg" data-type="plus" data-field="deadline">
                                                  <span class="glyphicon glyphicon-plus"></span>
                                              </button>
                                     </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deadline" class="control-label">Upload files</label>
                                <div class="input-group">

                                    <input class="form-control input-lg" name="filesToUpload[]" id="filesToUpload" type="file" multiple="" />
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg " value="Send">

                                <input type="reset" class="btn btn-outline btn-lg " value="Reset">
                            </div>
                        </div>


                    </form>
                    <div class="fh5co-spacer fh5co-spacer-sm"></div>
                </div>

            </div>

        </div>
    </section>
    <?php include_once 'footer_details.php'; ?>
</div>


<?php include_once 'footer.php'; ?>

</body>
</html>