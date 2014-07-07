<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{$title}}<a href="{{$baseUrl}}delete/{{$id}}" class="pull-right">&times;</a></h3>
  </div>
  <div class="panel-body">
    <p class="text-right"><small>{{$datetime}}</small></p>
    <p>{{$text}}</p>
    
    <?php if($more){ ?>
        <a href="{{$baseUrl}}article/{{$id}}" class="pull-right">Show more</a>
    <?php } ?>

  </div>

</div>
