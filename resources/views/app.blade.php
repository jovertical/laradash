<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        html, body {
            font-family: 'Nunito Sans', sans-serif;
        }

        a {
            color: inherit;
            text-decoration: inherit;
            background-color: transparent;
        }
    </style>

    <link href="{{ mix('app.css', 'vendor/laradash') }}" rel="stylesheet" />
    <script src="{{ mix('app.js', 'vendor/laradash') }}" defer></script>
    @routes
  </head>
  <body>
    @inertia
  </body>
</html>
