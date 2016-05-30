<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>

    <form id="formularz" class="form-horizontal" action="wpis_check.php" method="post">
        <div class="form-group">
            <label for="inputWpis" class="col-sm-2 control-label">Nick</label>
            <div class="col-sm-1">
                <textarea type="text" name="nick" class="form-control" id="inputWpis" placeholder="NICK"></textarea>
            </div>
        </div>
      <div class="form-group">
        <label for="inputTrescWpis" class="col-sm-2 control-label">Wpis</label>
        <div class="col-sm-3">
          <textarea type="text" name="wpis" class="form-control" id="inputTrescWpis" placeholder="Napisz cuś.." rows="15"></textarea>
        </div>
      </div
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Dodaj wpis</button>
            </div>
        </div>
    </form>

    </div> <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src=http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script>
          $("#formularz").validate({
            rules: {
              nick: "required",
              wpis: "required",
              email: {
                required: true,
                email: true
              }
            },
            messages: {
              nick: "Weź się przedstaw...",
              wpis: "Czemu tu jest pusto !?",
            }
          });
        </script>
        <script src="js/main.js"></script>
    </body>
</html>
