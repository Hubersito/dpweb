<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, #ffecd2, #fcb69f);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
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

    input[type="text"], input[type="password"] {
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
</head>

<body>
  <div class="login-container">
    <div class="emoji">🦙</div>
    <h2>Iniciar sesión turística</h2>
    <form>
      <input type="text" placeholder="Usuario o correo" required>
      <input type="password" placeholder="Contraseña" required>
      <button class="btn" type="submit">Explorar Ayacucho</button>
    </form>
    <div class="extra">
      <p>¿Olvidaste tu contraseña? <a href="#">Recupérala</a></p>
      <p>¿Nuevo viajero? <a href="#">Regístrate</a></p>
    </div>
    <divt class="footer">
      Turismo en Ayacucho con Huber🏞️
    </div>
  </div>
</body>
</html>