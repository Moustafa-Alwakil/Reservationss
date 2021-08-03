@extends('website.layouts.layout')
@section('title')
    Clinics
@endsection
@section('stylesheets')
    {{-- <!-- Datetimepicker CSS --> --}}
    <link rel="stylesheet" href="{{ url('website/assets/css/bootstrap-datetimepicker.min.css') }}">

    {{-- <!-- Select2 CSS --> --}}
    <link rel="stylesheet" href="{{ url('website/assets/plugins/select2/css/select2.min.css') }}">

    {{-- <!-- Fancybox CSS --> --}}
    <link rel="stylesheet" href="{{ url('website/assets/plugins/fancybox/jquery.fancybox.min.css') }}">
@endsection
@section('content')
    @include('website.includes.bar1')
    All Clinics
    @include('website.includes.bar2')
    All Clinics
    </div>
    <div class="col-md-4 col-12 d-md-block d-none">
        <div class="sort-by">
            <span class="sort-title">Sort by</span>
            <span class="sortby-fliter">
                <select class="select">
                    <option>Select</option>
                    <option class="sorting">Rating</option>
                    <option class="sorting">Popular</option>
                    <option class="sorting">Latest</option>
                    <option class="sorting">Free</option>
                </select>
            </span>
        </div>
    </div>
    @include('website.includes.bar3')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Search Filter</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Gender</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type">
                                        <span class="checkmark"></span> Male Doctor
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type">
                                        <span class="checkmark"></span> Female Doctor
                                    </label>
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Select Specialist</h4>
                                @foreach ($departments as $department)
                                    <div>
                                        <label class="custom_check">
                                            <input type="checkbox" name="id" value="{{ $department->id }}">
                                            <span class="checkmark"></span>
                                            {{ $department->name['name_' . LaravelLocalization::getCurrentLocale()] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="btn-search">
                                <button type="button" class="btn btn-block">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->

                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    @foreach ($clinics as $clinic)
                        @php
                            $totalReview = 0;
                            foreach ($clinic->physican->reviews as $review) {
                                $totalReview += $review->value;
                            }
                            
                            $avgRate = round(($totalReview * 5) / ($clinic->physican->reviews_count * 5));
                        @endphp
                        <!-- Clinic Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{ route('clinic', ['id' => $clinic->id]) }}">
                                                <img src="{{ $clinic->physican->info->photo }}" class="img-fluid"
                                                    alt="Doctor Image">
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a
                                                    href="{{ route('clinic', ['id' => $clinic->id]) }}">{{ ucwords($clinic->name['name_' . LaravelLocalization::getCurrentLocale()]) }}</a>
                                            </h4>
                                            <p class="doc-speciality">
                                                Dr.
                                                {{ ucwords($clinic->physican->name['fname_' . LaravelLocalization::getCurrentLocale()] . ' ' . $clinic->physican->name['lname_' . LaravelLocalization::getCurrentLocale()]) }}
                                            </p>
                                            <h5 class="doc-department">
                                                {{ ucwords($clinic->physican->department->name['name_' . LaravelLocalization::getCurrentLocale()]) }}
                                            </h5>
                                            <div class="rating">
                                                @for ($i = 0; $i < $avgRate; $i++)
                                                    <i class="fas fa-star filled"></i>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $avgRate; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                <span
                                                    class="d-inline-block average-rating">({{ $clinic->physican->reviews_count }})</span>
                                            </div>
                                            <div class="clinic-details">
                                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                                    {{ ucwords($clinic->address->region->name['name_' . LaravelLocalization::getCurrentLocale()]) }},
                                                    {{ ucwords($clinic->address->region->city->name['name_' . LaravelLocalization::getCurrentLocale()]) }}
                                                </p>
                                                <ul class="clinic-gallery">
                                                    @foreach ($clinic->clinicphotos as $clinicphoto)
                                                        <li>
                                                            <a href="{{ $clinicphoto->photo }}" data-fancybox="gallery">
                                                                <img src="{{ $clinicphoto->photo }}" alt="Feature">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="clinic-services">
                                                @foreach ($clinic->services as $service)
                                                    <span>{{ ucwords($service->name['name_' . LaravelLocalization::getCurrentLocale()]) }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        <div class="clini-infos">
                                            <ul>
                                                <li><i class="far fa-thumbs-up"></i>
                                                    {{ round(($totalReview / ($clinic->physican->reviews_count * 5)) * 100) }}%
                                                </li>
                                                <li><i class="far fa-comment"></i> {{ $clinic->physican->reviews_count }}
                                                    Feedback</li>
                                                <li><i
                                                        class="fas fa-map-marker-alt"></i>{{ ucwords($clinic->address->region->name['name_' . LaravelLocalization::getCurrentLocale()]) }},
                                                    {{ ucwords($clinic->address->region->city->name['name_' . LaravelLocalization::getCurrentLocale()]) }}
                                                </li>
                                                <li><i class="far fa-money-bill-alt"></i> {{ $clinic->examfee->price }}
                                                    EGP
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clinic-booking">
                                            <a class="view-pro-btn"
                                                href="{{ route('clinic', ['id' => $clinic->id]) }}">View
                                                Profile</a>
                                            @if (!Auth::guard('doc')->check() && !Auth::guard('web')->check())
                                                <a class="apt-btn" href="{{ route('user.login') }}">Book Appointment</a>
                                            @endif
                                            @auth('web')
                                                <a class="apt-btn" href="{{ route('appointment.create',['id'=>$clinic->id]) }}">Book Appointment</a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Clinic Widget -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $clinics->links() !!}
    </div>
    <!-- /Page Content -->
@endsection
@section('scripts')
    <!-- Select2 JS -->
    <script src="{{ url('website/assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{ url('website/assets/js/moment.min.js') }}"></script>
    <script src="{{ url('website/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Fancybox JS -->
    <script src="{{ url('website/assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

@endsection