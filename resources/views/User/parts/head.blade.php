  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/trangchu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/xemoi.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/trungtam.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/dichvu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/vestore.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/dongxe.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/footer.css')}}">
<title>
    @hasSection('title')
        @yield('title') | {{ config('app.name') }}
    @else
        {{ config('app.name') }}
    @endif
</title>
  