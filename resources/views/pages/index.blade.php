@extends('layouts.app')

@section('content')
    @include('layouts.home-banner')
    <div class="container mt-64 mb-64">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="text-center">How Can I Help You?</h2>
                <hr />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="benefit-box">
                    <i class="fa fa-video-camera"></i>
                    <h4>Weekly YouTube Videos</h4>
                    <p>Every week, I will be releasing videos about business and how you can use technology to help better your entrepreneur career.</p>
                    <a href="https://www.youtube.com/channel/UCB05e10psLXdPzJnC-sWjEA" class="btn primary-btn btn-sm">Go to Channel</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="benefit-box">
                    <i class="fa fa-laptop"></i>
                    <h4>Software Tools</h4>
                    <p>It's not just about working hard, you must work smart as well. I can help you do that with my software tools to help you automate.</p>
                    <a href="/tools" class="btn primary-btn btn-sm">View Tools</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="benefit-box">
                    <i class="fa fa-users"></i>
                    <h4>Community and Connection</h4>
                    <p>Join a community of like minded people who want to learn more about entreprenership and who want to work smarter than the rest.</p>
                    <a href="/register" class="btn primary-btn btn-sm">Join the Group</a>
                </div>
            </div>
        </div>
    </div>

    <div class="light-gray-row p-64">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <img src="{{ URL::asset('img/Profile.jpg') }}" class="regular-image">
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h3>Who Is SunnyChopper?</h3>
                    <hr />
                    <p>So if you haven't already seen my videos or read some of my blog posts, you're probably wondering who I am and what exactly I do.</p>
                    <p>I've been learning about entrepreneurship since early 2015 and I've just been consumed by it. Every waking hour is filled with something about business, constantly learning and constantly executing. I simply love the game.</p>
                    <p>Over the last few months, I've started to place a large emphasis on working smarter. Matter of fact, it was one of Tai Lopez's videos that made me realize that working hard isn't the only part of the answer.</p>
                    <p>However, as I looked around the Internet, I didn't see any resources specifically geared towards working smarter. Everyone was saying that you need to work smarter, however, no one was really showing how to.</p>
                    <p>I went to school for computer engineering and know quite a bit about technology so I started to create software for myself to work smarter and I realized that if I made the work public, I could help a lot of people and that's what I intend to do.</p>
                </div>
            </div>
        </div>
    </div>

    @if(!Auth::guest())
        @include('layouts.push-notification-js')
    @endif
@endsection