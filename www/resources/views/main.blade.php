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
      .icons10-angle-down::before { font-weight: 800; padding-left: 4px; }
      #product:hover { opacity:0.9; }
      .flip { transform: scaleY(-1); }
    </style>
  <style>
  .video-row { display: none; }
  .showrow { display: table-row; }
  </style>
  </head>
  <body style="font-family: 'Segoe UI', sans-serif;" oncontextmenu="return false" class="{{ $userSetting->theme_variant }}">
    <div class="app-navbar-wrap" id="NavBarMain">
      <div class="app-navbar-topbar-mobile">
        <span class="app-navbar-toggler" data-win-toggle="navbar-left" data-win-target="#NavBarMain"></span>
        <div><span class="app-navbar-name">Menú</span></div>
      </div>
      <nav class="app-navbar">
        <div class="app-navbar-header" style="height:52px; margin: 0px !important;">
          <span class="app-navbar-toggler" style="padding-left: 25px; padding-right: 14px; margin:0 !important;" data-win-toggle="navbar-left" data-win-target="#NavBarMain" aria-controls="NavBarMain" aria-label="Toggle navigation"></span>
          <span class="app-navbar-name" style="padding:0;">Menú</span>
        </div>
        <ul class="app-navbar-list" id="app-navbar-list" style="min-height:275px;list-style: none;margin: 50px 0 0 0;margin-bottom: 0px;padding: 0 0 40px 0;display: flex;flex-direction: column;flex-grow: revert-layer;height: calc(100% - 60px);margin-bottom: 0px; padding-bottom: 0;">
          <li class="app-navbar-list-item">
            <a href="javascript:void(0)" class="active">
              <i class="icons10-home"></i>
              <span>Inicio</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a style="opacity: 0.5" href="javascript:void(0)" class="unactive">
              <i class="icons10-refresh"></i>
              <span>Cargar Excel</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a style="opacity: 0.5" onclick="event.preventDefault();" href="javascript:void(0)" class="unactive">
              <i class="icons10-todo-list"></i>
              <span>Vista De Datos</span>
            </a>
          </li>
          <li class="app-navbar-list-item">
            <a style="opacity: 0.5" onclick="event.preventDefault();" href="javascript:void(0)" class="unactive">
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
      <h1 style="width:100%;">TXTCorreos: Realiza envíos masivos de forma fácil en <span id="micorreos" style="font-style: none;color: var(--color-primary-adaptive);">mioficina.correos.es</span></h1>
      <h2 style="max-width: 720px; width:80%; line-height: 2.2rem; font-weight: 300; margin-bottom: 2rem;">Convierte listados en MS Excel a formato ".txt" compatible con la plataforma online de Correos. Modalidades disponibles:</h2>
      <div class="app-table-view-container" style="margin-bottom: 2rem;">
        <table class="app-table-view" style="width: 640px;">
          <thead>
            <tr >
              <th align="left" style="line-height: 24px;">MODALIDAD</th>
              <th align="left" style="line-height: 24px;">DESCRIPCIÓN</th>
              <th align="left" style="line-height: 24px;">PEE</th>
              <th align="left" style="line-height: 24px;">ACCIÓN</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><b id="product" onclick="toggleVideo()" style="background: #6acb5d; padding: 0.5rem 0.7rem; border-radius: 4px; cursor: pointer;">S0003 <span style="display:inline-block;" id="chevron-1"><i class="icons10-angle-down"></i></span></b></td>
              <td>Cartas <b>NACIONALES</b> Certificadas</td>
              <td style="white-space: nowrap;"><input class="app-checkbox" type="checkbox" value="" checked onclick="return false;"> Si</td>
              <td style="line-height: 46px;"><a style="height: 20px;white-space: nowrap;" href="/upload" class="app-btn app-btn-primary"><span>Iniciar <b>S0003</b></span></a></td>
            </tr>
            <tr style="padding: 0px;" id="video-row" class="video-row">
              <td colspan="4" style="padding:0;">
                <div style="display:flex;">
                  <video id="video-S0003" muted controls loop style="width: 640px;">
                    <source src="ejemplo_cart_cert_nac_pee.webm" type="video/mp4">
                  </video>
                </div>
              </td>
            </tr>
            <tr>
              <td><b id="product" style="background: #ba5dcb;; padding: 0.5rem 0.7rem; border-radius: 4px; cursor: not-allowed;">S0004 <i class="icons10-angle-down"></i></b></td>
              <td>Cartas <b>INTERNACIONALES</b> Certificadas</td>
              <td style="white-space: nowrap;"><input class="app-checkbox" type="checkbox" value="" checked onclick="return false;"> Si</td>
              <td style="line-height: 46px;"><a style="height: 20px;white-space: nowrap; background-color: #b1b1b1; cursor: not-allowed;" href="javascript:void(0)" class="app-btn app-btn-primary"><span>Iniciar <b>S0004</b></span></a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <label style="margin-bottom: 1rem; display:inline-block;">Documentación explicativa sobre procesos y productos [Modalidades].</label><br>
      <a href="javascript:void(0)" onclick="showModal('successGen');copyDocumentation();" class="app-btn app-btn-primary" style="display: inline-block;line-height: 35px;padding: 0px 16px;margin-right: 12px;white-space: nowrap;margin-bottom: 35px;"><span>Generar Documentación</span></a>
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
    <div class="app-alert" id="successGen" data-win-toggle="modal" data-win-target="#successGen" tabindex="-1">
      <div class="app-alert-modal" aria-modal="true" role="dialog" style="box-shadow: none;">
        <div class="app-alert-header">
          <h1>Mensaje</h1>
          <div class="app-alert-message">
            <p style="line-height:1.5rem;">Documentación guardada en <br><b>"Archivos Generados"</b>.</p>
          </div>
        </div>
        <div class="app-alert-footer">
          <button class="app-btn app-btn-primary" onclick="closeModal('successGen')" data-win-toggle="modal" data-win-target="#successGen">
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
  <script type="text/javascript">
    document.addEventListener('dragstart', function(event) {
    event.preventDefault();
    });
  </script>
  <script>
    function showModal(theId) {
      var div = document.getElementById(theId);
      setTimeout(function() {
        div.classList.add("show");
      }, 500);
    }
    function closeModal(theId) {
      var div = document.getElementById(theId);
        div.classList.remove("show");
    }
  </script>
  <script>
    function toggleVideo() {
      var videoRow = document.getElementById('video-row');
      videoRow.classList.toggle('showrow');
      var chevronIcon = document.getElementById('chevron-1');
      if (chevronIcon.classList.contains('flip')) {
        chevronIcon.classList.remove('flip');
      } else {
        chevronIcon.classList.add('flip');
      }
      var videoElement = document.getElementById('video-S0003');
      if (videoElement.paused) {
        videoElement.play();
      } else {
        videoElement.pause();
      }
    }
</script>

</html>