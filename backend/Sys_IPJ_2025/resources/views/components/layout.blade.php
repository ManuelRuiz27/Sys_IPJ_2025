<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Beneficiarios' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TF1sN3TfNwCuWHa3gwPrmT2y+jk/wQ8AjtKoa6HgMHqYjgJv1nVbWcv16O3EOai9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('beneficiarios.index') }}">Beneficiarios</a>
  </div>
</nav>
<div class="container">
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif
  {{ $slot }}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZrxhgbf+168Q5e0siJmq9hw3rroWAtxEvsC0BpvyEuk+qS0bkkCm1cW0XGbkADV" crossorigin="anonymous"></script>
</body>
</html>
