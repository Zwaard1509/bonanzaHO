
<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('assets')}}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{asset('assets')}}/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets')}}/demo/demo.css" rel="stylesheet" />
  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="">
  <div class="wrapper" style="width: 120%; margin:0 auto;">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
          <div class="logo-image-small">
            <img src="{{asset('assets')}}/img/HOimage.png">
          </div>
          <!-- <p>CT</p> -->
        <a href="" class="simple-text logo-normal">
          Zexraa Company
          <!-- <div class="logo-image-big">
            <img src="{{asset('assets')}}/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <!---- Menu ---->
        <ul class="nav">
        <li>
          <a href="{{ url('dashboard') }}" class="nav-link">
              <!-- <i class="nc-icon nc-diamond"></i> -->
              <p>Dashboard</p>
            </a>
          </li>
          <li>
          <a href="{{ url('jenis') }}" class="nav-link">
              <!-- <i class="nc-icon nc-diamond"></i> -->
              <p>Jenis Makanan</p>
            </a>
          </li>
          <li>
          <a href="{{ url('kategori') }}" class="nav-link">
              <!-- <i class="nc-icon nc-diamond"></i> -->
              <p>Kategori</p>
            </a>
          </li>
          <li>
            <a href="{{ url('menu') }}" class="nav-link">
              <!-- <i class="nc-icon nc-bell-55"></i> -->
              <p>Menu Makanan</p>
            </a>
          </li>
          <li>
            <a href="{{ url('stok') }}" class="nav-link">
              <!-- <i class="nc-icon nc-single-02"></i> -->
              <p>Stok</p>
            </a>
          </li>
          <li>
            <a href="{{ url('pelanggan') }}" class="nav-link">
              <!-- <i class="nc-icon nc-tile-56"></i> -->
              <p>Pelanggan</p>
            </a>
          </li>
          <li>
            <a href="{{ url('meja') }}" class="nav-link">
              <!-- <i class="nc-icon nc-caps-small"></i> -->
              <p>meja</p>
            </a>
          </li>
          <li>
            <a href="{{ url('produktitipan') }}" class="nav-link">
              <!-- <i class="nc-icon nc-caps-small"></i> -->
              <p>Produk Titipan</p>
            </a>
          </li>
          <li>
            <a href="{{ route('logout') }}" class="nav-link">
              <!-- <i class="nc-icon nc-caps-small"></i> -->
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Bonanza Coffee</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="pemesanan">
             <li>
              <a href="{{ url('pemesanan') }}" class="nav-link" style="font-weight: bold; font-size: large;">
              <!-- <i class="nc-icon nc-tile-56"></i> -->
                <p>Pemesanan</p>
              </a>
            </li>
            <li>
              <a href="{{ url('karyawan') }}" class="nav-link" style="font-weight: bold; font-size: large;">
              <!-- <i class="nc-icon nc-tile-56"></i> -->
                <p>Karyawan</p>
              </a>
            </li>
            <li>
              <a href="{{ url('detailtransaksi') }}" class="nav-link" style="font-weight: bold; font-size: large;">
                <p>Detail Transaksi</p>
              </a>
            </li>
            <li>
              <a href="{{ url('about') }}" class="nav-link" style="font-weight: bold; font-size: large;">
                <p>About</p>
              </a>
            </li>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- Content -->
      @yield('content')

      <!-- End Content -->
@include('template.footer')