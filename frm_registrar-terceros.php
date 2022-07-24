<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Real Stock</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/estilos.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet" />
  <script defer src="js/script.js"></script>
  <script defer src="https://kit.fontawesome.com/707789a0bc.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav>
    <div class="logo">
      <a href="principal.php"><img src="img/logo.png" alt="" /></a>
    </div>
    <div class="links">
      <ul>
        <li class="link">
          <a href="principal.php">
            <i class="fa-solid fa-house-chimney"></i> Inicio
          </a>
        </li>
        <li class="link">
          <a href="frm_registrar-usuarios.php">
            <i class="fa-solid fa-user-group"></i> Usuarios
          </a>
        </li>
        <li class="link">
          <a href="inventarios.php">
            <i class="fa-solid fa-cart-flatbed"></i> Inventarios
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="wrapper">
    <header>
      <div class="section-header">
        <div class="hamburger-menu">
          <span></span><span></span><span></span>
        </div>
        <div class="location-source">
          <a href="principal.php"><i class="fa-solid fa-house-chimney"></i> Inicio /</a> Inventarios /
          Terceros
        </div>
      </div>
      <div class="section-header">
        <div class="user-tag">
          <a href="frm_editar-perfil.php"><i class="fa-solid fa-circle-user"></i>Usuario</a>
        </div>
        <div class="btn-logout">
          <a href="./php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </header>
    <div class="content">
      <div class="items-container">
        <div class="search-bar">
          <div class="icon-search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <input type="text" placeholder="Buscar categoria..." />
        </div>
        <button class="btn btn-green" data-btn-modal="true" data-modal="#m-crear-categoria">Registar
          Tercero</button>
        <div class="modal-wrapper" id="m-crear-categoria">
          <div class="modal">
            <div class="modal-header">
              <div>Registar Tercero</div>
              <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
            </div>
            <div class="modal-content">
              <form action="#">
                <div class="form-section">
                  <label for="">Tipo de documento:</label>
                  <select name="tipo_documento">
                    <option value="">Seleccione tipo de documento</option>
                    <option value="Cedula">Cedula</option>
                    <option value="Cedula de extrangeria">Cedula de extrangeria</option>
                  </select>
                </div>
                <div class="form-section">
                  <label for="">No. de documento:</label>
                  <input type="text" placeholder="Ingrese el No. de documento">
                </div>
                <div class="form-section">
                  <label for="">Razón social:</label>
                  <input type="text" placeholder="Ingrese razón social">
                </div>
                <div class="form-section">
                  <label for="">País:</label>
                  <input type="text" placeholder="Ingrese país">
                </div>
                <div class="form-section">
                  <label for="">Departamento:</label>
                  <input type="text" placeholder="Ingrese departamento">
                </div>
                <div class="form-section">
                  <label for="">Ciudad:</label>
                  <input type="text" placeholder="Ingrese ciudad">
                </div>
                <div class="form-section">
                  <label for="">Dirección:</label>
                  <input type="text" placeholder="Ingrese dirección">
                </div>
                <div class="form-section">
                  <label for="">Teléfono:</label>
                  <input type="text" placeholder="Ingrese teléfono">
                </div>
                <div class="form-section">
                  <label for="">Email:</label>
                  <input type="text" placeholder="Ingrese email">
                </div>
                <div class="form-section">
                  <label for="">Pagina web:</label>
                  <input type="text" placeholder="Ingrese pagina web">
                </div>
                <div class="form-section">
                  <label for="">Nombre de contacto:</label>
                  <input type="text" placeholder="Ingrese nombre de contacto">
                </div>
                <div class="form-section">
                  <label for="">Contacto:</label>
                  <input type="text" placeholder="Ingrese contacto">
                </div>
                <div class="form-section">
                  <label for="">Estado:</label>
                  <input type="text" placeholder="Ingrese estado">
                </div>
                <input class="btn btn-green" type="submit" value="Guardar" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="wrapper-table">
        <table>
          <tr>
            <th colspan="17">Terceros</th>
          </tr>
          <tr class="titles-table">
            <td class="cell-center">Id</td>
            <td>Tipo de documento</td>
            <td>No. Documento</td>
            <td>Razón social</td>
            <td>País</td>
            <td>Departamento</td>
            <td>Ciudad</td>
            <td>Dirección</td>
            <td>Teléfono</td>
            <td>Email</td>
            <td>Pagina web</td>
            <td>Contacto</td>
            <td>Nombre de contacto</td>
            <td>Estado</td>
            <td class="cell-center">Eliminar</td>
            <td class="cell-center">Editar</td>
          </tr>
          <tr>
            <td class="cell-center">1</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td>Lorem, ipsum.</td>
            <td class="cell-center">
              <div data-btn-modal="true" data-modal="#m-eliminar-rol"><img src="img/delete.png" alt="" />
              </div>
            </td>
            <td class="cell-center">
              <div title="Editar" data-btn-modal="true" data-modal="#m-editar-rol"><img src="img/editar.png"
                  alt="Editar" /></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <footer>Copyright 2022</footer>
  </div>

  <div class="modal-wrapper" id="m-eliminar-rol">
    <div class="modal">
      <div class="modal-header">
        <div>Eliminar información del tercero</div>
        <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
      </div>
      <div class="modal-content">
        <h2>¿Está seguro de eliminar a “tercero”?</h2>
        <div class="options-delete">
          <button class="btn btn-red">Eliminar</button>
          <button class="btn btn-gray" data-btn-cancel="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-wrapper" id="m-editar-rol">
    <div class="modal">
      <div class="modal-header">
        <div>Editar información del tercero</div>
        <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
      </div>
      <div class="modal-content">
        <form action="#">
          <div class="form-section">
            <label for="">Tipo de documento:</label>
            <select name="tipo_documento">
              <option value="">Seleccione tipo de documento</option>
              <option value="Cedula">Cedula</option>
              <option value="Cedula de extrangeria">Cedula de extrangeria</option>
            </select>
          </div>
          <div class="form-section">
            <label for="">No. de documento:</label>
            <input type="text" placeholder="Ingrese el No. de documento">
          </div>
          <div class="form-section">
            <label for="">Razón social:</label>
            <input type="text" placeholder="Ingrese razón social">
          </div>
          <div class="form-section">
            <label for="">País:</label>
            <input type="text" placeholder="Ingrese país">
          </div>
          <div class="form-section">
            <label for="">Departamento:</label>
            <input type="text" placeholder="Ingrese departamento">
          </div>
          <div class="form-section">
            <label for="">Ciudad:</label>
            <input type="text" placeholder="Ingrese ciudad">
          </div>
          <div class="form-section">
            <label for="">Dirección:</label>
            <input type="text" placeholder="Ingrese dirección">
          </div>
          <div class="form-section">
            <label for="">Teléfono:</label>
            <input type="text" placeholder="Ingrese teléfono">
          </div>
          <div class="form-section">
            <label for="">Email:</label>
            <input type="text" placeholder="Ingrese email">
          </div>
          <div class="form-section">
            <label for="">Pagina web:</label>
            <input type="text" placeholder="Ingrese pagina web">
          </div>
          <div class="form-section">
            <label for="">Nombre de contacto:</label>
            <input type="text" placeholder="Ingrese nombre de contacto">
          </div>
          <div class="form-section">
            <label for="">Contacto:</label>
            <input type="text" placeholder="Ingrese contacto">
          </div>
          <div class="form-section">
            <label for="">Estado:</label>
            <input type="text" placeholder="Ingrese estado">
          </div>
          <input class="btn btn-green" type="submit" value="Actualizar" />
        </form>
      </div>
    </div>
  </div>
</body>

</html