
    <div class="container">
      
 
       <form action="../../controller/publicacion.php" enctype="multipart/form-data" method="post">
         <div class="form-group">
           <label>Titulo:</label>
            <input type="text" class="form-control" name="titulo" placeholder="Nuevo titulo">
         </div>
         <div class="form-group">
           <label>Descripción:</label>
            <textarea class="form-control" style="height: 400px;" name="descripcion"></textarea>
          </div>
         <div class="form-group">
           <label>Imagen:</label>
           <div class="custom-file">
              <input type="file" class="custom-file-input" name="imagen">
              <label class="custom-file-label" >Seleccionar imagen</label>
            </div>
         </div>
         <div class="form-group">
           <label>Tipo de publicación:</label>
           <input class='form-control' type='text'  value="<?php if($_GET['nuevo']=='academica'){echo 'Oferta Academica';}else{echo 'Oferta de Empleo';} ?>" readonly>
         </div>
         <div class="form-group">
            <input hidden  name="tipopublicacion"  type="int" value="<?php if($_GET['nuevo']=='academica'){echo '2';}else{echo '1';} ?>" />
         </div>

         <div class="form-group">
           <label>Carrera a la que pertenece la publicación:</label>
           <select class="custom-select " name="carrera">
              
              <option value="1" selected>Lic. en Ciencias de la Computación</option>
              <option value="2">Ing. Agroecologica</option>
              <option value="3">Lic. en Ciencias Juridicas</option>
              <option value="4">Lic. en contaduria publica</option>
              <option value="5">Lic. en Administración de Empresas</option>
              <option value="6">Tecnico en Desarrollo de Aplicaciones Informaticas</option>
              <option value="7">Lic. en Trabajo Social</option>
              <option value="8">Lic. en Teologia</option>
            </select>
         </div>
         
         <button class="btn btn-success" name="publicar">Publicar</button>
         <button class="btn btn-secondary" name="cancelar">Cancelar</button>
         <div style="margin-top: 50px;"></div>
       </form>
         
       </div>
         
      
    </div><!--end container-->
  </body>
</html>