<div id="content" class="content">
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-green">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4>DATA KARYAWAN</h4>
					<?php
					$karyawan = $this->db->get('karyawan')->num_rows();
					?>
					<p><?= $karyawan ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>karyawan">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-list"></i></div>
				<div class="stats-info">
					<h4>DATA JABATAN</h4>
					<?php
					$jabatan = $this->db->get('jabatan')->num_rows();
					?>
					<p><?= $jabatan ?> Data</p>
				</div>
				<div class="stats-link">
					<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
						<a href="<?= base_url() ?>jabatan">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } else { ?>
						<a href="">Akses for Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-list"></i></div>
				<div class="stats-info">
					<h4>DATA DEPARTEMEN</h4>
					<?php
					$departemen = $this->db->get('departemen')->num_rows();
					?>
					<p><?= $departemen ?> Data</p>
				</div>
				<div class="stats-link">
					<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
						<a href="<?= base_url() ?>departemen">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } else { ?>
						<a href="">Akses for Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-purple">
				<div class="stats-icon"><i class="fa fa-list"></i></div>
				<div class="stats-info">
					<h4>DATA KATEGORI</h4>
					<?php
					$kategori = $this->db->get('kategori')->num_rows();
					?>
					<p><?= $kategori ?> Data</p>
				</div>
				<div class="stats-link">
					<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
						<a href="<?= base_url() ?>kategori">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } else { ?>
						<a href="">Akses for Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>

				</div>
			</div>
		</div>
		<center><img src="<?= base_url() ?>temp/assets/logo.png" style="width: 80%;margin-top:40px" alt="Logo PT Japenansi Nusantara">
		</center>

		<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>

		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="https://code.highcharts.com/modules/drilldown.js"></script>

		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
				</div>
				<div class="panel-body">
					<div id="container"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
				</div>
				<div class="panel-body">
					<div id="container2"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	Highcharts.setOptions({
		colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
			return {
				radialGradient: {
					cx: 0.5,
					cy: 0.3,
					r: 0.7
				},
				stops: [
					[0, color],
					[1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
				]
			};
		})
	});
	Highcharts.chart('container2', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Browser market shares in January, 2018'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					connectorColor: 'silver'
				}
			}
		},
		series: [{
			name: 'Share',
			data: [{
					name: 'Chrome',
					y: 61.41
				},
				{
					name: 'Internet Explorer',
					y: 11.84
				},
				{
					name: 'Firefox',
					y: 10.85
				},
			]
		}]
	});
</script>

<script>
	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'left',
			text: 'Browser market shares. January, 2018'
		},
		subtitle: {
			align: 'left',
			text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total percent market share'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y:.1f}%'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
		},

		series: [{
			name: "Browsers",
			colorByPoint: true,
			data: [{
					name: "Chrome",
					y: 62.74,
					drilldown: "Chrome"
				},
				{
					name: "Firefox",
					y: 10.57,
					drilldown: "Firefox"
				},
				{
					name: "Internet Explorer",
					y: 7.23,
					drilldown: "Internet Explorer"
				},
				{
					name: "Safari",
					y: 5.58,
					drilldown: "Safari"
				},
				{
					name: "Edge",
					y: 4.02,
					drilldown: "Edge"
				},
				{
					name: "Opera",
					y: 1.92,
					drilldown: "Opera"
				},
				{
					name: "Other",
					y: 7.62,
					drilldown: null
				}
			]
		}],
	});
</script> -->
