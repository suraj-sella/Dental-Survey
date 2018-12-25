<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/tooth.png');?>"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.css'/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
  </head>
  <body ng-app='myApp' ng-controller="myCtrl">
    <div class="container-fluid">
      <div class="row headsection">
        <div class="col-md-4 text-center">
          <h1><?php echo $heading?></h1>
        </div>  
        <div class='offset-md-5 col-md-3'>
          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <a name="" id="" class="btn btn-light" href="#!" role="button">Home</a>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="Second group">
              <a name="" id="" class="btn btn-light" href="#!complaints" role="button">Complaints</a>
            </div>
            <div class="btn-group" role="group" aria-label="Third group">
              <a name="" id="" class="btn btn-light" href="#!findings" role="button">Findings</a>    
            </div>
          </div>
        </div>
      </div>