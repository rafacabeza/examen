<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de modificacion </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Formulario de modificacion de alumno</h1>
        <form action="?modulo=modificar&id={$estudio->getId()}" method="post">
            <input type="hidden" name="id" value="{$estudio->getId()}"> <br>
            <label>Codigo:</label> 
            <input type="text" name="codigo" value="{$estudio->getCodigo()}"> <br>
            <label>Título:</label> 
            <input type="text" name="titulo" value="{$estudio->getTitulo()}"> <br>
            <label>Fecha de Curriculo:</label> 
            <input type="text" name="fechaCurriculo" value="{$fecha}"> <br>
            <input  type="submit" value="modificar">
        </form>
    </body>
</html>
