@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div style="display:none">
    <?php $i=1; ?>
    @foreach($avg as $key => $value)
    <p id="manager_{{$i}}">@if(empty($avg[$key][0]->avg)){{0}}@else{{$avg[$key][0]->avg}}@endif </p>
     <?php $i++; ?>
    @endforeach
</div>
<div class="row">
<?php $i=0;$c=1?>
@foreach($manager as $managers)
    <div class="col-md-3">
        <div class="panel panel-{{$colors[$i]}}">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-9">
                        <p>{{$managers->manager}}</p>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                  <div id="canvas">
                    <div class="circle" id="circles-{{$c}}" ></div>
                 </div>
            </div>
            <a id="{{$managers->id}}" href="/manager/details/{{$managers->id}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <?php $i++; $c++?>
    @endforeach
</div>
@stop

@section('styles')
    <style>
        #canvas
        {
            text-align: center;
        }
        #canvas .circle {
            display: inline-block;
            margin: 1em;
            text-align: center;
        }

        .circles-decimals {
            font-size: .4em;
        }
    </style>
@stop

@section('scripts')
    <script type="text/javascript">
       function shuffle(o){ //v1.0
                for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
                return o;
            }

            var colors = [
                ['#D3B6C6', '#4B253A'], ['#FCE6A4', '#EFB917'], ['#BEE3F7', '#45AEEA'], ['#F8F9B6', '#D2D558'], ['#F4BCBF', '#D43A43']
            ], circles = [];

            for (var i = 1; i <= 5; i++) {
                var child = document.getElementById('circles-' + i),
                    percentage = $('#manager_'+i).text();

                circles.push(Circles.create({
                    id:         child.id,
                    value:      percentage,
                    radius:     60,
                    width:      10,
                    colors:     colors[i - 1]
                }));
            }
    </script>
@stop