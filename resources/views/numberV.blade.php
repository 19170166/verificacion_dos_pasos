<!DOCTYPE html>
<html>
<head>
    <title>Verificar codigo</title>
</head>
<body>
<div class="background text-center">
    <form method="post" action="/api/Verify/{{$id}}">
      <h1 class="h3 font-weight-normal">Verificar codigo</h1>
      <input type="number" id="code" name="code" placeholder="Codigo"/>
      <button type="submit">Ingresar</button>
    </form>
  </div>
</body>
</html>