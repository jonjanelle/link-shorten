<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>URL Shortener</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/home_styles.css" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>


  <!-- Page Content -->
  <div class="container">

      <div class="row">
          <div class="col-lg-12 text-center">
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
          <input type="text" class="form-control" id="link-input" name="link-input" placeholder="url" required autofocus>
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

  <!-- jQuery Version 1.11.1 -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/home_scripts.js"></script>
</body>

</html>
