@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{count($user)}}</h3>

                        <p>Members</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('all_user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{count($students)}}<sup style="font-size: 20px"></sup></h3>

                        <p>Cuetians</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{count($notice)}}</h3>

                        <p>Notices</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('home')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{count($visitor)}}</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

                @foreach($notice as $row)
                    <p>
                        <button class="btn btn-primary accordion-section-title" type="button" data-toggle="collapse" data-target="#multiCollapseExample2_{{$row->id}}" aria-expanded="false" aria-controls="multiCollapseExample2">{{$row->title}}</button>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample2_{{$row->id}}">
                                <div align="center" class="callout callout-info card card-body">
                                    <b>{{$row->description}}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<h4 align="center">{{$row->title}}</h4>
                    <p align="center" style="font-size: 40px;color: purple;font-family: courier, monospace;"><b>{{$row->description}}</b></p><br><hr>--}}
                @endforeach

        </div>
       {{-- <div class="row">

            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>

                    <h3 class="box-title">Calendar</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Add new event</a></li>
                                <li><a href="#">Clear events</a></li>
                                <li class="divider"></li>
                                <li><a href="#">View calendar</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                </div>

            </div>


        </div>--}}
    </section>
    <!-- /.content -->
@endsection

@section('head_html')
    @parent
    <style>
        .accordion-section-title {
            width: 100%;
            padding: 8px;
            display: inline-block;
            border-bottom: 1px solid #FFCA12;
            background: #b5bbc8;
            transition: all linear 0.15s;
            font-size: 1.200em;
            /* text-shadow: 0px 1px 0px #FFCA12; */
            color: #3c763d;
            font-family: 'kalpurushregular' !important;
        }
        .callout {
            border-radius: 3px;
            margin: 0 0 20px 0;
            padding: 15px 30px 15px 15px;
            border-left: 5px solid #eee;
            font-size: 30px;
            color: purple;
            font-family: courier, monospace;
        }
    </style>
@endsection