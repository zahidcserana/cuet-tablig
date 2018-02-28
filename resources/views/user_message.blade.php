@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Message List</h3>
                        <a style="margin-left: 35%;" class="btn btn-primary fa fa-plus" href="{{route('message_add')}}"></a>
                        <a style="float: right" class="btn btn-primary fa fa-backward" href="{{route('home')}}"></a>
                    </div>

                    <div class="box-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class='alert alert-success'>
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
                        @endif

                        @if(count($messages)>0)
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$row->body}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>
                                            <a href="{{route('message',$row->id)}}">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('head_html')
    @parent
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
