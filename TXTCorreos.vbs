Set objShell = CreateObject("WScript.Shell")

' Especifica la ruta completa al archivo batch
batchFilePath = "app-bootstrap-script.bat"

' Ejecuta el archivo batch
objShell.Run batchFilePath, 0, True