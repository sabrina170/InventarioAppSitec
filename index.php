<?php 
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta="SELECT * from Entregas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Tutorial DataTables</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       
  </head>
    
  <body> 
     <header>
<!--         <h3 class="text-center text-light">Tutorial</h3>-->
         <h4 class="text-center text-light"><i class="fa fa-car"></i> Inventario</h4> 
     </header>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br> 
    
      
    <div class="container2" style="margin:20px;">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Código</th>
                                <th>Nombre</th>  
                                <th>Distrito</th>                               
                                <th>Dirección</th>  
                                <th>Lat.</th>
                                <th>Long.</th>
                                <th>GT</th>                                
                                <th>GR</th> 
                                <th>GC</th>                                
                                <th>Estado</th>
                                <th>Obs.</th>    
                                <th>Accion</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                               
                                <td><?php echo $dat['Id'] ?></td>
                                <td><?php echo $dat['Fecha_Cliente'] ?></td>
                                <td><?php echo $dat['Cod_Cliente'] ?></td>
                                <td><?php echo $dat['Nombre_Cliente'] ?></td>    
                                <td><?php echo $dat['Direccion_Llegada'] ?></td>
                                <td><?php echo $dat['Distrito'] ?></td>
                                <td><?php echo $dat['Latitud'] ?></td>
                                <td><?php echo $dat['Longitud'] ?></td>  
                                <td><?php echo $dat['Gui_Trans'] ?></td>
                                <td><?php echo $dat['Guia_Remi'] ?></td>
                                <td><?php echo $dat['Guia_Cliente'] ?></td>
                                <td><?php echo $dat['Estado'] ?></td> 
                                <td><?php echo $dat['Observaciones'] ?></td>  
                                <td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnBorrar'><i class='fa fa-trash'></i></button></div> </div>  </td>  
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">

                <div class="form-row">
                <div class="col">
                <label for="Fecha_Cliente" class="col-form-label">Fecha:</label>
                <input type="date" class="form-control" id="Fecha_Cliente">
                </div>
                <div class="col">
                <label for="Cod_Cliente" class="col-form-label">Codigo:</label>
                <input type="number" class="form-control" id="Cod_Cliente">
                </div>
                </div>

                <div class="form-row">
                <div class="col">
                <label for="Nombre_Cliente" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="Nombre_Cliente">
                </div>   
                <div class="col">
                <label for="Direccion_Llegada" class="col-form-label">Distrito:</label>
                <input type="text" class="form-control" id="Direccion_Llegada">
                </div>
                </div>

              
                <div class="form-group">
                <label for="Distrito" class="col-form-label">Direccion de Llegada:</label>
                <input type="text" class="form-control" id="Distrito">
                </div>     

                <div class="form-row">       
                <div class="col">
                <label for="Latitud" class="col-form-label" step='0.01' value='0.00' placeholder='0.00'>Latitud:</label>
                <input type="float" class="form-control" id="Latitud">
                </div>  
                <div class="col">
                <label for="Longitud" class="col-form-label" step='0.01' value='0.00' placeholder='0.00'>Longitud:</label>
                <input type="float" class="form-control" id="Longitud">
                </div>
                </div>

                <div class="form-row">  
                <div class="col">
                <label for="Gui_Trans" class="col-form-label">Gria Transportista:</label>
                <input type="number" class="form-control" id="Gui_Trans">
                </div>                
                <div class="col">
                <label for="Guia_Remi" class="col-form-label">Guia Rem:</label>
                <input type="number" class="form-control" id="Guia_Remi">
                </div>  
                <div class="col">
                <label for="Guia_Cliente" class="col-form-label">Guia Cliente:</label>
                <input type="number" class="form-control" id="Guia_Cliente">
                </div>    
                </div>


                <div class="form-group">
                <label for="Estado" class="col-form-label">Estado:</label>
                <input type="text" class="form-control" id="Estado">
                </div>  
                <div class="form-group">
                <label for="Observaciones" class="col-form-label">Observaciones:</label>
                <input type="text" class="form-control" id="Observaciones">
                </div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
