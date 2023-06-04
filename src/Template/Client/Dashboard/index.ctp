<style>
	
	.ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {
    stroke: #00c292;
	}
	
	.ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point, .ct-series-b .ct-slice-donut {
    stroke: #f77b56;
	}

	.ct-series-c .ct-bar, .ct-series-c .ct-line, .ct-series-c .ct-point, .ct-series-c .ct-slice-donut {
		stroke: #ab8ce4;
	}
	
    </style>


<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php if(isset($campCount)) echo $campCount ?></span></div>
                                    <div class="stat-heading">Campaigns</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-headphones"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php if(isset($callCount)) echo $callCount ?></span></div>
                                    <div class="stat-heading">Received</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-call"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php if(isset($callFailedCount)) echo $callFailedCount ?></span></div>
                                    <div class="stat-heading">Failed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-id"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php if(isset($contactCount)) echo $contactCount ?></span></div>
                                    <div class="stat-heading">Contacts</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!--  Traffic  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Report for <?php echo date("Y"); ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->
                                <div id="traffic-chart" class="traffic-chart"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                <div class="progress-box progress-2">
                                    <h4 class="por-title">Campaign Success</h4>
                                    <div class="por-txt"><?php if(isset($campCount)) echo $campCount ?> Campaigns (<?php if(isset($camPersentage)) echo $camPersentage ?>%)</div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-flat-color-3" role="progressbar"
                                             style="width: <?php if(isset($camPersentage)) echo $camPersentage ?>%;" aria-valuenow="60" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                                
                                <div class="progress-box progress-1">
                                    <h4 class="por-title">Call Success</h4>
                                    <div class="por-txt"><?php if(isset($callCount)) echo $callCount ?> Call Success (<?php if(isset($callSuccessPersentage)) echo $callSuccessPersentage ?>%)</div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-flat-color-1" role="progressbar"
                                             style="width: <?php if(isset($callSuccessPersentage)) echo $callSuccessPersentage ?>%;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="progress-box progress-2">
                                    <h4 class="por-title">Call Pending</h4>
                                    <div class="por-txt"><?php if(isset($callPending)) echo $callPending ?> Call Pending (<?php if(isset($callPendingPersentage)) echo $callPendingPersentage ?>%)</div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-flat-color-2" role="progressbar"
                                             style="width: <?php if(isset($callPendingPersentage)) echo $callPendingPersentage ?>%;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                               
                                <div class="progress-box progress-2">
                                    <h4 class="por-title">Call Failed</h4>
                                    <div class="por-txt"><?php if(isset($callFailedCount)) echo $callFailedCount ?> Call Failed (<?php if(isset($callFailedPersentage)) echo $callFailedPersentage ?>%)</div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                             style="width: <?php if(isset($callFailedPersentage)) echo $callFailedPersentage ?>%;" aria-valuenow="90" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> <!-- /.card-body -->
                        </div>
                    </div> <!-- /.row -->
                    <div class="card-body"></div>
                </div>
            </div><!-- /# column -->
        </div>
        <!--  /Traffic -->
        <div class="clearfix"></div>

    </div> <!-- .animated -->
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<!--Local Stuff-->
<script>
    jQuery(document).ready(function ($) {
        "use strict";
        
        // Traffic Chart using chartist
        if ($('#traffic-chart').length) {
            var chart = new Chartist.Line('#traffic-chart', {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                 series: <?= $total_array ?>
               /* series: [
                    [0, 18000, 15000, 25000, 22000, 0,0,0,0,0,0,4000,0],
                    [0, 33000, 15000, 20000, 15000, 300],
                    [0, 15000, 28000, 15000, 30000, 5000]
                ]
                */

            }, {
                low: 0,
                showArea: true,
                showLine: true,
                showPoint: true,
                fullWidth: true,
                axisX: {
                    showGrid: true
                }
            });

            chart.on('draw', function (data) {
                if (data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });
        }
        
    });
</script>
