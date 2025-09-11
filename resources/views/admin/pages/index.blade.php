@extends('admin.layouts.app')



@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">


            <!-- Right side columns -->
            <div class="col-lg-6">

                <!-- Recent Activity -->
                <div class="card">


                    <div class="card-body">
                        <h5 class="card-title">Recent News <span> </span></h5>

                        <div class="activity">

                            

                        </div>

                    </div>
                </div><!-- End Recent Activity -->


            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
