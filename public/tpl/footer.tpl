

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId: '{$conf.FACEBOOK.APP_ID}',
      cookie: true,
      xfbml: true,
      oauth: true
    });
    FB.getLoginStatus(function (response) {
        if(response.status === 'connected'){
          console.log(response);
        } else if (response.status === 'not_authorized'){
            console.log(response);
        } else {
            console.log('no user session available');
        }
    });


    FB.Event.subscribe('auth.login', function(response) {
      window.location.reload();
    });
    FB.Event.subscribe('auth.logout', function(response) {
      window.location.reload();
    });
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
 <script type="text/javascript" src="/assets/js/main.js"></script>
 <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="/assets/js/jquery.popup.js"></script>