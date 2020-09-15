@section('title','We grow with your growth')
@section('keywords','Ennvisage, Information Technology')
@extends('frontEnd.layouts.master')
@section('content')
<div id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Contact Us</h2>
        <!-- <ol>
          <li><a href="index.html">Home</a></li>
          <li>Portfolio Details</li>
        </ol> -->
      </div>
    </div>
  </section>
  <div class="contact-wrapper">
    <section class="contact sec">
      <div class="container-lg">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="wrap">
              <div class="contact-detail-wrap">
                <div class="contact-detail-title">
                  <h3>We love to hear from you, please post a query.</h3>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores doloremque iusto tempore.</p>
                </div>
                <div class="info-wrap">
                  <div class="info">
                    <p><i class="fa fa-envelope"></i> EMAIL: <a href="mailto:info@fincheck.co.uk">info@syncboat.com</a></p>
                  </div>
                </div>
                <div class="info-wrap">
                  <div class="info">
                    <p><i class="fa fa-phone"></i> PHONE: <a href="tel:+">+1 9876543210</a></p>
                  </div>
                </div>
                <div class="info-wrap">
                  <div class="info">
                    <p><i class="fa fa-map-marker"></i> LOCATION: <a href="javascript:;" target="_blank">17 Torphin Road, Edinburgh, UK.</a></p>
                  </div>
                </div>
                <ul class="social-list">
                  <li>
                    <a href="javascript:;">
                      <i class="fa fa-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa fa-facebook-f"></i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa fa-instagram"></i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa fa-linkedin-in"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="form-wrap">
                <div class="title-wrap">
                  <h3>Post Your Query</h3>
                </div>
                <form>
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label>Email:</label>
                        <input type="text" placeholder="Enter Your Email" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label>Subject</label>
                        <input type="text" placeholder="Enter Your Subject" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <label>Message</label>
                        <input type="text" placeholder="Message" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="button">
                    <button type="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@stop