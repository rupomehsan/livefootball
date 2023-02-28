@extends('layouts.admin.index')
@section('content')
    <!-- ======= Main Content Section ======= -->
    <main id="main" class="main">
        <h1 class="pagetitle mb-5">Manage Advertisement</h1>
        <div id="disMsg" class="d-none">
             @include('admin.message.index')
        </div>
            
        {{-- content top --}}
        {{-- Start:: content heading --}}
        <div class="content-heading">
            <div class="row">
                {{-- title --}}

                <div class="col-md-11">
                    <h5 class="bold">Manage Google Ads</h5>
                </div>
                {{-- title --}}
            </div>
        </div>
        {{-- End:: content heading --}}

        {{-- Start::Content Body --}}
        {{-- content top --}}

        {{-- content top --}}
   

        <div class="row margin-top-40">
            <div id="accordion">
                <form id="mobileAdForm" method="POST" enctype="multipart/form-data"
                      action="{{ URL::to('api/v1/advertisement/webAdUpdate') }}">
                    @csrf
                    {{-- Start:: Header Banner Adsd --}}
                    @if (!$target->isEmpty())
                        @foreach ($target as $data)
                            @if ($data->ad_type == 'header')
                                <div class="card">
                                    <div class="card-header" id="headingheader">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse"
                                                    data-target="#headerAd" aria-expanded="true" aria-controls="headerAd">
                                                Header Banner Ads
                                            </button>
                                        </h5>
                                    </div>


                                    <div id="headerAd" class="collapse" aria-labelledby="headingheader"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row margin-top-20">

                                                <input type="hidden" name="ad_type[]" value="header">

                                                <div class="col-md-3">
                                                    <span class="bold"> Your Header Banner Ads</span> <br /><br />
                                                    <span>Paste your ad code here. Google AdSense will be made id responsive
                                                    automatically.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                <textarea name="add_link[header]" class="add-link-input" cols="85"
                                                          rows="10">{{ $data->ad_link }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row margin-top-10">
                                                <div class="col-md-3">
                                                    <span class="bold"> Ad Title :</span> <br /><br />
                                                    <span>A title for the Ad, like - Advertisement - if you leave it blank the
                                                    ad spot will
                                                    not
                                                    have a title.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="text" name="add_title[header]" class="add-link-input"
                                                           value="{{ $data->ad_title }}">
                                                </div>
                                            </div>
                                            <div class="row margin-top-40">
                                                <div class="col-md-12">
                                                    <span class="bold"> ADVANCE USASE:</span> <br /><br />
                                                    <span>If you leave the AdSense size boxes on Auto, the theme will
                                                    automatically resize
                                                    the
                                                    Google Ads.</span>
                                                </div>

                                                <div class="col-md-6 margin-top-40">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disableDesktopHeader">DISABLE ON
                                                                    DESKTOP</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_desktop[header]" type="checkbox"
                                                                       id="disableDesktopHeader" {!! $data->disable_desktop == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-40">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="desktop_adsense[header]" class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->desktop_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disableTabletLandscapeHeader">DISABLE ON
                                                                    TABLET LANDSCAPE</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_tablet_landscape[header]" type="checkbox"
                                                                       id="disableTabletLandscapeHeader" {!! $data->disable_tablet_landscape == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="tablet_landscape_adsense[header]"
                                                                        class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->tablet_landscape_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disableTabletPortraitHeader">DISABLE ON
                                                                    TABLET PORTRAIT</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_tablet_portrait[header]" type="checkbox"
                                                                       id="disableTabletPortraitHeader" {!! $data->disable_tablet_portrait == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="tablet_portrait_adsense[header]"
                                                                        class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->tablet_portrait_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disablePhoneHeader">DISABLE ON
                                                                    PHONE</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_phone[header]" type="checkbox"
                                                                       id="disablePhoneHeader" {!! $data->disable_phone == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="phone_adsense[header]" class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->phone_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card">
                            <div class="card-header" id="headingheader">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#headerAd"
                                            aria-expanded="true" aria-controls="headerAd">
                                        Header Banner Ads
                                    </button>
                                </h5>
                            </div>


                            <div id="headerAd" class="collapse" aria-labelledby="headingheader" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row margin-top-20">

                                        <input type="hidden" name="ad_type[]" value="header">

                                        <div class="col-md-3">
                                            <span class="bold"> Your Header Banner Ads</span> <br /><br />
                                            <span>Paste your ad code here. Google AdSense will be made id responsive
                                            automatically.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                        <textarea name="add_link[header]" class="add-link-input" cols="85"
                                                  rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row margin-top-10">
                                        <div class="col-md-3">
                                            <span class="bold"> Ad Title :</span> <br /><br />
                                            <span>A title for the Ad, like - Advertisement - if you leave it blank the ad spot
                                            will
                                            not
                                            have a title.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="text" name="add_title[header]" class="add-link-input">
                                        </div>
                                    </div>
                                    <div class="row margin-top-40">
                                        <div class="col-md-12">
                                            <span class="bold"> ADVANCE USASE:</span> <br /><br />
                                            <span>If you leave the AdSense size boxes on Auto, the theme will automatically
                                            resize
                                            the
                                            Google Ads.</span>
                                        </div>

                                        <div class="col-md-6 margin-top-40">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold" for="disableDesktopHeader">DISABLE
                                                            ON
                                                            DESKTOP</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_desktop[header]" type="checkbox"
                                                               id="disableDesktopHeader">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-40">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="desktop_adsense[header]" class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold"
                                                               for="disableTabletLandscapeHeader">DISABLE ON
                                                            TABLET LANDSCAPE</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_tablet_landscape[header]" type="checkbox"
                                                               id="disableTabletLandscapeHeader">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="tablet_landscape_adsense[header]" class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold"
                                                               for="disableTabletPortraitHeader">DISABLE ON
                                                            TABLET PORTRAIT</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_tablet_portrait[header]" type="checkbox"
                                                               id="disableTabletPortraitHeader">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="tablet_portrait_adsense[header]" class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold" for="disablePhoneHeader">DISABLE
                                                            ON
                                                            PHONE</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_phone[header]" type="checkbox"
                                                               id="disablePhoneHeader">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="phone_adsense[header]" class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- End:: Header Banner Adsd --}}

                    {{-- Start:: After Category Add --}}
                    @if (!$target->isEmpty())
                        @foreach ($target as $data)
                            @if ($data->ad_type == 'site_banner')
                                <div class="card margin-top-20">
                                    <div class="card-header" id="headingAfterCategory">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#afterCategoryAd" aria-expanded="false"
                                                    aria-controls="afterCategoryAd">
                                                Site Banner Ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="afterCategoryAd" class="collapse" aria-labelledby="headingAfterCategory"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row margin-top-20">
                                                <input type="hidden" name="ad_type[]" value="site_banner">

                                                <div class="col-md-3">
                                                    <span class="bold"> Your Site Banner Ads</span> <br /><br />
                                                    <span>Paste your ad code here. Google AdSense will be made id responsive
                                                    automatically.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                <textarea name="add_link[site_banner]" class="add-link-input" cols="85"
                                                          rows="10">{{ $data->ad_link }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row margin-top-10">
                                                <div class="col-md-3">
                                                    <span class="bold"> Ad Title :</span> <br /><br />
                                                    <span>A title for the Ad, like - Advertisement - if you leave it blank the
                                                    ad spot will
                                                    not
                                                    have a title.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="text" name="add_title[site_banner]" class="add-link-input"
                                                           value="{{ $data->ad_title }}">
                                                </div>
                                            </div>
                                            <div class="row margin-top-20">
                                                <div class="col-md-3">
                                                    <span class="bold"> Show Add (Per matches) :</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="number" name="show_per_video_category[site_banner]"
                                                           class="add-link-input" value="{{ $data->show_per_video_category }}">
                                                </div>
                                            </div>
                                            <div class="row margin-top-40">
                                                <div class="col-md-12">
                                                    <span class="bold"> ADVANCE USASE:</span> <br /><br />
                                                    <span>If you leave the AdSense size boxes on Auto, the theme will
                                                    automatically resize
                                                    the
                                                    Google Ads.</span>
                                                </div>

                                                <div class="col-md-6 margin-top-40">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disableDesktopAfterCategory">DISABLE ON
                                                                    DESKTOP</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_desktop[site_banner]" type="checkbox"
                                                                       id="disableDesktopAfterCategory" {!! $data->disable_desktop == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-40">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="desktop_adsense[site_banner]"
                                                                        class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->desktop_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disableTabletLandscapeAfterCategory">DISABLE ON
                                                                    TABLET LANDSCAPE</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_tablet_landscape[site_banner]"
                                                                       type="checkbox" id="disableTabletLandscapeAfterCategory"
                                                                    {!! $data->disable_tablet_landscape == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="tablet_landscape_adsense[site_banner]"
                                                                        class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->tablet_landscape_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disableTabletPortraitAfterCategory">DISABLE ON
                                                                    TABLET PORTRAIT</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_tablet_portrait[site_banner]"
                                                                       type="checkbox" id="disableTabletPortraitAfterCategory"
                                                                    {!! $data->disable_tablet_portrait == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="tablet_portrait_adsense[site_banner]"
                                                                        class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->tablet_portrait_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <label class="form-check-label bold"
                                                                       for="disablePhoneAfterCategory">DISABLE ON
                                                                    PHONE</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-check-input" data-class="featured"
                                                                       name="disable_phone[site_banner]" type="checkbox"
                                                                       id="disablePhoneAfterCategory" {!! $data->disable_phone == 'on' ? 'checked' : '' !!}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin-top-20">
                                                    <div class="form-check form-switch">
                                                        <div class="row">
                                                            <div class="col-md-4 text-right">
                                                                <label class="form-check-label" for="">Adsense Size</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <select name="phone_adsense[site_banner]"
                                                                        class="adsense-select">
                                                                    <option value="0">Select a size</option>

                                                                    @if (!empty($adsenseSizeArr))
                                                                        @foreach ($adsenseSizeArr as $size)
                                                                            <?php
                                                                            $selected = '';
                                                                            if ($data->phone_adsense == $size) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option {{ $selected }}>{{ $size }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card margin-top-20">
                            <div class="card-header" id="headingAfterCategory">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#afterCategoryAd" aria-expanded="false" aria-controls="afterCategoryAd">
                                        Site Banner Ads
                                    </button>
                                </h5>
                            </div>
                            <div id="afterCategoryAd" class="collapse" aria-labelledby="headingAfterCategory"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row margin-top-20">

                                        <input type="hidden" name="ad_type[]" value="site_banner">

                                        <div class="col-md-3">
                                            <span class="bold"> Site Banner Ads</span> <br /><br />
                                            <span>Paste your ad code here. Google AdSense will be made id responsive
                                            automatically.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                        <textarea name="add_link[site_banner]" class="add-link-input" cols="85"
                                                  rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row margin-top-10">
                                        <div class="col-md-3">
                                            <span class="bold"> Ad Title :</span> <br /><br />
                                            <span>A title for the Ad, like - Advertisement - if you leave it blank the ad spot
                                            will
                                            not
                                            have a title.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="text" name="add_title[site_banner]" class="add-link-input">
                                        </div>
                                    </div>
                                    <div class="row margin-top-20">
                                        <div class="col-md-3">
                                            <span class="bold"> Show Add (Per matches) :</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="number" name="show_per_video_category[site_banner]"
                                                   class="add-link-input">
                                        </div>
                                    </div>
                                    <div class="row margin-top-40">
                                        <div class="col-md-12">
                                            <span class="bold"> ADVANCE USASE:</span> <br /><br />
                                            <span>If you leave the AdSense size boxes on Auto, the theme will automatically
                                            resize
                                            the
                                            Google Ads.</span>
                                        </div>

                                        <div class="col-md-6 margin-top-40">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold"
                                                               for="disableDesktopAfterCategory">DISABLE ON
                                                            DESKTOP</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_desktop[site_banner]" type="checkbox"
                                                               id="disableDesktopAfterCategory">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-40">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="desktop_adsense[site_banner]" class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold"
                                                               for="disableTabletLandscapeAfterCategory">DISABLE ON
                                                            TABLET LANDSCAPE</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_tablet_landscape[site_banner]" type="checkbox"
                                                               id="disableTabletLandscapeAfterCategory">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="tablet_landscape_adsense[site_banner]"
                                                                class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold"
                                                               for="disableTabletPortraitAfterCategory">DISABLE ON
                                                            TABLET PORTRAIT</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_tablet_portrait[site_banner]" type="checkbox"
                                                               id="disableTabletPortraitAfterCategory">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="tablet_portrait_adsense[site_banner]"
                                                                class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label class="form-check-label bold"
                                                               for="disablePhoneAfterCategory">DISABLE
                                                            ON
                                                            PHONE</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input class="form-check-input" data-class="featured"
                                                               name="disable_phone[site_banner]" type="checkbox"
                                                               id="disablePhoneAfterCategory">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="form-check form-switch">
                                                <div class="row">
                                                    <div class="col-md-4 text-right">
                                                        <label class="form-check-label" for="">Adsense Size</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <select name="phone_adsense[site_banner]" class="adsense-select">
                                                            <option value="0">Select a size</option>
                                                            @if (!empty($adsenseSizeArr))
                                                                @foreach ($adsenseSizeArr as $size)
                                                                    <option>{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- End:: After Category Add --}}

                    {{-- Start:: Native You may also Like Add --}}
                    @if (!$target->isEmpty())
                        @foreach ($target as $data)
                            @if ($data->ad_type == 'upcoming_matches')
                                <div class="card margin-top-20">
                                    <div class="card-header" id="headingnativeLike">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#nativeLikeAd" aria-expanded="false" aria-controls="nativeLikeAd">
                                               Upcoming Matches Inline Native Ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="nativeLikeAd" class="collapse" aria-labelledby="headingnativeLike"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row margin-top-20">

                                                <input type="hidden" name="ad_type[]" value="upcoming_matches">

                                                <div class="col-md-3">
                                                    <span class="bold"> Your Upcoming Matches Inline Native Ads</span>
                                                    <br /><br />
                                                    <span>Paste your ad code here. Google AdSense will be made id responsive
                                                    automatically.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                <textarea name="add_link[upcoming_matches]" class="add-link-input" cols="85"
                                                          rows="10">{{ $data->ad_link }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row margin-top-10">
                                                <div class="col-md-3">
                                                    <span class="bold"> Ad Title :</span> <br /><br />
                                                    <span>A title for the Ad, like - Advertisement - if you leave it blank the
                                                    ad spot will
                                                    not
                                                    have a title.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="text" name="add_title[upcoming_matches]" class="add-link-input"
                                                           value="{{ $data->ad_title }}">
                                                </div>
                                            </div>
                                            <div class="row margin-top-20">
                                                <div class="col-md-3">
                                                    <span class="bold"> Show Add (Per matches) :</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="number" name="show_per_video_category[upcoming_matches]"
                                                           class="add-link-input" value="{{ $data->show_per_video_category }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card margin-top-20">
                            <div class="card-header" id="headingnativeLike">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#nativeLikeAd" aria-expanded="false" aria-controls="nativeLikeAd">
                                        Upcoming Matches Inline Native Ads
                                    </button>
                                </h5>
                            </div>
                            <div id="nativeLikeAd" class="collapse" aria-labelledby="headingnativeLike"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row margin-top-20">

                                        <input type="hidden" name="ad_type[]" value="upcoming_matches">

                                        <div class="col-md-3">
                                            <span class="bold"> Your  Upcoming Match inline </span>
                                            <br /><br />
                                            <span>Paste your ad code here. Google AdSense will be made id responsive
                                            automatically.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                        <textarea name="add_link[upcoming_matches]" class="add-link-input" cols="85"
                                                  rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row margin-top-10">
                                        <div class="col-md-3">
                                            <span class="bold"> Ad Title :</span> <br /><br />
                                            <span>A title for the Ad, like - Advertisement - if you leave it blank the ad spot
                                            will
                                            not
                                            have a title.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="text" name="add_title[upcoming_matches]" class="add-link-input">
                                        </div>
                                    </div>
                                    <div class="row margin-top-20">
                                        <div class="col-md-3">
                                            <span class="bold"> Show Add (Per matchesh) :</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="number" name="show_per_video_category[upcoming_matches]"
                                                   class="add-link-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- End:: Native You may also Like Add --}}

                    {{-- Start:: Native Series Add --}}
                    @if (!$target->isEmpty())
                        @foreach ($target as $data)
                            @if ($data->ad_type == 'native_series')
                                <div class="card margin-top-20 d-none">
                                    <div class="card-header" id="headingnativeSeries">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#nativeSeriesAd" aria-expanded="false"
                                                    aria-controls="nativeSeriesAd">
                                                Native Video Ad (for series video)
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="nativeSeriesAd" class="collapse" aria-labelledby="headingnativeSeries"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row margin-top-20">

                                                <input type="hidden" name="ad_type[]" value="native_series">

                                                <div class="col-md-3">
                                                    <span class="bold"> Your Native Ad (for series video)</span>
                                                    <br /><br />
                                                    <span>Paste your ad code here. Google AdSense will be made id responsive
                                                    automatically.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                <textarea name="add_link[native_series]" class="add-link-input" cols="85"
                                                          rows="10">{{ $data->ad_link }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row margin-top-10">
                                                <div class="col-md-3">
                                                    <span class="bold"> Ad Title :</span> <br /><br />
                                                    <span>A title for the Ad, like - Advertisement - if you leave it blank the
                                                    ad spot will
                                                    not
                                                    have a title.</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="text" name="add_title[native_series]" class="add-link-input"
                                                           value="{{ $data->ad_title }}">
                                                </div>
                                            </div>
                                            <div class="row margin-top-20">
                                                <div class="col-md-3">
                                                    <span class="bold"> Show Add (Per Video) :</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="number" name="show_per_video_category[native_series]"
                                                           class="add-link-input" value="{{ $data->show_per_video_category }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card margin-top-20 d-none">
                            <div class="card-header" id="headingnativeSeries">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#nativeSeriesAd" aria-expanded="false" aria-controls="nativeSeriesAd">
                                        Native Video Ad (for series video)
                                    </button>
                                </h5>
                            </div>
                            <div id="nativeSeriesAd" class="collapse" aria-labelledby="headingnativeSeries"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row margin-top-20">

                                        <input type="hidden" name="ad_type[]" value="native_series">

                                        <div class="col-md-3">
                                            <span class="bold"> Your Native Ad (for series video)</span> <br /><br />
                                            <span>Paste your ad code here. Google AdSense will be made id responsive
                                            automatically.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                        <textarea name="add_link[native_series]" class="add-link-input" cols="85"
                                                  rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row margin-top-10">
                                        <div class="col-md-3">
                                            <span class="bold"> Ad Title :</span> <br /><br />
                                            <span>A title for the Ad, like - Advertisement - if you leave it blank the ad spot
                                            will
                                            not
                                            have a title.</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="text" name="add_title[native_series]" class="add-link-input">
                                        </div>
                                    </div>
                                    <div class="row margin-top-20">
                                        <div class="col-md-3">
                                            <span class="bold"> Show Add (Per matches) :</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="number" name="show_per_video_category[native_series]"
                                                   class="add-link-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- End:: Native Series Add --}}

                    {{-- Start:: Interstitial adsd --}}
                    @if (!$target->isEmpty())
                        @foreach ($target as $data)
                            @if ($data->ad_type == 'popup')
                                <div class="card margin-top-20">
                                    <div class="card-header" id="headingPopup">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#popupAd" aria-expanded="false" aria-controls="popupAd">
                                                Interstitial ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="popupAd" class="collapse" aria-labelledby="headingPopup"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <input type="hidden" name="ad_type[]" value="popup">

                                            <div class="row margin-top-20">
                                                <div class="col-md-3">
                                                    <span class="bold">Interstitial Image :</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <p><input type="file" accept="image/*" name="image[popup]" id="file"
                                                              onchange="loadFile(event)" style="display: none;"></p>
                                                    <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                        <label for="file" style="cursor: pointer;">Upload Image Here</label>
                                                    </p>
                                                    <p>
                                                        @if (!empty($data->image))
                                                            <img src="{{ URL::to('/') }}/uploads/ad/{{ $data->image }}"
                                                                 alt="popup" title="popup" id="popupImg" width="200" />
                                                        @else
                                                            <img id="popupImg" width="200" />
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row margin-top-20">
                                                <div class="col-md-3">
                                                    <span class="bold">Interstitial Link :</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                <textarea name="add_link[popup]" class="add-link-input" cols="85"
                                                          rows="2">{{ $data->ad_link }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row margin-top-20">
                                                <div class="col-md-3">
                                                    <span class="bold"> Show Add (Per Click) :</span>
                                                </div>
                                                <div class="offset-1 col-md-8">
                                                    <input type="number" name="show_per_video_category[popup]"
                                                           class="add-link-input" value="{{ $data->show_per_video_category }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card margin-top-20">
                            <div class="card-header" id="headingPopup">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#popupAd" aria-expanded="false" aria-controls="popupAd">
                                        Interstitial ads
                                    </button>
                                </h5>
                            </div>
                            <div id="popupAd" class="collapse" aria-labelledby="headingPopup" data-parent="#accordion">
                                <div class="card-body">
                                    <input type="hidden" name="ad_type[]" value="popup">
                                    <div class="row margin-top-20">
                                        <div class="col-md-3">
                                            <span class="bold">Interstitial Image :</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <p><input type="file" accept="image/*" name="image[popup]" id="file"
                                                      onchange="loadFile(event)" style="display: none;"></p>
                                            <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                <label for="file" style="cursor: pointer;">Upload Image Here</label>
                                            </p>

                                            <p>
                                                <img id="popupImg" width="200" />
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row margin-top-20">
                                        <div class="col-md-3">
                                            <span class="bold">Interstitial Link :</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                        <textarea name="add_link[popup]" class="add-link-input" cols="85"
                                                  rows="2"></textarea>
                                        </div>
                                    </div>

                                    <div class="row margin-top-20">
                                        <div class="col-md-3">
                                            <span class="bold"> Show Add (Per Click) :</span>
                                        </div>
                                        <div class="offset-1 col-md-8">
                                            <input type="number" name="show_per_video_category[popup]" class="add-link-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- End:: Interstitial adsd --}}

                    {{-- Start:: Custom Add --}}
                    <div id="customAdSection" class="margin-top-20">
                        <div class="form-check form-switch custom-ad-heading">
                            <div class="row">
                                <div class="col-md-11">
                                    <h5 class="bold">Custom Add Section</h5>
                                </div>
                                <?php
                                $checked = '';
                                if (!$target->isEmpty()) {
                                    foreach ($target as $data) {
                                        if ($data->ad_type == 'custom_header') {
                                            if ($data->status == 'on') {
                                                $checked = 'checked';
                                            }
                                        }
                                    }
                                }
                                ?>
                                <div class="col-md-1">
                                    <input class="form-check-input" data-class="featured" name="status" type="checkbox"
                                           id="disableCustom" {{$checked}}>
                                </div>
                            </div>
                        </div>

                        <div class="custom-ad-body">
                            @if (!$target->isEmpty())

                                {{-- Start:: Custom Header --}}
                                @foreach ($target as $data)
                                    @if ($data->ad_type == 'custom_header')
                                        <div class="card">
                                            <div class="card-header" id="headingCustomHeader">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#customHeaderAd" aria-expanded="false"
                                                            aria-controls="customHeaderAd">
                                                        Custom Header Banner Ads ( Recommended size: 728 x 90 pixels) 
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="customHeaderAd" class="collapse"
                                                 aria-labelledby="headingCustomHeader" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <input type="hidden" name="ad_type[]" value="custom_header">
                                                        <div class="row margin-top-20">

                                                            <div class="col-md-3">
                                                                <span class="bold">Custom Header Image :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                                <p><input type="file" accept="image/*"
                                                                          name="image[custom_header]" id="fileCH"
                                                                          onchange="loadFileCH(event)" style="display: none;"></p>
                                                                <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                                    <label for="fileCH" style="cursor: pointer;">Upload Image
                                                                        Here</label>
                                                                </p>
                                                                <p>
                                                                    @if (!empty($data->image))
                                                                        <img src="{{ URL::to('/') }}/uploads/ad/{{ $data->image }}"
                                                                             alt="Custom" title="Custom" id="CHImg"
                                                                             width="200" />
                                                                    @else
                                                                        <img id="CHImg" width="200" />
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                                <span class="bold">Custom Header Link :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                            <textarea name="add_link[custom_header]" class="add-link-input"
                                                                      cols="85" rows="2">{{ $data->ad_link }}</textarea>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="row margin-top-40">
                                                            <div class="col-md-12">
                                                                <span class="bold"> ADVANCE USASE:</span>
                                                                <br /><br />
                                                                <span>If you leave the AdSense size boxes on Auto, the theme
                                                                    will
                                                                    automatically resize
                                                                    the
                                                                    Google Ads.</span>
                                                            </div>

                                                            <div class="col-md-6 margin-top-40">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <label class="form-check-label bold"
                                                                                for="disableDesktopcustomHeader">DISABLE ON
                                                                                DESKTOP</label>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <input class="form-check-input"
                                                                                data-class="featured"
                                                                                name="disable_desktop[custom_header]"
                                                                                type="checkbox" id="disableDesktopcustomHeader"
                                                                                {!! $data->disable_desktop == 'on' ? 'checked' : '' !!}>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 margin-top-40">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right">
                                                                            <label class="form-check-label" for="">Adsense
                                                                                Size</label>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <select name="desktop_adsense[custom_header]"
                                                                                class="adsense-select">
                                                                                <option value="0">Select a size</option>

                                                                                @if (!empty($adsenseSizeArr))
                                                                                    @foreach ($adsenseSizeArr as $size)
                                                                                        <?php
                                                                                        $selected = '';
                                                                                        if ($data->desktop_adsense == $size) {
                                                                                            $selected = 'selected';
                                                                                        }
                                                                                        ?>
                                                                                        <option {{ $selected }}>
                                                                                            {{ $size }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 margin-top-20">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <label class="form-check-label bold"
                                                                                for="disableTabletLandscapecustomHeader">DISABLE
                                                                                ON
                                                                                TABLET LANDSCAPE</label>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <input class="form-check-input"
                                                                                data-class="featured"
                                                                                name="disable_tablet_landscape[custom_header]"
                                                                                type="checkbox"
                                                                                id="disableTabletLandscapecustomHeader"
                                                                                {!! $data->disable_tablet_landscape == 'on' ? 'checked' : '' !!}>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 margin-top-20">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right">
                                                                            <label class="form-check-label" for="">Adsense
                                                                                Size</label>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <select
                                                                                name="tablet_landscape_adsense[custom_header]"
                                                                                class="adsense-select">
                                                                                <option value="0">Select a size</option>

                                                                                @if (!empty($adsenseSizeArr))
                                                                                    @foreach ($adsenseSizeArr as $size)
                                                                                        <?php
                                                                                        $selected = '';
                                                                                        if ($data->tablet_landscape_adsense == $size) {
                                                                                            $selected = 'selected';
                                                                                        }
                                                                                        ?>
                                                                                        <option {{ $selected }}>
                                                                                            {{ $size }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 margin-top-20">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <label class="form-check-label bold"
                                                                                for="disableTabletPortraitcustomHeader">DISABLE
                                                                                ON
                                                                                TABLET PORTRAIT</label>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <input class="form-check-input"
                                                                                data-class="featured"
                                                                                name="disable_tablet_portrait[custom_header]"
                                                                                type="checkbox"
                                                                                id="disableTabletPortraitcustomHeader"
                                                                                {!! $data->disable_tablet_portrait == 'on' ? 'checked' : '' !!}>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 margin-top-20">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right">
                                                                            <label class="form-check-label" for="">Adsense
                                                                                Size</label>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <select
                                                                                name="tablet_portrait_adsense[custom_header]"
                                                                                class="adsense-select">
                                                                                <option value="0">Select a size</option>

                                                                                @if (!empty($adsenseSizeArr))
                                                                                    @foreach ($adsenseSizeArr as $size)
                                                                                        <?php
                                                                                        $selected = '';
                                                                                        if ($data->tablet_portrait_adsense == $size) {
                                                                                            $selected = 'selected';
                                                                                        }
                                                                                        ?>
                                                                                        <option {{ $selected }}>
                                                                                            {{ $size }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 margin-top-20">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <label class="form-check-label bold"
                                                                                for="disablePhonecustomHeader">DISABLE ON
                                                                                PHONE</label>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <input class="form-check-input"
                                                                                data-class="featured"
                                                                                name="disable_phone[custom_header]"
                                                                                type="checkbox" id="disablePhonecustomHeader"
                                                                                {!! $data->disable_phone == 'on' ? 'checked' : '' !!}>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 margin-top-20">
                                                                <div class="form-check form-switch">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right">
                                                                            <label class="form-check-label" for="">Adsense
                                                                                Size</label>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <select name="phone_adsense[custom_header]"
                                                                                class="adsense-select">
                                                                                <option value="0">Select a size</option>

                                                                                @if (!empty($adsenseSizeArr))
                                                                                    @foreach ($adsenseSizeArr as $size)
                                                                                        <?php
                                                                                        $selected = '';
                                                                                        if ($data->phone_adsense == $size) {
                                                                                            $selected = 'selected';
                                                                                        }
                                                                                        ?>
                                                                                        <option {{ $selected }}>
                                                                                            {{ $size }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- End:: Custom Header --}}

                                {{-- Start:: Custom After Category --}}
                                @foreach ($target as $data)
                                    @if ($data->ad_type == 'custom_site_banner')
                                        <div class="card margin-top-20">
                                            <div class="card-header" id="headingCustomAfterCategory">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#customAfterCategoryAd" aria-expanded="false"
                                                            aria-controls="customAfterCategoryAd">
                                                        Custom Site Banner Ads  ( Recommended size: 160 x 600 pixels) 
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="customAfterCategoryAd" class="collapse"
                                                 aria-labelledby="headingCustomAfterCategory" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <input type="hidden" name="ad_type[]" value="custom_site_banner">
                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                            <span class="bold">Custom site banner Image
                                                                :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                                <p><input type="file" accept="image/*"
                                                                          name="image[custom_site_banner]" id="fileCAC"
                                                                          onchange="loadFileCAC(event)" style="display: none;">
                                                                </p>
                                                                <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                                    <label for="fileCAC" style="cursor: pointer;">Upload Image
                                                                        Here</label>
                                                                </p>
                                                                <p>
                                                                    @if (!empty($data->image))
                                                                        <img src="{{ URL::to('/') }}/uploads/ad/{{ $data->image }}"
                                                                             alt="Custom After Category"
                                                                             title="Custom After Category" id="CACImg"
                                                                             width="200" height="100" />
                                                                    @else
                                                                        <img id="CACImg" width="200" height="100" />
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                            <span class="bold">Custom site banner Link
                                                                :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                            <textarea name="add_link[custom_site_banner]"
                                                                      class="add-link-input" cols="85"
                                                                      rows="2">{{ $data->ad_link }}</textarea>
                                                            </div>
                                                        </div>

{{--                                                        <div class="row margin-top-20">--}}
{{--                                                            <div class="col-md-3">--}}
{{--                                                                <span class="bold"> Show Add  :</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="offset-1 col-md-8">--}}
{{--                                                                <input type="number"--}}
{{--                                                                       name="show_per_video_category[custom_site_banner]"--}}
{{--                                                                       class="add-link-input"--}}
{{--                                                                       value="{{ $data->show_per_video_category }}">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- End:: Custom After Category --}}

                                {{-- Start:: Custom Native (You May also like) --}}
                                @foreach ($target as $data)
                                    @if ($data->ad_type == 'custom_upcoming_matches')
                                        <div class="card margin-top-20">
                                            <div class="card-header" id="headingCustomNativeLike">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#customNativeLikeAd" aria-expanded="false"
                                                            aria-controls="customNativeLikeAd">
                                                       Custom Upcoming Matches Inline Native Ads ( Recommended size: 300 x 300 pixels) 
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="customNativeLikeAd" class="collapse"
                                                 aria-labelledby="headingCustomNativeLike" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <div class="row margin-top-20">

                                                            <input type="hidden" name="ad_type[]" value="custom_upcoming_matches">

                                                            <div class="col-md-3">
                                                                <span class="bold">Custom upcoming matches inline Image:</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                                <p><input type="file" accept="image/*"
                                                                          name="image[custom_upcoming_matches]" id="fileCNL"
                                                                          onchange="loadFileCNL(event)" style="display: none;">
                                                                </p>
                                                                <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                                    <label for="fileCNL" style="cursor: pointer;">Upload Image
                                                                        Here</label>
                                                                </p>
                                                                <p>
                                                                    @if (!empty($data->image))
                                                                        <img src="{{ URL::to('/') }}/uploads/ad/{{ $data->image }}"
                                                                             alt="Custom Native like" title="Custom Native like"
                                                                             id="CNLImg" width="200"  />
                                                                    @else
                                                                        <img id="CNLImg" width="200" />
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                            <span class="bold">Custom upcoming matches inline Link
                                                                :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                            <textarea name="add_link[custom_upcoming_matches]"
                                                                      class="add-link-input" cols="85"
                                                                      rows="2">{{ $data->ad_link }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                                <span class="bold"> Show Add  :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                                <input type="number"
                                                                       name="show_per_video_category[custom_upcoming_matches]"
                                                                       class="add-link-input"
                                                                       value="{{ $data->show_per_video_category }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- End:: Custom Native (You May also like) --}}

                                {{-- Start:: Custom Native (For Series Video) --}}
                                @foreach ($target as $data)
                                    @if ($data->ad_type == 'custom_popup')
                                        <div class="card margin-top-20">
                                            <div class="card-header" id="headingCustomNativeSeries">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#customNativeSeriesAd" aria-expanded="false"
                                                            aria-controls="customNativeSeriesAd">
                                                        Custom Interstitial ads ( Recommended size: 300 x 600 pixels(max)) 
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="customNativeSeriesAd" class="collapse"
                                                 aria-labelledby="headingCustomNativeSeries" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <div class="row margin-top-20">

                                                            <input type="hidden" name="ad_type[]" value="custom_popup">

                                                            <div class="col-md-3">
                                                                <span class="bold">Custom Interstitial Image :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                                <p><input type="file" accept="image/*"
                                                                          name="image[custom_popup]" id="fileCNS"
                                                                          onchange="loadFileCNS(event)" style="display: none;">
                                                                </p>
                                                                <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                                    <label for="fileCNS" style="cursor: pointer;">Upload Image
                                                                        Here</label>
                                                                </p>
                                                                <p>
                                                                    @if (!empty($data->image))
                                                                        <img src="{{ URL::to('/') }}/uploads/ad/{{ $data->image }}"
                                                                             alt="Custom Native Series"
                                                                             title="Custom Native series" id="CNSImg"
                                                                             width="200" />
                                                                    @else
                                                                        <img id="CNSImg" width="200" />
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                            <span class="bold">Custom Interstitial Link
                                                                :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                            <textarea name="add_link[custom_popup]"
                                                                      class="add-link-input" cols="85"
                                                                      rows="2">{{ $data->ad_link }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row margin-top-20">
                                                            <div class="col-md-3">
                                                                <span class="bold"> Show Add (Per click) :</span>
                                                            </div>
                                                            <div class="offset-1 col-md-8">
                                                                <input type="number"
                                                                       name="show_per_video_category[custom_popup]"
                                                                       class="add-link-input"
                                                                       value="{{ $data->show_per_video_category }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- End:: Custom Native (For series video) --}}

                            @else
                                {{-- Start:: Custom Header --}}
                                <div class="card">
                                    <div class="card-header" id="headingCustomHeader">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#customHeaderAd" aria-expanded="false"
                                                    aria-controls="customHeaderAd">
                                                Custom Header Banner Ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="customHeaderAd" class="collapse" aria-labelledby="headingCustomHeader"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row margin-top-20">

                                                    <input type="hidden" name="ad_type[]" value="custom_header">

                                                    <div class="col-md-3">
                                                        <span class="bold">Custom Header Image :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                        <p><input type="file" accept="image/*" name="image[custom_header]"
                                                                  id="fileCH" onchange="loadFileCH(event)" style="display: none;">
                                                        </p>
                                                        <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                            <label for="fileCH" style="cursor: pointer;">Upload Image
                                                                Here</label>
                                                        </p>
                                                        <p>
                                                            <img id="CHImg" width="200" />
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20">
                                                    <div class="col-md-3">
                                                        <span class="bold">Custom Header Link :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                    <textarea name="add_link[custom_header]" class="add-link-input"
                                                              cols="85" rows="2"></textarea>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- End:: Custom Header --}}

                                {{-- Start:: Custom After Category --}}
                                <div class="card margin-top-20">
                                    <div class="card-header" id="headingCustomAfterCategory">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#customAfterCategoryAd" aria-expanded="false"
                                                    aria-controls="customAfterCategoryAd">
                                                Site Banner Ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="customAfterCategoryAd" class="collapse"
                                         aria-labelledby="headingCustomAfterCategory" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row margin-top-20">

                                                    <input type="hidden" name="ad_type[]" value="custom_site_banner">

                                                    <div class="col-md-3">
                                                    <span class="bold">Custom Site banner Image
                                                        :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                        <p><input type="file" accept="image/*"
                                                                  name="image[custom_site_banner]" id="fileCAC"
                                                                  onchange="loadFileCAC(event)" style="display: none;"></p>
                                                        <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                            <label for="fileCAC" style="cursor: pointer;">Upload Image
                                                                Here</label>
                                                        </p>
                                                        <p>
                                                            <img id="CACImg" width="200" height="100"/>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20">
                                                    <div class="col-md-3">
                                                    <span class="bold">Custom  Site banner Link
                                                        :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                    <textarea name="add_link[custom_site_banner]" class="add-link-input"
                                                              cols="85" rows="2"></textarea>
                                                    </div>
                                                </div>


{{--                                                <div class="row margin-top-20">--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <span class="bold"> Show Add  :</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="offset-1 col-md-8">--}}
{{--                                                        <input type="number"--}}
{{--                                                               name="show_per_video_category[custom_site_banner]"--}}
{{--                                                               class="add-link-input">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- End:: Custom After Category --}}

                                {{-- Start:: Custom Native (You May also like) --}}
                                <div class="card margin-top-20">
                                    <div class="card-header" id="headingCustomNativeLike">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#customNativeLikeAd" aria-expanded="false"
                                                    aria-controls="customNativeLikeAd">
                                             custom  Upcoming Matches Inline Native Ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="customNativeLikeAd" class="collapse"
                                         aria-labelledby="headingCustomNativeLike" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row margin-top-20">

                                                    <input type="hidden" name="ad_type[]" value="custom_upcoming_matches">

                                                    <div class="col-md-3">
                                                        <span class="bold">Custom  upcoming matches inline :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                        <p><input type="file" accept="image/*" name="image[custom_upcoming_matches]"
                                                                  id="fileCNL" onchange="loadFileCNL(event)"
                                                                  style="display: none;"></p>
                                                        <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                            <label for="fileCNL" style="cursor: pointer;">Upload Image
                                                                Here</label>
                                                        </p>
                                                        <p>
                                                            <img id="CNLImg" width="200" />
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20">
                                                    <div class="col-md-3">
                                                        <span class="bold">Custom  upcoming matches inline Link  :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                    <textarea name="add_link[custom_upcoming_matches]" class="add-link-input"
                                                              cols="85" rows="2"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20">
                                                    <div class="col-md-3">
                                                        <span class="bold"> Show Add (Per matches) :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                        <input type="number" name="show_per_video_category[custom_upcoming_matches]"
                                                               class="add-link-input">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- End:: Custom Native (You May also like) --}}

                                {{-- Start:: Custom Native (For Series Video) --}}
                                <div class="card margin-top-20">
                                    <div class="card-header" id="headingCustomNativeSeries">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#customNativeSeriesAd" aria-expanded="false"
                                                    aria-controls="customNativeSeriesAd">
                                                Custom Interstitial ads
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="customNativeSeriesAd" class="collapse"
                                         aria-labelledby="headingCustomNativeSeries" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row margin-top-20">

                                                    <input type="hidden" name="ad_type[]" value="custom_popup">

                                                    <div class="col-md-3">
                                                        <span class="bold">Custom Interstitial Image </span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                        <p><input type="file" accept="image/*"
                                                                  name="image[custom_popup]" id="filecns"
                                                                  onchange="loadFileCNS(event)" style="display: none;"></p>
                                                        <p class="btn btn-outline-dark btn-sm web-ad-img-btn">
                                                            <label for="fileCNS" style="cursor: pointer;">Upload Image
                                                                Here</label>
                                                        </p>
                                                        <p>
                                                            <img id="CNSImg" width="200" />
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20">
                                                    <div class="col-md-3">
                                                        <span class="bold">Custom Interstitial Link  :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                    <textarea name="add_link[custom_popup]" class="add-link-input"
                                                              cols="85" rows="2"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20">
                                                    <div class="col-md-3">
                                                        <span class="bold"> Show Add (Per click) :</span>
                                                    </div>
                                                    <div class="offset-1 col-md-8">
                                                        <input type="number"
                                                               name="show_per_video_category[custom_popup]"
                                                               class="add-link-input">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- End:: Custom Native (For series video) --}}
                            @endif
                        </div>
                    </div>
                    {{-- End:: Custom Add --}}
                    <div class="col-md-12 actions margin-top-20 text-center">
                        <button type="submit" class="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- End::Content Body --}}

    </main>
    <!-- ======= End Main Content Section ======= -->
@endsection
@push('custom-js')
    <script type="text/javascript">
        
        $(".submit").click(function(){
            $("#disMsg").removeClass("d-none")
        })
    
            
        var loadFile = function(event) {
            var image = document.getElementById('popupImg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileCH = function(event) {
            var image = document.getElementById('CHImg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileCAC = function(event) {
            var image = document.getElementById('CACImg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileCNL = function(event) {
            var image = document.getElementById('CNLImg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileCNS = function(event) {
            var image = document.getElementById('CNSImg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        pageRestricted(page);
    </script>
@endpush
