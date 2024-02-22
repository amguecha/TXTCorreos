@echo off
REM Get the directory of the batch script
set "SCRIPT_DIR=%~dp0"
REM Define the relative path to the PHP executable
set "PHP_RELATIVE_PATH=php.exe"
REM Combine the script directory and the relative path to get the full path to PHP
set "PHP_EXECUTABLE_PATH=%SCRIPT_DIR%%PHP_RELATIVE_PATH%"
REM Define the doskey alias command
set "DOSKEY_ALIAS=doskey php=%PHP_EXECUTABLE_PATH% $*"
@REM Update the doskey alias without printing the command
@%SystemRoot%\System32\reg.exe add "HKCU\Software\Microsoft\Command Processor" /v AutoRun /t REG_SZ /d "%DOSKEY_ALIAS%" /f >nul 2>&1 
cd /d "%~dp0www"
cmd
