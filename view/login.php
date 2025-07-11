<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, rgb(196, 122, 19), #fcb69f);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      text-align: center;
      width: 320px;
      position: relative;
    }

    .emoji {
      font-size: 3rem;
    }

    h2 {
      margin-bottom: 15px;
      color: #444;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 10px;
      outline: none;
    }

    .btn {
      margin-top: 15px;
      background-color: #8e44ad;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 25px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    h2 {
      color: #8e44ad;
    }

    .btn:hover {
      background-color: #732d91;
    }

    .extra {
      margin-top: 15px;
      font-size: 0.9rem;
    }

    .extra a {
      color: #8e44ad;
      text-decoration: none;
    }

    .extra a:hover {
      text-decoration: underline;
    }

    .footer {
      margin-top: 20px;
      font-size: 0.8rem;
      color: #999;
    }
  </style>
  <script>
    const base_url = '<?= BASE_URL;?>';
  </script>
</head>

<body>
  <div class="login-container">
    <div class="emoji">💻🖥️🖨️</div>
    <h2>Iniciar sesión</h2>
    <form id="frm_login">
      <input type="text" placeholder="Usuario o correo" required id="usuario" name="usuario">
      <input type="password" placeholder="Contraseña" required id="password" name="password">
      <button class="btn" type="button" onclick="iniciar_sesion();">Explorar Tienda</button>
    </form>
    <div class="extra">
      <p>¿Olvidaste tu contraseña? <a href="#">Recupérala</a></p>
      <p>¿Nuevo personal? <a href="#">Regístrate</a></p>
    </div>
    <divt class="footer">
      Ventas en Ayacucho con Huber🏞️
  </div>
  </div>
  <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>

</html>