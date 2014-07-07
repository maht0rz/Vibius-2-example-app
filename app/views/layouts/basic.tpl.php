{{$assets_assets/css/bootstrap::css}}
<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{$baseUrl}}css/{{$urlKey}}" charset="utf-8">
  </head>
  <body>

  <div class="container">
    <div class="col-xs-6 col-xs-offset-3">

        <div class="row"><br>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">New article</h3>
            </div>
            <div class="panel-body">
                <form action="{{$baseUrl}}add" method="POST">
                    <div class="row">
                        <div class="col-xs-8">
                          <p>Title:</p>
                          <input type="text" class="form-control" name="title" placeholder="Title of your post here...">
                        </div>
                        <div class="col-xs-4">
                          <p>Author:</p>
                          <input type="text" class="form-control" name="author" placeholder="Your name here...">
                        </div>
                        <div class="col-xs-12" style="margin-top:10px;">
                          <p>Text:</p>
                          <textarea class="form-control" placeholder="Text of your article here..." name="text"></textarea>
                        </div>
                        <div class="col-xs-12" style="margin-top:10px;">
                          <input type="submit" class="form-control btn btn-primary" value="Post new article">
                        </div>
                    </div>
                </form>
            </div>
          </div>

        </div>

        <div class="row">
            {{$content}}
        </div>

        <div class="row">
              <div class="col-xs-8 pull-right text-right">
                  <i>&copy; Blog by Matej |<small> Generated in: <?php echo (round((microtime(true) - $GLOBALS['execution_time']) * 1000, 2)).' ms' ?></small></i>
              </div>
        </div>

    </div>
  </div>
</body>
</html>
