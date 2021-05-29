@extends('shopify-app::layouts.default')


@section('content')
    <!-- You are: (shop domain name) -->
    
    <div class="card offset-4 mt-5" style="width: 18rem;" >
        <img src="{{ asset('images/image-placeholder.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Size Calculator</h5>
          <p class="card-text">Size Calculator app with best feature that gives you production with best recommendations.</p>
          <a href="{{ route('attributes.home') }}" class="btn btn-primary">Start</a>
        </div>
      </div>

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'Welcome',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
        if (window.location !== window.parent.location) {
//   app.dispatch(Redirect.toRemote({
//     url: location.href,
    
//   }));
//http://c3574eb4c1b4.ngrok.io/?hmac=6c0fb97637421e7bdf4ec32cf32259682f098b2553aaef0d60d8e7804e4d93c5&host=d2R0Y3YubXlzaG9waWZ5LmNvbS9hZG1pbg&new_design_language=true&session=94473b233acbd2d9fb6c8208b19cc3cbbd03be3acd73cc7ddb0b5792ed8b3829&shop=wdtcv.myshopify.com&timestamp=1617775748
}
    </script>
@endsection