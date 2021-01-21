<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Shops</title>
</head>
<body>
  <div class="container">
    <h1 class='text-center my-5'> SHOPS Page </h1>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">
            Shops
          </div>
          <div class="card-body">
            <ul class="list-group">
              @foreach($shops as $shop)
                <li class="list-group-item"><a href="/shops/{{$shop->id}}">{{ $shop->name }}</a></td>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>