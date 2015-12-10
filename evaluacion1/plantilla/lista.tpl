<!DOCTYPE html>
<html>
    <head>
        <title>Lista de estudios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>{$titulo}</h1>
        <table style = "border: 1px solid black; width: 700px; text-align:center;">
            <tr >
                <th>Id</th>
                <th>Codigo</th>
                <th>Título</th>
                <th>Fecha Currículo</th>
                <th>Operaciones</th>
            </tr>
            {foreach $estudios as $fila}
            <tr >
                    <td>{$fila.id}</td>
                    <td>{$fila.codigo}</td>
                    <td>{$fila.titulo}</td>
                    <td>{$fila.fecha}</td>
                    <td><a href="?modulo=modificarestudio&id={$fila.id}">modificar</a></td>
            </tr>
            {/foreach}
        </table>
    </body>
</html>
