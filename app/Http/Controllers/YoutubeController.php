<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Google_Client;
use Google_Service_YouTube;

class YoutubeController extends Controller
{
    const MAX_SNIPPETS_COUNT = 50;
    const DEFAULT_ORDER_TYPE = 'date';
    public function store()
    {
        $msg='部位を選んでください！';
        return view('layouts.home')->with(['msg'=>$msg]);
    }

    public function getListByChannelId(Request $request)
    {
        $posts = $request->all();
        //dd($posts);
        
        
    
        $request->validate(['q' => 'required']);
        //dd($posts);

        // Googleへの接続情報のインスタンスを作成と設定
        $client = new Google_Client();
        $client->setDeveloperKey(env('GOOGLE_API_KEY'));

        // 接続情報のインスタンスを用いてYoutubeのデータへアクセス可能なインスタンスを生成
        $youtube = new Google_Service_YouTube($client);

        // 必要情報を引数に持たせ、listSearchで検索して動画一覧を取得
        $items = $youtube->search->listSearch('id,snippet', [
            'q' => $posts['q'],
            'order'      => $posts['pulldown'],
            'maxResults' => $posts['maxResults'],
        ]);

        //検索した動画の再生数や高評価数を$responseに入れる
        foreach($items['items'] as $item){
            $videoId[] = $item['id']->videoId;
        }
        
            $listResponse = $youtube->videos->listVideos('id,snippet,statistics',
            array('id' => $videoId));

        
        
        return view('youtube')->with(['items' => $items, 'listResponse' => $listResponse]);


    }
}
