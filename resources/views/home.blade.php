@extends("app")

@section("header")

<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
  
    <div class="col-md-10 d-flex align-items-center ftco-animate">
        <div class="text text-center pt-5 mt-md-5">
            <p class="mb-4">{{ __('Short Long URL to short one in one click') }}</p>
            <h1 class="mb-5">{{ __('URL SHORTER') }}</h1>
            <div class="ftco-counter ftco-no-pt ftco-no-pb">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text d-flex">
                                <div class="icon mr-2">
                                    <span class="icon-link"></span>
                                </div>
                                <div class="desc text-left">
                                    <strong class="number" data-number="{{$links_count}}">0</strong>
                                    <span>{{ __('Links') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text d-flex">
                                <div class="icon mr-2">
                                    <span class=" icon-location-arrow"></span>
                                </div>
                                <div class="desc text-left">
                                    <strong class="number" data-number="{{$clicks_count}}">0</strong>
                                    <span>{{ __('Clicks') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ftco-search my-md-5">

                <div class="row">
                    <div class="col-md-12 nav-link-wrap">
                        <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">{{ __('Basic Short') }}</a>

                            <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">{{ __('Advanced Short') }}</a>

                        </div>
                    </div>
                    <div class="col-md-12 tab-wrap">

                        <div class="tab-content p-4" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">

                                <form action="#" class="basic-short">
                                    <p class="alert-danger" style="display:none; border-radius:5px; padding:9px" id="alert"></p>
                                    <div class="row no-gutters">
                                        <div class="col-md mr-md-2">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <div class="icon"><span class="icon-link"></span></div>
                                                    <input type="url" class="form-control" id="basic-longurl" placeholder="{{ __('eg. https://google.com') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <button type="submit" class="form-control btn btn-primary" id="basic-short-btn">{{ __('Short Url') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                                <form action="#" class="basic-short">
                                    <p class="alert-danger" style="display:none; border-radius:5px; padding:9px" id="advanced-alert"></p>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <div class="icon"><span class="icon-link"></span></div>
                                                    <input type="url" class="form-control" id="advanced-longurl" placeholder="{{ __('eg. https://google.com') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <div class="icon"><span class="icon-font"></span></div>
                                                    <input type="text" class="form-control" placeholder="{{ __('eg linkslug') }}" id="slug">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <button type="submit" class="form-control btn btn-primary" id="advanced-short-btn">{{ __('Short Url') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("content")

<div class="row justify-content-center mb-5">
    <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">{{ __('Quick Start') }}</span>
        <h2 class="mb-0">{{ __('How Its Work') }}</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-3 ftco-animate">
        <ul class="category text-center">
            <li><a href="#">{{__('Step')}} 1<br><span>{{ __('Put Yout Full Url') }}</span><i class="ion-ios-arrow-forward"></i></a></li>
            <li><a href="#">{{__('Step')}} 2<br><span>{{ __('Choose Slug Or leave it on us') }}</span><i class="ion-ios-arrow-forward"></i></a></li>
            <li><a href="#">{{__('Step')}} 3<br><span>{{ __('Hit ShortUrl') }}</span><i class="ion-ios-arrow-forward"></i></a></li>

        </ul>
    </div>
</div>

@endsection
