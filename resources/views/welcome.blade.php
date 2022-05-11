<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        {{-- icons --}}
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="wrapper">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('warning') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('fail') }}
                </div>
            @endif

            <form action="{{ route('create') }}" method="POST">
                @csrf
              <i class="url-icon uil uil-link"></i>
              <input type="text" name="long_url" placeholder="Enter or paste a long url" autocomplete="off">
              <button>Submit</button>
            </form>


              <div class="count">
                <span>Total Links: <span>{{ $total_links }}</span> | Total Clicks: <span>{{ $total_clicks }}</span></span>
                <a href="{{ route('delete-all') }}" class="clear-all">Clear All</a>
              </div>

              @if ($total_links > 0)



              <div class="urls-area">
                <div class="title">
                  <li>Short URL</li>
                  <li>Original URL</li>
                  <li>Clicks</li>
                  <li>Action</li>
                </div>
                @foreach ($urls as $url)


                  <div class="data">
                    <li>
                      <a href="{{ route('open-url',['short_url' => $url->short_url ,'url_token' => $url->url_token]) }}" target="_blank">
                        {{ $url->short_url }}
                      </a>
                    </li>
                    <li>
                        <a href="{{ $url->long_url }}" target="_blank">
                            {{ Str::limit($url->long_url, 50) }}
                        </a>
                    </li>
                    <li>{{ $url->hits }}</li>
                    <li><a href="{{ route('delete', $url->id) }}">Delete</a></li>
                  </div>
                @endforeach
            </div>


              @else

              <h3 class="text-center">No links yet!</h3>

              @endif

            </div>

          {{-- <div class="blur-effect"></div>

          <div class="popup-box">
            <div class="info-box">Your short link in ready. You can also edit your link now, but can't edit once you saved it</div>
            <form action="#">
              <label>Edit your short url</label>
              <input type="text" spellcheck="false" value="">
              <i class="copy-icon uil uil-copy-alt"></i>
              <button>Save</button>
            </form>
          </div> --}}

          {{-- bootstrap --}}
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
          {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    </body>
</html>
