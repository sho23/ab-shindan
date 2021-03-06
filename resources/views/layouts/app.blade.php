<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="<?php echo $__env->yieldContent('detail') !== '' ? $__env->yieldContent('detail') : 'おもしろAB診断投稿サイトです。ログインすると「診断の作成/編集/削除」ができるようになります。'; ?>">
    <meta property="og:title"       content="AB診断メーカー">
    <meta property="og:site_name"   content="AB診断メーカー">
    <meta property="og:description" content="<?php echo $__env->yieldContent('detail') !== '' ? $__env->yieldContent('detail') : 'おもしろAB診断投稿サイトです。ログインすると「診断の作成/編集/削除」ができるようになります。'; ?>">
    <meta property="og:url"         content="<?php echo $__env->yieldContent('url') !== '' ? $__env->yieldContent('url') : url('/'); ?>">
    <meta property="og:type"        content="website">
    <meta property="og:image"       content="<?php echo $__env->yieldContent('ogimg') !== '' ? url('/') . '/' . $__env->yieldContent('ogimg') : asset('image/ogimg.jpg'); ?>">

    <meta name="twitter:image"      content="<?php echo $__env->yieldContent('ogimg') !== '' ? url('/') . '/' . $__env->yieldContent('ogimg') : asset('image/ogimg.jpg'); ?>">
    <meta name="twitter:card"       content="summary_large_image">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="{{ url('/') }}/image/icon.ico">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ url('/') }}/dist/css/flat-ui.min.css" rel="stylesheet"><!-- Loading Flat UI -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118256403-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-118256403-1');
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">診断を作る</a></li>
                        @else
                            <li><a class="btn btn-primary" href="{{ action('PostsController@create') }}">新規追加</a></li>
                            <li class="nav-item dropdown ml-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>



                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ action('PostsController@index') }}">マイページへ</a>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="container text-center">
                <ul class="list-inline mx-auto">
                    <li class="list-inline-item"><small><a href="{{ action('HomeController@terms') }}">利用規約</a></small></li>
                    <li class="list-inline-item"><small><a href="{{ action('HomeController@privacy') }}">プライバシーポリシー</a></small></li>
                </ul>
            <small class="text-muted">© 2018 AB診断メーカー</small>
        </div>
    </footer>
    <script src="{{ url('/') }}/dist/js/vendor/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('[name=number]').change(function() {
                var val = $('[name=number]').val();
                if (val == 1) {
                    $(".extr").css('display', 'none');
                    $(".variable-point").text('10');
                } else {
                    $(".extr").css('display', 'inherit');
                    $(".variable-point").text('5');
                }
            }).change();

            imgType = $('[name=img_type]:checked').val();
            if (imgType != 0) {
                $(".result-img").css('display', 'none');
            } else {
                $(".result-img").css('display', 'inherit');
            }
            $('[name=img_type]:radio').change(function() {
                var val = $(this).val();
                if (val != 0) {
                    $(".result-img").css('display', 'none');
                } else {
                    $(".result-img").css('display', 'inherit');
                }
            });

            $(".imagePreview").css('display', 'none');
            $(document).on('change', ':file', function() {
                var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.parent().parent().next(':text').val(label);
                input.parent().parent().parent().prev('.imagePreview').css('display', 'inherit');
                input.parent().parent().parent().prev().prev('.curImg').css('display', 'none');

                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        input.parent().parent().parent().prev('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }
            });
        });
    </script>
</body>
</html>
