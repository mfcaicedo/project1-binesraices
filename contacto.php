<?php 
     require 'includes/funciones.php';
     incluirTemplate('header');
?>

    <main class="contenedor">

        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp"> 
            <source srcset="build/img/detacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="imagen contacto" loading="lazy"> 
        </picture>
        <h2>Llene en formulario de contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información personal</legend>
                <label for="nombre">Nombre: </label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">E_mail: </label>
                <input type="email" placeholder="Tu E_mail" id="email">

                <label for="telefono">Telefono: </label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje: </label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10">Mensaje</textarea>
            </fieldset>

           <fieldset>
               <legend>Información sobre la propiedad</legend>
                <label for="opciones">Vende o compra:</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Selecciona--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto: </label>
                <input type="number" placeholder="Tu presupuesto" id="presupuesto">
           </fieldset>
           
           <fieldset>
               <legend>Información sobre la propiedad</legend>
               <p>Como desea ser contactado</p>

               <div class="forma-contacto">
                   <label for="contactar-telefono">Teléfono</label>
                   <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                   <label for="contactar-email">E_mail</label>
                   <input name="contacto" type="radio" value="telefono" id="contactar-email">
               </div>

               <p>Si elijió teléfono, elija la fehca y la hora</p>

               <label for="fecha">Fecha</label>
               <input type="date" id="fecha">

               <label for="hora">Hora</label>
               <input type="time" id="hora" min="08:00" max="18:00">
           </fieldset>

           <input type="submit" value="Enviar" class="boton-verde">

        </form>

    </main>

 <!-- Llamado al footer -->
 <?php 
        incluirTemplate('footer');
    ?> 
