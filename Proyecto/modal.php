


<!-- Modal para editar registros -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
      </div>
      <div class="modal-body">
        <div class="sign-in-htm">
          <form action="" method="POST"  >
            <div class="form-group row">
              <label for="user"  class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="nombre" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-2 col-form-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="apellido" id="apellido" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-2 col-form-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="telefono" id="telefono" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-2 col-form-label">Cedula</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="cedula" id="cedula" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-2 col-form-label"">Edad</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="edad" id="edad" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-2 col-form-label">Sexo</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="sexo" id="sexo" required>
              </div>
            </div>
            <br>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-2 col-form-label">Ultimo Periodo (Si Aplica)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="periodo" id="periodo" required>
              </div>
            </div>
            <br>
            <div class="form-group row" style="visibility: hidden;">
              <label for="user" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id" id="id" required>
              </div>
            </div>
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="$('#edit').modal('hide');">Cancelar</button>
              <button type="submit" name="actualizar_Paciente" >Guardar Datos</button>
            </div>
          </form>
          <?php
    if (isset($_REQUEST['actualizar_Paciente'])) {
    $nombre = $_REQUEST ["nombre"];
    $apellido = $_REQUEST ["apellido"];
    $telefono = $_REQUEST ["telefono"];
    $cedula = $_REQUEST ["cedula"];
    $edad = $_REQUEST ["edad"];
    $sexo = $_REQUEST ["sexo"];
    $id = $_REQUEST ["id"];
    $periodo = $_REQUEST ["periodo"];

    require_once 'bdconnect.php';
    $db =  new database();
                $query = $db->connect()->prepare("UPDATE pacientes 
                SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', cedula = '$cedula', edad = '$edad', sexo = '$sexo', periodo = '$periodo'
                WHERE id = '$id'");
                $query->execute();
            ?>
                <script> 
            
                        Swal.fire({ 
                            icon: 'success',
                            title: 'Paciente Actualizado',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ACEPTAR',
                            allowOutsideClick: true 
                            }).then((resultado) => {
                                if (resultado.isConfirmed) {
                                    window.location.href= 'pacientes.php';
                                  }
                            })
                    </script> 
                    <?php

            }
            

?>
        </div>
      </div>
    </div>
  </div>
</div>


   <!-- Modal para historial medico -->
   <div class="modal fade" id="histori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="partitura">Historial Clinico </h5>
      </div>
      <div class="modal-body">
        <div class="sign-in-htm">
          <form action="" method="POST">
            <div class="form-group row">
              <label for="user" class="col-sm-5 col-form-label" >Alergias</label>
                <div class="col-sm-12">
                  <textarea name="alergias" class="form-control"  id="alergias" ></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-5 col-form-label">Enfermedad Cronicas</label>
                <div class="col-sm-12">
                  <textarea name="cronicas" id="cronicas"class="form-control"></textarea> 
                </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-6 col-form-label">Antecedentes Quirurgicos</label>
                <div class="col-sm-12">
                  <textarea class="form-control" name="quirurgicos" id="quirurgicos" ></textarea>
                </div>
            </div>
              <br>
            <div class="form-group row">
              <label for="user" class="col-sm-6 col-form-label">Antecedentes Familiares</label>
                <div class="col-sm-12">
                  <textarea class="form-control" name="familiar" id="familiar"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-6 col-form-label">Antecedentes Ginecologicos</label>
                <div class="col-sm-12">
                  <textarea class="form-control" name="ginecologicos" id="ginecologicos" ></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-10 col-form-label">Otros (medicamentos, Traumatismos...)</label>
                <div class="col-sm-12">
                  <textarea class="form-control" name="otros" id="otros" ></textarea>
                </div>
            </div>
            <div class="form-group row" style="visibility: hidden;">
              <label for="user" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="idpa" id="idpa">
                </div>
            </div>     
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="$('#histori').modal('hide');">Cancelar</button>
              <button type="submit" name="actualizar_historial">Guardar Datos</button>
            </div>
          </form>
          <?php
    if (isset($_REQUEST['actualizar_historial'])) {
      $alergias = $_REQUEST ["alergias"];
      $cronicas = $_REQUEST ["cronicas"];
      $quirurgicos = $_REQUEST ["quirurgicos"];
      $familiar = $_REQUEST ["familiar"];
      $ginecologicos = $_REQUEST ["ginecologicos"];
      $otros = $_REQUEST ["otros"];
      $id = $_REQUEST ["idpa"];
      if (is_numeric($id)) {
        require_once 'bdconnect.php';
        $db =  new database();
                $query = $db->connect()->prepare("UPDATE historial_medico 
                SET alergias = '$alergias', enfermedades_cronicas = '$cronicas', antecedentes_quirurgicos = '$quirurgicos', antecedentes_familiares = '$familiar', antecedentes_ginecologicos = '$ginecologicos', otros = '$otros'
                WHERE id_pacientes = '$id'");
                $query->execute();
        
      }else {
        $id= $_SESSION["idpa"];
        require_once 'bdconnect.php';
        $db =  new database();
                $query = $db->connect()->prepare("INSERT INTO historial_medico 
                (alergias, enfermedades_cronicas, antecedentes_quirurgicos, antecedentes_familiares, antecedentes_ginecologicos, otros, id_pacientes)
                VALUES ('$alergias', '$cronicas', '$quirurgicos', '$familiar', '$ginecologicos', '$otros', '$id')");
                $query->execute();
      }
    }
    ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para reporta pagos -->
<div class="modal fade" id="pago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reportar Pago</h5>
      </div>
      <div class="modal-body">
        <div class="sign-in-htm">
          <form action="" method="POST">
            <div class="form-group row">
              <label for="user"  class="col-sm-10 col-form-label">Metodo Pago</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="mpago" id="mpago" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-10 col-form-label">Referencia o Numero de billete</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="referencia" id="referencia" required>
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="user" class="col-sm-10 col-form-label">Monto</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="monto" id="monto" required>
              </div>
            </div>
            <div class="form-group row" style="visibility: hidden;">
              <label for="user" class="col-sm-10 col-form-label">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="idpago" id="idpago">
                  <input type="text" class="form-control" name="idconsulta" id="idconsu">
                </div>
            </div>     
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="$('#pago').modal('hide');">Cancelar</button>
              <button type="submit" name="reportar_pago" >Guardar Datos</button>
            </div>
          </form>
          <?php
    if (isset($_REQUEST['reportar_pago'])) {
      $mpago = $_REQUEST ["mpago"];
      $referencia = $_REQUEST ["referencia"];
      $monto = $_REQUEST ["monto"];
      $idpago = $_REQUEST ["idpago"];
      $idconsulta = $_SESSION['idconsulta3'];
      if (is_numeric($idpago)) {
        require_once 'bdconnect.php';
        $db =  new database();
                $query = $db->connect()->prepare("UPDATE reportar_pagos 
                SET referencia = '$referencia', metodo_pago = '$mpago', monto = '$monto'
                WHERE id = '$idpago'");
                $query->execute();
                $db =  new database();
                $query = $db->connect()->prepare("UPDATE consulta_medica 
                SET estado_pago = 'Pago' WHERE id = '$idconsulta' ");
                $query->execute();
                ?>
                <script> 
            
                        Swal.fire({ 
                            icon: 'success',
                            title: 'Datos Ingresados',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ACEPTAR',
                            allowOutsideClick: true 
                            }).then((resultado) => {
                                if (resultado.isConfirmed) {
                                    window.location.href= 'historial-consulta.php';
                                  }
                            })
                    </script>
                    <?php
        
      }else {
        $idpaciente= $_SESSION['idpac'];
        require_once 'bdconnect.php';
        $db =  new database();
                $query = $db->connect()->prepare("INSERT INTO reportar_pagos  
                (referencia, metodo_pago, monto, id_paciente, id_consulta)
                VALUES ('$referencia', '$mpago', '$monto', '$idpaciente', '$idconsulta')");
                $query->execute();
                $db =  new database();
                $query = $db->connect()->prepare("UPDATE consulta_medica 
                SET estado_pago = 'Pago' WHERE id = '$idconsulta' ");
                $query->execute();
                ?>
                <script> 
            
                        Swal.fire({ 
                            icon: 'success',
                            title: 'Datos Ingresados',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ACEPTAR',
                            allowOutsideClick: true 
                            }).then((resultado) => {
                                if (resultado.isConfirmed) {
                                    window.location.href= 'historial-consulta.php';
                                  }
                            })
                    </script>
                    <?php

      }
    }
    ?>
        </div>
      </div>
    </div>
  </div>
</div>

