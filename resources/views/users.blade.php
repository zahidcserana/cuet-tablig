@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cuetian : {{count($users)}}</h3>
                        <input style="margin-left: 25%;" class="btn btn-info" type="button" onclick="printDiv('printableArea')" value="Print" />
                        <a class="btn btn-warning" href="{{action('UsersController@downloadPDF')}}">PDF</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".myModal">Preview</button>
                        <a style="float: right" class="btn btn-primary fa fa-backward" href="{{route('home')}}"> Back</a>
                        @if(Auth::user()->type == 1)
                        <a style="float: right;background-color: #1ab7ea"  class="btn btn-primary fa fa-plus" href="{{route('user_add')}}"> Add New</a>
                        @endif

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
                        <form action="" method="get">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$name or ''}}">
                                        </td>
                                        <td>
                                            <select name="batch" id="batch" class="form-control">
                                                <option value="">Batch</option>
                                                @for($i=date('Y'); $i>=1971;$i--)
                                                    <option {{$batch==$i?'selected':""}} value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{$email or ''}}">
                                        </td>
                                        <td>
                                            <select name="department" id="department" class="form-control">
                                                <option value="">Department</option>
                                                @foreach($department=\Config::get('cuet.department') as $key=>$value)
                                                    <option {{$department==$key?'selected':""}} value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button name="submit" type="submit" id="search" class="form-control btn-primary" value="search">Search</button>
                                        </td>
                                        <td>
                                            <a class="form-control btn-success" href="{{route('users')}}">Reset</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        @if(count($users)>0)
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        @if(Auth::user()->type==1)
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $row)
                                        <tr class="{{($t%2==0?'tr-odd':'tr-even')}}">
                                            <td>{{$t++}}</td>
                                            <td>
                                                <img height="50" width="50" src="{{$row->picture==''?asset('/assets/images/avator.png'):asset('/assets/images/users/'.$row->picture)}}" class="img-circle" alt="Image">
                                            </td>
                                            <td>
                                                <a href="{{route('user_view',$row->id)}}">{{$row->name}}</a>
                                            </td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->mobile1}}</td>
                                            @if(Auth::user()->type==1)
                                            <td>
                                                <a class="btn btn-info" href="{{route('user_view',$row->id)}}">Delete</a>
                                            </td>
                                            @endif
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
    <!-- Modal -->
    <div id="printableArea" class="myModal modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div align="center" class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    <h4 class="modal-title" style="color: lightseagreen">Cuetian: {{count($users)}}</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" border="1">
                        <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Department</th>
                            <th>Hall</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile1</th>
                            <th>Mobile2</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $row)
                            <tr>
                                <td>{{$row->batch or ''}}</td>
                                <td>{{isset($row->department)==true?departmentName($row->department):''}}</td>
                                <td>{{isset($row->hall)==true?hallName($row->hall):''}}</td>
                                @if($row->marriage_status==1)
                                    <td style="color: #45bc3c">{{$row->name}}</td>
                                @else
                                    <td>{{$row->name}}</td>
                                @endif                            <td>{{$row->email}}</td>
                                <td>{{$row->mobile1}}</td>
                                <td>{{$row->mobile2}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                </div>
            </div>

        </div>
    </div>
@endsection

@section('head_html')
    @parent
    <script>
        $(function () {
            var oTable = $('#example1').dataTable();
            oTable.fnSort( [ [0,'desc'] ] );
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

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <style type="text/css">
        @media screen and (min-width: 1000px) {
            .modal-dialog {
                width: 1000px; /* New width for default modal */
            }
            .modal-sm {
                width: 500px; /* New width for small modal */
            }
        }
        @media screen and (min-width: 1200px) {
            .modal-lg {
                width: 1000px; /* New width for large modal */
            }
        }
        .tr-odd {
            background-color: #d2d6de;
        }
        .tr-even {
            background-color: #ddd!important;
        }
    </style>

@endsection
