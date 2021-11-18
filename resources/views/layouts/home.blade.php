<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/app.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
  <div class="card">
    <div class="card-header text-center">検索内容</div>
    <form class="card-body my-card-body" method="POST" action="{{ route('getChannelId') }}">
      <div>
        <h6>
          鍛える部位
        </h6>
        @csrf
        <div class="form-check-inline mb-3"> 
          <input type="radio" id="q" name="q" value="胸筋トレーニング">大胸筋
          <input type="radio" id="q" name="q" value="腹筋トレーニング">腹筋
          <input type="radio" id="q" name="q" value="腕トレーニング">腕
          <input type="radio" id="q" name="q" value="背中トレーニング">背中
          <input type="radio" id="q" name="q" value="脚トレーニング">脚
          <input type="radio" id="q" name="q" value="肩トレーニング">肩
        </div>
      </div>


      <div class="mb-3 w-auto">
        検索結果表示数: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="10">
      </div>

      <div>
        <select class="form-select form-select-sm mb-3 w-auto" aria-label="Default select example" name="pulldown">
          @foreach(config('pulldown') as $pulldown_id => $name)
            <option value="{{ $pulldown_id }}">{{ $name }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-auto">検索</button>
    </form>
    @error('content')
            <div class="alert alert-danger">部位を選択してください！</div>
    @enderror
  </div>

  @if(isset( $msg ))
    <div class="alert alert-danger mt-3">{{ $msg }}</div>
  @endif

  @yield('content')
</body>
</html>
