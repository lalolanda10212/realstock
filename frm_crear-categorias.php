<?php require_once './php/session-data.php' ?>
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
          <a href="principal.php"><i class="fa-solid fa-house-chimney"></i> Inicio /</a> Inventarios / Categorías
        </div>
      </div>
      <div class="section-header">
        <div class="user-tag">
          <a href="frm_editar-perfil.php"><i class="fa-solid fa-circle-user"></i><?php echo $_SESSION['username'] ?></a>
        </div>
        <div class="btn-logout">
          <a href="./php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </header>
    <div class="content">
      <div class="items-container">
        <div class="search-group">
          <form action="#" method="post">
            <input class="search-bar" name="data" type="text" placeholder="Buscar usuario..." />
            <button class="icon-search" type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>
        <button class="btn btn-green" data-btn-modal="true" data-modal="#m-crear-categoria">Registar Categoría</button>
        <div class="modal-wrapper" id="m-crear-categoria">
          <div class="modal">
            <div class="modal-header">
              <div>Registar Categoría</div>
              <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
            </div>
            <div class="modal-content">
              <form action="./php/add-category.php" method="post" autocomplete="off">
                <div class="form-section">
                  <label for="">Nombre de categoría:</label>
                  <input type="text" name="category" required placeholder="Ingrese el nombre de categoría..." />
                </div>
                <div class="form-section">
                  <label for="">Descripción:</label>
                  <br>
                  <textarea name="description" required rows="8" cols="49"></textarea>
                </div>
                <input class="btn btn-green" type="submit" name="save" value="Guardar" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="wrapper-table">
        <table>
          <tr>
            <th colspan="8">Categorías</th>
          </tr>
          <tr class="titles-table">
            <td class="cell-center">Id</td>
            <td>Nombre </td>
            <td>Descripción</td>
            <td class="cell-center">Eliminar</td>
            <td class="cell-center">Editar</td>
          </tr>
          <?php
          include_once './php/config.php';
          $query = "SELECT * FROM tbl_categoria";
          $result = mysqli_query($conn, $query);

          if ($result) {
            if (mysqli_num_rows($result) > 0) {
              foreach ($result as $row) {
          ?>
                <tr>
                  <td class="cell-center"><?php echo $row['categoria_id'] ?></td>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['descripcion'] ?></td>
                  <td class="cell-center">
                    <div data-btn-modal="true" data-modal="#m-eliminar-rol_<?php echo $row['categoria_id'] ?>"><img src="img/delete.png" alt="" /></div>
                  </td>
                  <td class="cell-center">
                    <div title="Editar" data-btn-modal="true" data-modal="#m-editar-rol_<?php echo $row['categoria_id'] ?>"><img src="img/editar.png" alt="Editar" /></div>
                  </td>
                </tr>

                <div class="modal-wrapper" id="m-eliminar-rol_<?php echo $row['categoria_id'] ?>">
                  <div class="modal">
                    <div class="modal-header">
                      <div>Eliminar categoría</div>
                      <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
                    </div>
                    <div class="modal-content">
                      <h2>¿Está seguro de eliminar “<?php echo $row['nombre'] ?>"</h2>
                      <div class="options-delete">
                        <a href="./php/delete-category.php?category_id=<?php echo $row['categoria_id'] ?>" class="btn btn-red">Eliminar</a>
                        <button class="btn btn-gray" data-btn-cancel="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-wrapper" id="m-editar-rol_<?php echo $row['categoria_id'] ?>">
                  <div class="modal">
                    <div class="modal-header">
                      <div>Editar categoría</div>
                      <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
                    </div>
                    <div class="modal-content">
                      <form action="./php/update-category.php?category_id=<?php echo $row['categoria_id'] ?>" method="post" autocomplete="off">
                        <div class="form-section">
                          <label for="">Nombre categoría:</label>
                          <input type="text" name="category" required value="<?php echo $row['nombre'] ?>" placeholder="Ingrese el nombre de la categoría..." />
                        </div>
                        <div class="form-section">
                          <label for="">Descripción:</label>
                          <br>
                          <textarea name="description" required rows="8" cols="49"><?php echo $row['descripcion'] ?></textarea>
                        </div>
                        </label>
                        <input class="btn btn-green submit" type="submit" name="update" value="Actualizar" />
                      </form>
                    </div>
                  </div>
                </div>
          <?php
              }
            } else {
              echo '<script type="text/javascript">
              alert("No se encontraron categorías registradas");
              </script>';
            }
          } else {
            echo '<script type="text/javascript">
            alert("Error al consultar las subcategorías");
            </script>';
          }
          ?>
        </table>
      </div>
    </div>
    <footer>Copyright 2022</footer>
  </div>

</body>

</html