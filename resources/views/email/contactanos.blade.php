<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contáctanos</title>
    </head>
    <body>

        <table width='700' height='222' border='0' align='center' cellpadding='5' cellspacing='0'>
            <tr>
                <td width='700' align='center' valign='middle'>
                    <img src="https://vesergenperu.com/storage/companies/July2025/mlLsOPArY7Q5POfcmjJU.png" width='420' height='160' />
                </td>
            </tr>
            <tr>
                <td align='center' valign='middle' style='color:#000; font-size:18px; font-weight:bold'>Se realizó un nuevo contacto desde la Web..</td>
            </tr>
            <tr>
                <td align='center' valign='middle'>&nbsp;</td>
            </tr>
        </table>

        <table width='700' border='1' cellpadding='8' cellspacing='0' align='center'>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Nombre</td>
                <td align='center' >{{$contacto['nombre']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Email</td>
                <td align='center' >{{$contacto['email']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Teléfono</td>
                <td align='center'>{{$contacto['telefono']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Proyecto</td>
                <td align='center'>{{$contacto['proyecto']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Asunto</td>
                <td align='center'>{{$contacto['asunto']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Mensaje</td>
                <td align='center'>{{$contacto['mensaje']}}</td>
            </tr>
        </table>

    </body>
</html>