<?php
require_once './php/session-data.php';
?>
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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script defer src="https://kit.fontawesome.com/707789a0bc.js" crossorigin="anonymous"></script>
  <script defer src="js/script.js"></script>
</head>

<body>
  <nav>
    <div class="logo">
      <img src="img/logo.png" alt="" />
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
          <a href="principal.php" title="Inicio"><i class="fa-solid fa-house-chimney"></i> Inicio </a> / Inventarios / Movimientos
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
          <input class="search-bar" placeholder="Buscar movimiento..." />
          <button class="icon-search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
        <button class="btn btn-green" data-btn-modal="true" data-modal="#m-registrar-usuario">Agregar movimiento</button>
        <div class="modal-wrapper" id="m-registrar-usuario">
          <div class="modal">
            <div class="modal-header">
              <div>Registrar movimiento</div>
              <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
            </div>
            <div class="modal-content">
              <form action="./php/add-movement.php" method="post">
                <div class="form-section">
                  <label for="">Tipo de movimiento:</label>
                  <select name="type_movement" required>
                    <option value="">Seleccione el tipo de movimiento</option>
                    <option value="Entrada">Entrada</option>
                    <option value="Salida">Salida</option>
                  </select>
                </div>
                <div class="form-section">
                  <label for="">Subtipo de movimiento:</label>
                  <input type="text" name="subtype_movement" required placeholder="Ingrese subtipo de movimiento" />
                </div>
                <div class="form-section">
                  <label for="">Cantidad:</label>
                  <input type="number" min="1" name="amount" required placeholder="Ingrese el número de unidades" />
                </div>
                <div class="form-section">
                  <label for="">Costo Unitario:</label>
                  <input type="number" min="1" name="unit_cost" required placeholder="Ingrese el valor por unidad" />
                </div>
                <div class="form-section">
                  <label for="">Fecha:</label>
                  <input type="date" name="date" required />
                </div>
                <div class="form-section">
                  <label for="">Descripción:</label>
                  <input type="text" name="description" required placeholder="Describa el movimiento" />
                </div>
                <div class="form-section">
                  <label for="">Producto:</label>
                  <?php
                  include_once './php/config.php';
                  $query_product = "SELECT producto_id, modelo FROM tbl_producto";
                  $result_product = mysqli_query($conn, $query_product);

                  if ($result_product) {
                    if (mysqli_num_rows($result_product) > 0) {
                  ?>
                      <select name="product">
                        <option value="">Seleccione el producto</option>
                        <?php
                        foreach ($result_product as $row_product) {
                        ?>
                          <option value="<?php echo $row_product['producto_id'] ?>"><?php echo $row_product['modelo'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    <?php
                    } else {
                    ?>
                      <input type="text" disabled value="No se encontraron productos registrados">
                    <?php
                    }
                  } else {
                    ?>
                    <input type="text" disabled value="Error inesperado al consultar los productos">
                  <?php
                  }
                  ?>
                </div>
                <div class="form-section">
                  <label for="">Tercero:</label>
                  <?php
                  include_once './php/config.php';
                  $tquery = "SELECT tercero_id, nombre_contacto FROM tbl_tercero";
                  $tresult = mysqli_query($conn, $tquery);

                  if ($tresult) {
                    if (mysqli_num_rows($tresult) > 0) {
                  ?>
                      <select name="third">
                        <option value="">Seleccione al tercero</option>
                        <?php
                        foreach ($tresult as $trow) {
                        ?>
                          <option value="<?php echo $trow['tercero_id'] ?>"><?php echo $trow['nombre_contacto'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    <?php
                    } else {
                    ?>
                      <input type="text" disabled value="No hay terceros registrados">
                    <?php
                    }
                  } else {
                    ?>
                    <input type="text" disabled value="Error inesperado al consultar terceros">
                  <?php
                  }
                  ?>
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
            <th colspan="13">Movimientos</th>
          </tr>
          <tr class="titles-table">
            <td class="cell-center">Id</td>
            <td>Tipo</td>
            <td>Subtipo</td>
            <td>Cantidad</td>
            <td>Costo Unitario</td>
            <td>Fecha</td>
            <td>Descripción</td>
            <td>Producto</td>
            <td>Tercero</td>
            <td class="cell-center">Editar</td>
          </tr>
          <tbody id="content-table">
            <?php
            include_once './php/config.php';

            $query = "SELECT tbl_movimiento.movimiento_id, tbl_movimiento.tipo_movimiento, tbl_movimiento.subtipo_movimiento, tbl_movimiento.cantidad, tbl_movimiento.costo_unitario, tbl_movimiento.fecha, tbl_movimiento.descripcion, tbl_producto.producto_id AS producto_id, tbl_producto.modelo AS promodelo, tbl_tercero.tercero_id AS tercero_id, tbl_tercero.nombre_contacto AS ternombre_contacto
          FROM ((tbl_movimiento
          INNER JOIN tbl_producto
          ON tbl_producto.producto_id = tbl_movimiento.tbl_producto_id)
          INNER JOIN tbl_tercero
          ON tbl_tercero.tercero_id = tbl_movimiento.tbl_tercero_id)";

            $result = mysqli_query($conn, $query);

            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
            ?>
                  <tr>
                    <td class="cell-center"><?php echo $row['movimiento_id'] ?></td>
                    <td><?php echo $row['tipo_movimiento'] ?></td>
                    <td><?php echo $row['subtipo_movimiento'] ?></td>
                    <td><?php echo $row['cantidad'] ?></td>
                    <td><?php echo $row['costo_unitario'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['descripcion'] ?></td>
                    <td><?php echo $row['promodelo'] ?></td>
                    <td><?php echo $row['ternombre_contacto'] ?></td>
                    <td class="cell-center">
                      <div title="Editar" title="Editar" data-btn-modal="true" data-modal="#m-editar-movimiento_<?php echo $row['movimiento_id'] ?>"><img src="img/editar.png" alt="Editar" /></div>
                    </td>
                    <td class="cell-center">
                    </td>
                  </tr>

                  <div class="modal-wrapper" id="m-editar-movimiento_<?php echo $row['movimiento_id'] ?>">
                    <div class="modal">
                      <div class="modal-header">
                        <div>Editar información del movimiento</div>
                        <i class="fa-solid fa-xmark" data-btn-close="modal"></i>
                      </div>
                      <div class="modal-content">
                        <form action="./php/update-movement.php?movement_id=<?php echo $row['movimiento_id'] ?>" method="post">
                          <div class="form-section">
                            <label for="">Tipo de movimiento:</label>
                            <select name="type_movement" required>
                              <option value="">Seleccione el tipo de movimiento</option>
                              <?php
                              if ($row['tipo_movimiento'] == "Entrada") {
                              ?>
                                <option selected value="Entrada">Entrada</option>
                                <option value="Salida">Salida</option>
                              <?php
                              } else {
                              ?>
                                <option value="Entrada">Entrada</option>
                                <option selected value="Salida">Salida</option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-section">
                            <label for="">Subtipo de movimiento:</label>
                            <input type="text" name="subtype_movement" required value="<?php echo $row['subtipo_movimiento'] ?>" placeholder="Ingrese subtipo de movimiento" />
                          </div>
                          <div class="form-section">
                            <label for="">Cantidad:</label>
                            <input type="number" min="1" name="amount" required value="<?php echo $row['cantidad'] ?>" placeholder="Ingrese el número de unidades" />
                          </div>
                          <div class="form-section">
                            <label for="">Costo Unitario:</label>
                            <input type="number" min="1" name="unit_cost" required value="<?php echo $row['costo_unitario'] ?>" placeholder="Ingrese el valor por unidad" />
                          </div>
                          <div class="form-section">
                            <label for="">Fecha:</label>
                            <input type="date" name="date" required value="<?php echo $row['fecha'] ?>" />
                          </div>
                          <div class="form-section">
                            <label for="">Descripción:</label>
                            <input type="text" name="description" required value="<?php echo $row['descripcion'] ?>" placeholder="Describa el movimiento" />
                          </div>
                          <div class="form-section">
                            <label for="">Producto:</label>
                            <?php
                            $query_pro = "SELECT producto_id, modelo FROM tbl_producto";
                            $result_pro = mysqli_query($conn, $query_pro);

                            if ($result_pro) {
                              if (mysqli_num_rows($result_pro) > 0) {
                            ?>
                                <select required name="product">
                                  <option value="">Seleccione el producto</option>
                                  <?php
                                  foreach ($result_pro as $row_pro) {
                                    if ($row_pro['producto_id'] == $row['producto_id']) {
                                  ?>
                                      <option selected value="<?php echo $row_pro['producto_id'] ?>"><?php echo $row_pro['modelo'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                      <option value="<?php echo $row_pro['producto_id'] ?>"><?php echo $row_pro['modelo'] ?></option>
                                  <?php
                                    }
                                  }
                                  ?>
                                </select>
                              <?php
                              } else {
                              ?>
                                <input type="text" disabled value="No se encontraron productos registrados">
                              <?php
                              }
                            } else {
                              ?>
                              <input type="text" disabled value="Error inesperado al consultar productos">
                            <?php
                            }
                            ?>
                          </div>
                          <div class="form-section">
                            <label for="">Tercero:</label>
                            <?php
                            $query_ter = "SELECT tercero_id, nombre_contacto FROM tbl_tercero";
                            $result_ter = mysqli_query($conn, $query_ter);

                            if ($result_ter) {
                              if (mysqli_num_rows($result_ter) > 0) {
                            ?>
                                <select required name="third">
                                  <option value="">Seleccione al tercero</option>
                                  <?php
                                  foreach ($result_ter as $row_ter) {
                                    if ($row_ter['tercero_id'] == $row['tercero_id']) {
                                  ?>
                                      <option selected value="<?php echo $row_ter['tercero_id'] ?>"><?php echo $row_ter['nombre_contacto'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                      <option value="<?php echo $row_ter['tercero_id'] ?>"><?php echo $row_ter['nombre_contacto'] ?></option>
                                  <?php
                                    }
                                  }
                                  ?>
                                </select>
                              <?php
                              } else {
                              ?>
                                <input type="text" disabled value="No se encontraron terceros registrados">
                              <?php
                              }
                            } else {
                              ?>
                              <input type="text" disabled value="Error inesperado al consultar terceros">
                            <?php
                            }
                            ?>
                          </div>
                          <input class="btn btn-green submit" type="submit" name="update" value="Actualizar" />
                        </form>
                      </div>
                    </div>
                  </div>
            <?php
                }
              } else {
                echo '<script type="text/javascript">
              alert("No se encontraron movimientos registrados");
              </script>';
              }
            } else {
              echo '<script type="text/javascript">
            alert("Error inesperado al consultar movimientos");
            </script>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <footer>Copyright 2022</footer>
  </div>

</body>

</html>