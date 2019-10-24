<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= config('APP_NAME', 'weather app') ?></title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
</head>
<body>
<nav class="navbar fixed-top navbar-dark bg-dark">
  <p style="padding: 0; margin: 0;" class="navbar-brand"><?= config('APP_NAME') ?></p>
</nav>
<div style="height: 80px"></div>
  <div class="container">
    <div class="row">
      <div class="col-5">
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="authKeyID">Klucz</label>
          </div>
          <select class="custom-select" id="authKeyID">
            <option selected value="">Brak</option>
              <?php
               foreach($apiKeys as $name => $key)
               {
                 $option = <<<EOT
                    <option value="{$key}">{$name} -> {$key}</option>
EOT;
                 echo $option;
               }
              ?>
          </select>
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="cityID">Miasto</label>
          </div>
          <input id="cityNameID" class="form-control form-control-sm" type="text">
          <div class="input-group-append">
            <button id="searchButtonID" class="btn btn-outline-secondary" type="submit">Szukaj</button>
          </div>
        </div>

        <select class="custom-select mb-2" multiple>
            <?php
              if(!empty($searchResults))
              {
                foreach($searchResults as $city => $id)
                {
                    $option = <<<EOT
                    <option value="{$id}">{$city}</option>
EOT;
                    echo $option;
                }
              }
            ?>
        </select>

        <button type="button" class="btn btn-success btn-sm btn-block">Dodaj</button>
        <div style="height:10px"></div>


        <!-- todo: przeniesc do javascriptu dodawanie i usuwanie-->
        <div class="row">
          <div class="col">
            <span class="align-middle pl-2"
                  style="border-left: 5px solid greenyellow">
              Miasto 1
            </span>
          </div>
          <div class="col"></div>
          <div class="col text-right">
            <button type="button" class="btn btn-sm btn-outline-danger">X</button>
          </div>
        </div>
        <div style="height:10px"></div>

        <div class="row">
          <div class="col">
            <span class="align-middle pl-2"
                  style="border-left: 5px solid greenyellow">
              Miasto 2
            </span>
          </div>
          <div class="col"></div>
          <div class="col text-right">
            <button type="button" class="btn btn-sm btn-outline-danger">X</button>
          </div>
        </div>
        <div style="height:10px"></div>


        <button type="button" class="btn btn-primary btn-sm btn-block">Porównaj</button>
      </div>
      <div class="col-7">

        <!-- todo: przeniesc do javascriptu i dane z requesstu-->
        <div class="row">
          <div class="card col">
            <div class="card-body px-0">
              <div class="row">
                <div class="col-3" style="border-right: 2px solid ">
                  <h5>123 pkt.</h5>
                </div>
                <div class="col">
                  <p class="my-0"><b>Miasto 1 długa nazwa</b></p>
                  <span class="text-muted">
                    <div class="row">
                      <div class="col">Temp: 294</div>
                      <div class="col">Pkt: 70</div>
                      <div class="col">Poz: 1</div>
                    </div>
                    <div class="row">
                      <div class="col">Wiatr: 294</div>
                      <div class="col">Pkt: 70</div>
                      <div class="col">Poz: 1</div>
                    </div>
                    <div class="row">
                      <div class="col">Wilg.: 294</div>
                      <div class="col">Pkt: 70</div>
                      <div class="col">Poz: 3</div>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="height:30px"></div>

        <div class="row">
          <div class="card col">
            <div class="card-body px-0">
              <div class="row">
                <div class="col-3" style="border-right: 2px solid ">
                  <h5>123 pkt.</h5>
                </div>
                <div class="col">
                  <p class="my-0"><b>Miasto 2 długa nazwa</b></p>
                  <span class="text-muted">
                    <div class="row">
                      <div class="col">Temp: 294</div>
                      <div class="col">Pkt: 70</div>
                      <div class="col">Poz: 1</div>
                    </div>
                    <div class="row">
                      <div class="col">Wiatr: 294</div>
                      <div class="col">Pkt: 70</div>
                      <div class="col">Poz: 1</div>
                    </div>
                    <div class="row">
                      <div class="col">Wilg.: 294</div>
                      <div class="col">Pkt: 70</div>
                      <div class="col">Poz: 3</div>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="height:30px"></div>

      </div>
    </div>
  </div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>