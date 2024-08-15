<!DOCTYPE html>
<html lang="en">

  <script>
    setTimeout(() => {
      history.back();
    }, 60_000);
  </script>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 50px;
      }

      .container {
        max-width: 600px;
        margin: 0 auto;
      }

      .illustration {
        background: url('{{ asset('asset-thrift/403.png') }}') no-repeat center center;
        background-size: cover;
        height: 300px;
        width: 300px;
        margin: 0 auto;
      }

      h1 {
        color: #333;
      }

      p {
        color: #666;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="illustration"></div>
      <h1>403 Forbidden</h1>
      <p>Maaf, Anda tidak ada akses untuk halaman ini.</p>
    </div>

  </body>

</html>
