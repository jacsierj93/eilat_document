<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/dropzone/dist/dropzone.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/hamburgers.css">
    <title>Eilat - Documentos</title>
</head>
<body>
<div id="main" class="container">
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button data-bind="click: toogleShow" class="hamburger hamburger--arrow" type="button">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
                </button>

            </div>
            <div class="logo">
                <img class="img-fluid" src="https://i.imgur.com/LX4Rds0.png" alt="">
            </div>
            <div class="trash">
                <span>PAPELERA</span>
                <img class="img-fluid" src="https://i.imgur.com/eU6oyB5.png" alt="">
            </div>
        </div>
    </nav>
    <section class="document-container">
        <div id="upload-container" class="mid-block">
            <form id="document-drop-zone" action="/save" class="dropzone">
                <input type="hidden" name="op" value="load_file"/>
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>
        <div id="list-upload" class="mid-block">
            <div class="caption"><h2>ARCHIVOS SUBIDOS</h2></div>
            <table class="table">
                <tbody  data-bind="foreach: people">
                <tr>
                    <td data-bind="text: name_doc"></td>
                    <td data-bind="text: date"></td>
                    <td data-bind="text: name_usr"></td>
                    <td width="30px"><a data-bind="attr: {href:link_view}"><span class="eye-icon">&nbsp;</span></a></td>
                    <td width="120px"> <button class="dl-btn" type="button">DESCARGAR</button> </td>
                </tr>
                </tbody>
            </table>
        </div>

    </section>
</div>

<div data-bind="css: { show: sideOpen }" class="side-pane">
    <div class="side-head">
        <button data-bind="click: toogleShow" >
            <img src="https://i.imgur.com/ZMhkXQJ.png" alt="" >
        </button>
    </div>
    <div class="side-fragment">
        <img src="https://i.imgur.com/T4fk9SD.png" alt="">
        <br>
        <div class="profile">
            Administrador
        </div>
    </div>

    <div class="side-fragment">
        <ul class="routes">
            <li class="active">
                SUBIDA DE ARCHIVOS
            </li>
            <li>
                PAPELERA
            </li>
        </ul>
    </div>

    <div class="side-fragment">
        <div class="close-section">CERRAR SESION</div>
    </div>
</div>

<div  data-bind="css: { open: sideOpen },click: toogleShow"class="cover">

</div>

<script src="assets/dropzone/dist/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
<script>
    Dropzone.options.documentDropZone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 200, // MB
        dictDefaultMessage:'SUBIR ARCHIVOS',
    };
    ko.applyBindings({
        people: ko.observable([
            { name_doc: 'Archivo I', date: '01/02/20', name_usr: 'Developer', link_view: '', link_down: '' },
            { name_doc: 'Archivo II', date: '01/02/20', name_usr: 'Developer', link_view: '', link_down: '' },
            { name_doc: 'Archivo III', date: '01/02/20', name_usr: 'Developer', link_view: '', link_down: '' },
        ]),
        sideOpen : ko.observable(false),
        toogleShow : function() {
            var newVal = !this.sideOpen()
            this.sideOpen(newVal);
        },
        loadData : function() {
            fetch('')
        }
    });
</script>
</body>
</html>
