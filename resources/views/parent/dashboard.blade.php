@extends('layouts.admin')

@section('title', 'Parent Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Children</h3>
                <p>View Children's Progress</p>
            </div>
            <div class="icon">
                <i class="fas fa-child"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Attendance</h3>
                <p>View Attendance Records</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>Reports</h3>
                <p>View Academic Reports</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Activities</h3>
            </div>
            <div class="card-body">
                <p>Welcome to your parent dashboard! Here you can monitor your children's progress, attendance, and academic performance.</p>
            </div>
        </div>
    </div>
</div>
@endsection
