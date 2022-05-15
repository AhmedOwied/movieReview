@extends('admin.index')

@section('content')
      <div class="row">
            <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                        <div class="inner">
                              <h3>{{$categoryCount}}</h3>

                              <p>Categories</p>
                        </div>
                        <div class="icon">
                              <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                        <div class="inner">
                              <h3>{{$productCount}}</h3>

                              <p>Movies Count</p>
                        </div>
                        <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('admin.product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                        <div class="inner">
                              <h3>{{$userCount}}</h3>

                              <p>User Registrations</p>
                        </div>
                        <div class="icon">
                              <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                        <div class="inner">
                              <h3>{{$reviewCount}}</h3>

                              <p>Review Count</p>
                        </div>
                        <div class="icon">
                              <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('admin.review.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <!-- ./col -->
      </div>
@endsection
