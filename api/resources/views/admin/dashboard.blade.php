@extends('admin.layouts.app')

@section('content')
            <div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img  style="height: 100px !important" src="{{ asset('templete/vendors/images/banner-img.png') }}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-800 font-50" style="color: #036c76; font-size: 53px;">{{Auth::user()->name}}!</div>
						</h4>
					</div>
				</div>
			</div>

            <div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data" style="position: relative;">
								<div id="chart" style="min-height: 102.7px;"><div id="apexcharts773e5b" class="apexcharts-canvas apexcharts773e5b apexcharts-theme-light" style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1496" width="70" height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1498" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, 0)"><defs id="SvgjsDefs1497"><clipPath id="gridRectMask773e5b"><rect id="SvgjsRect1499" width="106" height="102" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask773e5b"><rect id="SvgjsRect1500" width="102" height="102" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1506"><stop id="SvgjsStop1507" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0"></stop><stop id="SvgjsStop1508" stop-opacity="1" stop-color="rgba(27,0,255,1)" offset="1"></stop><stop id="SvgjsStop1509" stop-opacity="1" stop-color="rgba(27,0,255,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1516"><stop id="SvgjsStop1517" stop-opacity="1" stop-color="rgba(236,240,244,1)" offset="0"></stop><stop id="SvgjsStop1518" stop-opacity="1" stop-color="rgba(27,0,255,1)" offset="1"></stop><stop id="SvgjsStop1519" stop-opacity="1" stop-color="rgba(27,0,255,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1502" class="apexcharts-radialbar"><g id="SvgjsG1503"><g id="SvgjsG1504" class="apexcharts-tracks"><g id="SvgjsG1505" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.524268292682928" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"></path></g></g><g id="SvgjsG1511"><g id="SvgjsG1515" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1520" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 40.965021414464175" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1516)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.695121951219512" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="288" data:value="80" index="0" j="0" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 40.965021414464175"></path></g><circle id="SvgjsCircle1512" r="21.47567073170732" cx="50" cy="50" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1513" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1514" font-family="Helvetica, Arial, sans-serif" x="50" y="55" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="400" fill="#333333" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">80%</text></g></g></g></g><line id="SvgjsLine1521" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1522" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
							<div class="resize-triggers"><div class="expand-trigger"><div style="width: 81px; height: 104px;"></div></div><div class="contract-trigger"></div></div></div>
							<div class="widget-data">
								<div class="h4 mb-0">2020</div>
								<div class="weight-600 font-14">Contact</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data" style="position: relative;">
								<div id="chart2" style="min-height: 102.7px;"><div id="apexcharts773e81" class="apexcharts-canvas apexcharts773e81 apexcharts-theme-light" style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1523" width="70" height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1525" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, 0)"><defs id="SvgjsDefs1524"><clipPath id="gridRectMask773e81"><rect id="SvgjsRect1526" width="106" height="102" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask773e81"><rect id="SvgjsRect1527" width="102" height="102" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1533"><stop id="SvgjsStop1534" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0"></stop><stop id="SvgjsStop1535" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop><stop id="SvgjsStop1536" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1543"><stop id="SvgjsStop1544" stop-opacity="1" stop-color="rgba(236,240,244,1)" offset="0"></stop><stop id="SvgjsStop1545" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop><stop id="SvgjsStop1546" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1529" class="apexcharts-radialbar"><g id="SvgjsG1530"><g id="SvgjsG1531" class="apexcharts-tracks"><g id="SvgjsG1532" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.524268292682928" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"></path></g></g><g id="SvgjsG1538"><g id="SvgjsG1542" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1547" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 59.03497858553581" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1543)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.695121951219512" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="252" data:value="70" index="0" j="0" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 59.03497858553581"></path></g><circle id="SvgjsCircle1539" r="21.47567073170732" cx="50" cy="50" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1540" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1541" font-family="Helvetica, Arial, sans-serif" x="50" y="55" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="400" fill="#333333" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">70%</text></g></g></g></g><line id="SvgjsLine1548" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1549" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
							<div class="resize-triggers"><div class="expand-trigger"><div style="width: 81px; height: 104px;"></div></div><div class="contract-trigger"></div></div></div>
							<div class="widget-data">
								<div class="h4 mb-0">400</div>
								<div class="weight-600 font-14">Deals</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data" style="position: relative;">
								<div id="chart3" style="min-height: 102.7px;"><div id="apexcharts773e87" class="apexcharts-canvas apexcharts773e87 apexcharts-theme-light" style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1550" width="70" height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1552" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, 0)"><defs id="SvgjsDefs1551"><clipPath id="gridRectMask773e87"><rect id="SvgjsRect1553" width="106" height="102" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask773e87"><rect id="SvgjsRect1554" width="102" height="102" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1560"><stop id="SvgjsStop1561" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0"></stop><stop id="SvgjsStop1562" stop-opacity="1" stop-color="rgba(245,103,103,1)" offset="1"></stop><stop id="SvgjsStop1563" stop-opacity="1" stop-color="rgba(245,103,103,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1570"><stop id="SvgjsStop1571" stop-opacity="1" stop-color="rgba(236,240,244,1)" offset="0"></stop><stop id="SvgjsStop1572" stop-opacity="1" stop-color="rgba(245,103,103,1)" offset="1"></stop><stop id="SvgjsStop1573" stop-opacity="1" stop-color="rgba(245,103,103,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1556" class="apexcharts-radialbar"><g id="SvgjsG1557"><g id="SvgjsG1558" class="apexcharts-tracks"><g id="SvgjsG1559" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.524268292682928" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"></path></g></g><g id="SvgjsG1565"><g id="SvgjsG1569" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1574" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 20.762195121951216 50.00000000000001" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1570)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.695121951219512" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="270" data:value="75" index="0" j="0" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 20.762195121951216 50.00000000000001"></path></g><circle id="SvgjsCircle1566" r="21.47567073170732" cx="50" cy="50" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1567" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1568" font-family="Helvetica, Arial, sans-serif" x="50" y="55" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="400" fill="#333333" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">75%</text></g></g></g></g><line id="SvgjsLine1575" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1576" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
							<div class="resize-triggers"><div class="expand-trigger"><div style="width: 81px; height: 104px;"></div></div><div class="contract-trigger"></div></div></div>
							<div class="widget-data">
								<div class="h4 mb-0">350</div>
								<div class="weight-600 font-14">Campaign</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data" style="position: relative;">
								<div id="chart4" style="min-height: 102.7px;"><div id="apexcharts773e8c" class="apexcharts-canvas apexcharts773e8c apexcharts-theme-light" style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1577" width="70" height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1579" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, 0)"><defs id="SvgjsDefs1578"><clipPath id="gridRectMask773e8c"><rect id="SvgjsRect1580" width="106" height="102" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask773e8c"><rect id="SvgjsRect1581" width="102" height="102" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1587"><stop id="SvgjsStop1588" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0"></stop><stop id="SvgjsStop1589" stop-opacity="1" stop-color="rgba(41,121,255,1)" offset="1"></stop><stop id="SvgjsStop1590" stop-opacity="1" stop-color="rgba(41,121,255,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1597"><stop id="SvgjsStop1598" stop-opacity="1" stop-color="rgba(236,240,244,1)" offset="0"></stop><stop id="SvgjsStop1599" stop-opacity="1" stop-color="rgba(41,121,255,1)" offset="1"></stop><stop id="SvgjsStop1600" stop-opacity="1" stop-color="rgba(41,121,255,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1583" class="apexcharts-radialbar"><g id="SvgjsG1584"><g id="SvgjsG1585" class="apexcharts-tracks"><g id="SvgjsG1586" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.524268292682928" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"></path></g></g><g id="SvgjsG1592"><g id="SvgjsG1596" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1601" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 26.346118975439797 32.814449483278" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1597)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.695121951219512" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="306" data:value="85" index="0" j="0" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 26.346118975439797 32.814449483278"></path></g><circle id="SvgjsCircle1593" r="21.47567073170732" cx="50" cy="50" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1594" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1595" font-family="Helvetica, Arial, sans-serif" x="50" y="55" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="400" fill="#333333" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">85%</text></g></g></g></g><line id="SvgjsLine1602" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1603" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
							<div class="resize-triggers"><div class="expand-trigger"><div style="width: 81px; height: 104px;"></div></div><div class="contract-trigger"></div></div></div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
