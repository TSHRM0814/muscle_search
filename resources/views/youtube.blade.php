@extends('layouts.home')

@section('content')
<div class="index">
    <div class="main">
        <div class="header">
            <div class="header__title">
                <h3 class="header__title__main">
                   検索結果
                </h3>
            </div>
        </div>
        <div class="content">
        @error('content')
            <div class="alert alert-danger">部位を選択してください！</div>
        @enderror
            <div class="content__body ">
                @foreach ($items['items'] as $item)
                <div class="card-group  mb-3">
                    <a href="https://www.youtube.com/watch?v={{ $item['id']->videoId }}">
                        <img src="https://img.youtube.com/vi/{{ $item['id']->videoId }}/mqdefault.jpg" class="card-img-left" >
                    </a>
                    
                    <div class="card ">
                        <div class="card-header">
                            <p>
                                <a href="https://www.youtube.com/watch?v={{ $item['id']->videoId }}">{{ $item['snippet']->title }}</a>
                            </p>
                        </div>
                        <div class="card-body">
                            <p>
                                チャンネル名：<a href="https://www.youtube.com/channel/{{ $item['snippet']->channelId }}">{{ $item['snippet']->channelTitle }}</a><br>
                                再生回数：@foreach($listResponse['items'] as $response)
                                            @if($response['id'] == $item['id']->videoId)
                                                {{ $response['statistics']->viewCount}}回<br>
                                                @break
                                            @endif
                                         @endforeach

                                高評価数：@foreach($listResponse['items'] as $response)
                                            @if($response['id'] == $item['id']->videoId)
                                                {{ $response['statistics']->likeCount}}回<br>
                                                @break
                                            @endif
                                         @endforeach
                            </p>
                        </div>
                    </div>    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

