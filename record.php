<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Records - Space invaders</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/components/main.css" />
    <link rel="stylesheet" href="/components/record.css" />
    
</head>
  <body>
<div class="space"></div>
<div class="header">
<nav class="navbar navbar-expand-lg" >
        <div class="container-fluid ">
          <a class="anchor" name="top" style="top: 0px;"></a>
          <a class="navbar-brand" href="index.html"><img src="images-video/logodef.png" class="logo" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="nmainNav" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <ul class="navbar-nav mb-2 mb-lg-0 links">
              <li class="nav-item link">
                <a class="nav-link " href="play.html">PLAY</a>
              </li>
              <li class="nav-item link">
                <a class="nav-link " href="record.php">RECORD</a> 
              </li>
              <li class="nav-item link">
                <a class="nav-link" href="products.html">PRODUCTS</a>
              </li>
              <li class="nav-item link">
                <a class="nav-link " href="news.html">NEWS</a>
              </li>
              <li class="nav-item link">
                <a class="nav-link " href="about.html">ABOUT</a>
              </li>
             
            </ul>
         </div>
        </div>
      </nav>
</div>

    <div class="container-fluid main-roba">
      <div class="container-fluid row" style="height: 100%;">
      <div class="col-2 d-none d-xl-block d-xxl-block" style="height: 100%;"></div>
      <div class="col-12 col-xl-8">
        <div class="align-self-center" style="height: 90%">

          <?php
          $dbconn = pg_connect("host=localhost port=5432 dbname=Space  user=edvige password=edvige")
            or die(' Could not connect: ' . pg_lasterror());
          $query = 'SELECT name, points FROM records ORDER BY "points" desc ';
          pg_send_query($dbconn, $query) or die(' Query failed: ' . pg_lasterror());
          $result = pg_get_result($dbconn);
          echo "<table class='table table-dark table-striped'>\n<thead>
          <tr>
            <th scope='col'>#</th>
            <th scope='col'>USER</th>
            <th scope='col'>Points</th>
          </tr>
        </thead>
        <tbody> ";
          $position = 0;
          while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "\t<tr>\n"; 
          
            $position++;
            if($position <= 3){
              echo "<th class='h$position' scope='row'>$position</th>";
              foreach ($line as $colvalue) {
               
                echo "\t\t<td class='h$position'>$colvalue </td>";
              }
            }
            else{
              echo "<th scope='row'>$position</th>";
              foreach ($line as $colvalue) {
             
                echo "\t\t<td>$colvalue </td>";
              }
            }
            
            echo "\t</tr>\n ";
          }
          echo "</tbody></table>\n";
          pg_free_result($result);
          pg_close($dbconn);
          ?>

        </div>
      </div>
      <div class="col-2 d-none d-xl-block d-xxl-block" style="height: 100%;"></div>
      </div>
    </div>
   



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>