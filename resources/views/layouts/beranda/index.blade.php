@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
              <p>Jumlah Positif</p>
              <span style="font-size: 25px;" data-toggle="counter-up"><b>{{ $positif }}</b></span>
                <p>Orang</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner">
              <p>Jumlah Sembuh</p>
                <span style="font-size: 25px;" data-toggle="counter-up"><b>{{ $sembuh }}</b></span>
                <p>Orang</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-body"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <p>Jumlah Meninggal</p>
                <span style="font-size: 25px;" data-toggle="counter-up"><b>{{ $meninggal }}</b></span>
                <p>Orang</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-pulse-strong"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
   

 
  @endsection
  @push('js')
    
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    });
  </script>
  @endpush