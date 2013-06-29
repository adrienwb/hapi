<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang="en">
{include="header"}
<body>

{include="navbar"}


{if="$loggedin!==false"}
	{include="home_connected"}
{else}
	{include="home_index"}
{/if}

      <hr>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div> <!-- /container -->




{include="footer"}
</body>
</html>
