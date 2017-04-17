<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col text-center">
          <div id="header-div">
            <div id="main-header">URL Shortener</div>
            <div id="sub-header">make long links easier to share</div>
          </div>
        </div>
    </div>
    <!-- /.row -->
    <form method="POST" action="/shorten">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="link-input">Paste your link below</label>
        <input type="text" class="form-control" id="link-input" name="link-input" placeholder="http://" required autofocus>
      </div>
      <button type="submit" class="btn btn-primary btn-lg" id="main-submit">Shorten it!</button>
    </form>

  @isset ($shortUrl)
    <div id="output">
      <h2>shortened url </h2>
      <div class="alert alert-success" id = "shorturl" onclick="copyToClipboard()">
        http://localhost/{{$shortUrl}}
      </div>
      <p id="copy-msg">click link to copy to clipboard</p>
    </div>
  @endisset

</div><!-- /.container -->
<script src="js/shorten_scripts.js"></script>
