{{--
 * JobClass - Job Board Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com/jobclass
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')

@section('header')
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.lite.header', 'layouts.inc.lite.header'])
@endsection

@section('search')
	@parent
@endsection

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container inner-page pb-0 countries-page">
		
		@if (session()->has('flash_notification'))
			<div class="container">
				<div class="row">
					<div class="col-12">
						@include('flash::message')
					</div>
				</div>
			</div>
		@endif
		
		<div class="container">
			<div class="section-content">
				<div class="row">

					<h1 class="text-center title-1" style="text-transform: none;">
						<strong>{{ t('countries') }}</strong>
					</h1>
					<hr class="center-block small mt-0">
					
					@if (isset($countries))
						<div class="col-md-12 page-content">
							<div class="inner-box relative">
								
								<h3 class="title-2"><i class="fas fa-map-marker-alt"></i> {{ t('select_a_country') }}</h3>
								
								@if (!empty($countries))
									<div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
										@foreach ($countries as $code => $country)
											<?php
											$classBorder = (count($countries) == ($loop->index + 1)) ? ' cat-list-border' : '';
											$countryUrl = dmUrl($country, '/', true, !((bool)config('plugins.domainmapping.installed')));
											?>
											<div class="col">
												<ul class="cat-list{{ $classBorder }}">
													<li>
														<img src="{{ url('images/blank.gif') . getPictureVersion() }}"
															 class="flag flag-{{ $country->get('icode') }}"
															 alt="{{ $country->get('name') }}"
														>
														<a href="{{ $countryUrl }}" data-bs-toggle="tooltip" title="{!! $country->get('name') !!}">
															{{ str($country->get('name'))->limit(26) }}
														</a>
													</li>
												</ul>
											</div>
										@endforeach
									</div>
								@else
									<div class="row">
										<div class="col-12 text-center mb-4 text-danger">
											<strong>{{ t('countries_not_found') }}</strong>
										</div>
									</div>
								@endif
								
							</div>
						</div>
					@endif
					
				</div>
				
				@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.social.horizontal', 'layouts.inc.social.horizontal'])
				
			</div>
		</div>
	</div>
@endsection

@section('footer')
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.lite.footer', 'layouts.inc.lite.footer'])
@endsection

@section('after_scripts')
@endsection
