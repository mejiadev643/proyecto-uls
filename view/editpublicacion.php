       <form action="../../controller/updatepublicacion.php" enctype="multipart/form-data" method="post">
         <div class="form-group">
           <label>Titulo:</label>
            <input type="text" class="form-control" name="titulo" value="<?php echo$titulo; ?>">
         </div>
         <div class="form-group">
           <label>Descripción:</label>
            <textarea class="form-control" style="height: 400px;" name="descripcion" ><?php echo $descripcion; ?></textarea>
          </div>
         <div class="form-group">
           <label>Imagen:</label>
           <div style=" margin-top: 15px; margin-left: 30px;">
                    <img src="../../public/img/publicaciones/<?php echo $imagen; ?>" class="img-fluid" style="width: 100px; height: 100px"  alt="FOTO_USER">
                       					
            </div><br>
           <div class="custom-file">
           	<img src="">
              <input type="file" class="custom-file-input" name="imagen2">
              <label class="custom-file-label" >Seleccionar nueva imagen</label>
            </div>
         </div>
         
         <div class="form-group">
         	<label>Tipo de publicación:</label>
         	<select class="custom-select " name="tipopublicacion">
         		<option value="1" selected>Ofertas de empleo</option>
         		<option value="2">Ofertas academicas</option>
			</select>
            
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
         <div class="form-group"><!-- echo de la imagen que se ha guardado-->
  			   <input hidden id="imagen1" name="imagen1"  type="text" value="<?php echo $imagen; ?>" />

  			   <input hidden id="" name="id"  type="text" value="<?php echo $id_publicacion; ?>" />
  	   	 </div>
         
         <button class="btn btn-success" name="actualizar">Actualizar</button>
         <button class="btn btn-secondary" name="cancelar">Cancelar</button>
         <div style="margin-top: 50px;"></div>
       </form>
         
       </div>
         
      
    </div><!--end container-->