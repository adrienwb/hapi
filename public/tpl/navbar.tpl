   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Your personal health API</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
{if="$loggedin!==true"}
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
{else}
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
{/if}
            </ul>
{if="$loggedin===true"}
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">{$profile.first_name}</a>
            </p>
{else}
<button class="btn btn-small btn-primary fb_login pull-right" type="button">Connect with Facebook</button>
{/if} 


          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>