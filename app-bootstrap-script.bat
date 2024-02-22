@echo off
setlocal enabledelayedexpansion

REM Get the current directory of the batch script
set "currentDirectory=%~dp0"
REM Set the path to the shortcut file and the desired target and start in values
set "shortcutPath=%currentDirectory%TXTCorreos.lnk"
set "target=%currentDirectory%cef\cefclient.exe"
set "arguments=--url=127.0.0.1:8123 --hide-controls --use-views"
set "startIn=%currentDirectory%cef"
REM Verify if the shortcut file exists
if not exist "%shortcutPath%" (
    echo Shortcut file not found.
    exit /b 1
)
REM Modify the target and start in fields of the shortcut
powershell -Command " $Shortcut = (New-Object -ComObject WScript.Shell).CreateShortcut('%shortcutPath%'); $Shortcut.TargetPath = '%target%'; $Shortcut.Arguments = '%arguments%'; $Shortcut.WorkingDirectory = '%startIn%'; $Shortcut.Save()"
REM print if success!
echo Shortcut updated successfully.

REM =================

REM Start php.exe in the background
start "PHP Server" /B php.exe -S 127.0.0.1:8123 -t "www\public"

REM Start cefclient.exe
REM start "CEF Client" cef\cefclient.exe --url="127.0.0.1:8123" --hide-controls --use-views
start "CEF Client" TXTCorreos.lnk

REM Get the PID of php.exe
for /f "tokens=2" %%a in ('tasklist /nh /fi "imagename eq php.exe"') do ( set "PHP_PID=%%a" )

REM Wait for the cefclient.exe process to close
:LOOP
timeout /t 1 /nobreak >nul
tasklist /nh /fi "imagename eq cefclient.exe" | find "cefclient.exe" >nul
if errorlevel 1 goto :KILL_PHP
goto :LOOP

REM Kill php.exe using its PID
:KILL_PHP
taskkill /pid %PHP_PID% /f

REM Delete the shortcut if it exists
set "ShortcutName=TXTCorreos.lnk"
set "PinnedDirectory=%APPDATA%\Microsoft\Internet Explorer\Quick Launch\User Pinned\TaskBar"
if exist "%PinnedDirectory%\%ShortcutName%" (
    del "%PinnedDirectory%\%ShortcutName%"
    echo Shortcut deleted successfully.
) else (
    echo Shortcut not found.
)

:end
