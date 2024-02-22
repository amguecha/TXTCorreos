<!DOCTYPE html>
<html lang="es" data-theme="{{ $userSetting->theme_variant === 'dark-theme' ? 'dark' : 'light' }}">
  <head>
    <title>TXTCorreos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="app-config.css" rel="stylesheet" crossorigin="anonymous">
    <link href="windows-ui.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="winui-icons.min.css" rel="stylesheet" crossorigin="anonymous">
    <script type="text/javascript">
      function executeExplorer() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/open-explorer", true);
        xhr.send();
      }
    </script>
    <script type="text/javascript">
      function copyTemplate() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/copy-template", true);
        xhr.send();
      }
    </script>
    <script type="text/javascript">
      function copyDocumentation() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/copy-documentation", true);
        xhr.send();
      }
    </script>
    <script type="text/javascript">
      function executeGenerate() {
        var formData = new FormData(document.getElementById('generateTxt'));
        fetch("{{ route('generate.txt') }}", {
          method: "POST",
          body: formData
        }).then(response => {
          if (!response.ok) { 
            throw new Error('Network response was not ok');
          }
            return response.text();
        }).then(data => {
          console.log(data);
        }).catch(error => {
          console.error('There was a problem with your fetch operation:', error);
        });
      }
    </script>
    <style>
      .app-navbar-wrap .app-navbar-toggler:hover { background-color:transparent; }
      .app-navbar-wrap .app-navbar-toggler:hover { background-color:transparent; }
      .Envio-class, .Id-class { max-width: 2em; }
      .CodPostal-class { max-width: 4em; }
      .Pais-class { max-width: 2em; }
      .TlfRemitente-class { max-width: 6em; }
      .EmailRemitente-class, .Provincia-class { max-width: 12em; }
      .DireccionComp-class { max-width: 8em; }
      .icons10-heart::before {font-weight: 700;}
    td input 
    { 
      background-color: transparent;     
      border: none;
      text-overflow: ellipsis;
      width: 100%;
      font-weight: 300;
      font-size: 0.85em;
    }
    td input:focus-visible {
      background-color: transparent;
      border: none;
      outline: none;
      border-radius: 3px;
    }
    </style>
  </head>
  <body style="font-family: 'Segoe UI', sans-serif;" oncontextmenu="return false" class="{{ $userSetting->theme_variant }}">
    <div class="app-navbar-wrap" id="NavBarMain" style="">
      <div class="app-navbar-topbar-mobile">
        <span class="app-navbar-toggler" data-win-toggle="navbar-left" data-win-target="#NavBarMain"></span>
        <div><span class="app-navbar-name">Menú</span></div>
      </div>
      <nav class="app-navbar" style="">
        <div class="app-navbar-header" style="height:52px; margin: 0px !important;">
          <span class="app-navbar-toggler" style="padding-left: 25px; padding-right: 14px; margin:0 !important;" data-win-toggle="navbar-left" data-win-target="#NavBarMain" aria-controls="NavBarMain" aria-label="Toggle navigation"></span>
          <span class="app-navbar-name" style="padding:0;">Menú</span>
        </div>
        <ul class="app-navbar-list" id="app-navbar-list" style="min-height:275px;list-style: none;margin: 50px 0 0 0;margin-bottom: 0px;padding: 0 0 40px 0;display: flex;flex-direction: column;flex-grow: revert-layer;height: calc(100% - 60px);margin-bottom: 0px; padding-bottom: 0;">
          <li class="app-navbar-list-item">
            <a href="/" class="unactive">
              <i class="icons10-home"></i>
              <span>Inicio</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a href="/upload" class="unactive">
              <i class="icons10-refresh"></i>
              <span>Cargar Excel</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a onclick="event.preventDefault();" href="/upload" class="active">
              <i class="icons10-todo-list"></i>
              <span>Vista De Datos</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a id="clickSubmit" href="javascript:void(0)" class="unactive">
              <i class="icons10-create-new"></i>
              <span>Generar Archivo TXT</span>
            </a>
          </li>
          <li style="margin-top: auto;" class="app-navbar-list-item">
            <a href="javascript:void(0)" onclick="executeExplorer();" class="unactive">
              <i class="icons10-box"></i>
              <span>Archivos Generados</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a href="javascript:void(0)" class="unactive" data-win-toggle="modal" data-win-target="#settings">
              <i class="icons10-settings"></i>
              <span>Configuración</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="app-page-container has-padding">
      <div style="display: flex;flex-direction: row;align-items: center;overflow: hidden;margin: 1em 0em;margin: 1.5em 0em 1.7em 0em;">
        <div style="flex: 0; padding: 0.3em; background-color: #6acb5d; border-radius: 5px;">
          <h1 style="margin: 0 10px; font-weight: bold;">S0003</h1>
        </div>
        <div style="flex: 1; overflow-x: hidden; padding: 0.3em 0em 0.3em 0.9em;">
          <h1 style="margin: 0; white-space: nowrap; overflow-x: hidden;text-overflow: ellipsis;">Vista de datos para generar archivo</h1>
        </div>
      </div>
      @if (!empty($parsedData))
      <form id="generateTxt" action="{{ route('generate.txt') }}" method="POST">
        @csrf
        <div class="app-table-view-container" style="margin-bottom: 1.5rem; min-width: 100%;">
          <table class="app-table-view" style="width:100%;">
            <thead>
              <tr>
                @foreach ($parsedData[0] as $key => $value)
                <th style="text-align: left; text-transform: uppercase; font-weight: 700;" >
                  @if ($key === 'Id')
                  <span class="{{ $key }}-class">Envio</span>
                  @else
                  <span class="{{ $key }}-class">{{ $key }}</span>
                  @endif
                </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @php $increment = 1; @endphp
              @foreach ($parsedData as $row)
              <tr>
                @foreach ($row as $key => $value)
                <td class="{{ $key }}-td-class">
                  @if ($key === 'Id')
                  <input style="text-transform: uppercase;" type="text" class="Envio-class" name="idx" value="{{ $increment }}">
                  <input style="display:none" type="text" class="{{ $key }}-class" name="{{ $key }}[]" value="{{ $value }}">
                  @else
                  <input style="text-transform: uppercase;" type="text" class="{{ $key }}-class" name="{{ $key }}[]" value="{{ $value }}" title="{{ $value }}">
                  @endif
                </td>
                @endforeach
                @php $increment++; @endphp
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <input id="submitTable" type="submit" style="display:none;" value="Generate TXT">
      </form>
      @else
      <p>No data available.</p>
      @endif
    </div>
    <div class="app-alert" id="settings" data-win-toggle="modal" data-win-target="#settings" tabindex="-1">
      <div class="app-alert-modal" aria-modal="true" role="dialog" style="box-shadow: none;">
        <form method="POST" action="{{ route('user.settings.store') }}">
          <div class="app-alert-header" style="padding-bottom: 10px;">
            <h1 style="margin:0.5rem 0 0.75rem 0;">Configuración General</h1>
            @csrf
            <label for="email" style="margin-bottom: 0.5rem; display: inline-block; margin-left: 0.5rem;">Email del remitente:</label>
            <div style="width:100%;" class="app-input-container">
              <input autocomplete="off" class="app-input-text" type="text" id="email" name="email" value="{{ $userSetting->email ?? '' }}" required>
            </div><br><br>
            <label for="phone" style="margin-bottom: 0.5rem; display: inline-block; margin-left: 0.5rem;">Teléfono del remitente:</label>
            <div style="width:100%;" class="app-input-container">
              <input autocomplete="off" class="app-input-text" type="text" id="phone" name="phone" value="{{ $userSetting->phone ?? '' }}" required>
            </div><br><br>
            <label for="theme_variant" style="margin-bottom: 0.5rem; display: inline-block; margin-left: 0.5rem;">Color de la aplciación:</label>
            <div style="width:100%;" class="app-select-menu">
              <select id="theme_variant" name="theme_variant" required>
                <option value="dark-theme" {{ $userSetting->theme_variant === 'dark-theme' ? 'selected' : '' }}>Dark Theme</option>
                <option value="light-theme" {{ $userSetting->theme_variant === 'light-theme' ? 'selected' : '' }}>Light Theme</option>
              </select>
            </div>
            <br>
            <p style="font-size: 0.8rem;font-style: italic; padding-top: 0.25rem;">*Al guardar la configuración, la aplicación volverá al inicio.</p>
            <p style="font-size: 0.8rem;font-style: italic; opacity: 0.5;">[https://github.com/amguecha/TXTCorreos]</p>
          </div>
          <div class="app-alert-footer" style="display: flex;align-content: center;justify-content: end;">
            <button class="app-btn app-btn-primary" type="submit">
            <span>Guardar</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="app-alert" id="txtMessage" data-win-toggle="modal" data-win-target="#txtMessage" tabindex="-1">
      <div class="app-alert-modal" aria-modal="true" role="dialog" style="box-shadow: none;">
        <div class="app-alert-header">
          <h1>Mensaje</h1>
          <div class="app-alert-message">
            <p style="line-height:1.5rem;">El fichero se generó con éxito <i class="icons10-heart"></i>, lo puedes encontrar en <b>"Archivos Generados"</b>.</p>
          </div>
        </div>
        <div class="app-alert-footer">
          <button class="app-btn app-btn-primary" onclick="closeModal('txtMessage')" data-win-toggle="modal" data-win-target="#txtMessage">
            <span>Vale</span>
          </button>
        </div>
      </div>
    </div>
    <div style="height: auto; width:55vw; position: fixed;z-index: -111;right: -10vw;bottom: -10vh;opacity: 0.1;filter: grayscale(1);">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0" y="0" viewBox="0 0 272.8 258" xml:space="preserve">
      <style type="text/css">
      .st0{fill:#00457d}
      </style>
      <switch>
      <g>
      <polygon class="st0" points="187.6,108.8 136.4,108.8 85.3,108.8 85.3,100.3 85.3,91.7 136.4,91.7 187.6,91.7 187.6,100.3"/>
        <path class="st0" d="M179 27.8c-6.2 0-12 1.8-17.1 4.7-5-2.9-10.8-4.7-17-4.7-3 0-5.9.4-8.7 1.2-2.7-.7-5.4-1.2-8.3-1.2-6.2 0-11.9 1.8-17 4.7-5-2.9-10.9-4.7-17.1-4.7-18.8 0-34.1 15.3-34.1 34.1V79h17.1V61.9c0-9.4 7.6-17.1 17.1-17.1 1.5 0 3 .3 4.4.6-2.7 4.9-4.4 10.4-4.4 16.4v17.1H111v-17c0-9.4 7.6-17.1 17.1-17.1v34.1h17.1V44.8c9.4 0 17.1 7.6 17.1 17.1V79H179V61.9c0-6-1.7-11.5-4.4-16.4 1.4-.4 2.9-.6 4.4-.6 9.4 0 17.1 7.6 17.1 17.1v17.1h17.1V61.9c-.1-18.9-15.3-34.1-34.2-34.1z"/>
        <polygon class="st0" points="140.1,8 140.1,0 132.7,0 132.7,8 124.7,8 124.7,15.5 132.7,15.5 132.7,23.5 140.1,23.5 140.1,15.5 148.2,15.5 148.2,8"/>
          <path class="st0" d="M221.7 121.5c0 20.2-7 38.7-18.7 53.3-6.8-30.5-34-53.3-66.5-53.3-20.4 0-38.7 9-51.2 23.2v-23.2H0C0 196.9 61.1 258 136.4 258c75.3 0 136.4-61.1 136.4-136.4h-51.1zM18.4 138.6h49.8v51.2c0 13.3 3.9 25.7 10.5 36.3-32-17.8-54.9-49.8-60.3-87.5zm118 102.3c-28.2 0-51.2-22.9-51.2-51.2s22.9-51.1 51.2-51.1 51.1 22.9 51.1 51c-5.8 4.4-12.1 8-18.9 10.8 1.1-3.4 1.9-6.9 1.9-10.7 0-19.3-15.3-34.1-34.1-34.1s-34.1 15.2-34.1 34.1 15.2 34.1 34.1 34.1c50.7 0 92.8-36.9 100.9-85.2h17.3c-8.2 57.8-58.1 102.3-118.2 102.3zm17.1-51.2c0 9.4-7.6 17-17 17s-17-7.6-17-17 7.6-17 17-17 17 7.6 17 17z"/>
        </g>
        </switch>
      </svg>
    </div>
  </body>
  <script src="windows-ui.min.js" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var clickSubmit = document.getElementById('clickSubmit');
      clickSubmit.addEventListener('click', function() {
        executeGenerate(); 
        showModal('txtMessage'); 
      });
    });
  </script>
  <script>
    function updateDirColor() {
      var bgcolor = '#ff000070';
      var cells = document.querySelectorAll('td');
      cells.forEach(function (cell) {
        if (cell.querySelector('input[name="Direccion[]"]')) {
          var input = cell.querySelector('input[name="Direccion[]"]');
          var content = input.value;
          if (content.length > 46) {
            if (cell.children.length > 0) {
              cell.children[0].style.backgroundColor = bgcolor;
              cell.children[0].style.borderRadius = '3px';
            }
          } else {
            if (cell.children.length > 0) {
              cell.children[0].style.backgroundColor = '';
              cell.children[0].style.borderRadius = '';
            }
          }
        }
        if (cell.querySelector('input[name="DireccionComp[]"]')) {
          var input = cell.querySelector('input[name="DireccionComp[]"]');
          var content = input.value;
          if (content.length > 46) {
            if (cell.children.length > 0) {
              cell.children[0].style.backgroundColor = bgcolor;
              cell.children[0].style.borderRadius = '3px';
            }
          } else {
            if (cell.children.length > 0) {
              cell.children[0].style.backgroundColor = '';
              cell.children[0].style.borderRadius = '';
            }
          }
        }
        if (cell.querySelector('input[name="Nombre[]"]')) {
          var input = cell.querySelector('input[name="Nombre[]"]');
          var content = input.value;
          if (content.length > 46) {
            if (cell.children.length > 0) {
              cell.children[0].style.backgroundColor = bgcolor;
              cell.children[0].style.borderRadius = '3px';
            }
          } else {
            if (cell.children.length > 0) {
              cell.children[0].style.backgroundColor = '';
              cell.children[0].style.borderRadius = '';
            }
          }
        }
      });
    }
    function debounce(func, delay) {
      let timeoutId;
      return function () {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(func, delay);
      };
    }
    document.addEventListener("DOMContentLoaded", function () {
      updateDirColor();
      var dir     = document.querySelectorAll('input[name="Direccion[]"]');
      var dirComp = document.querySelectorAll('input[name="DireccionComp[]"]');
      var nombre  = document.querySelectorAll('input[name="Nombre[]"]');
      dir.forEach(function (input) {
        input.addEventListener('input', debounce(updateDirColor, 100));
      });
      dirComp.forEach(function (input) {
        input.addEventListener('input', debounce(updateDirColor, 100));
      });
      nombre.forEach(function (input) {
        input.addEventListener('input', debounce(updateDirColor, 100));
      });
    });
  </script>
  <script>
    function showModal(theId) {
      var div = document.getElementById(theId);
      setTimeout(function() {
        div.classList.add("show");
      }, 1000);
    }
    function closeModal(theId) {
      var div = document.getElementById(theId);
        div.classList.remove("show");
    }
  </script>
</html>