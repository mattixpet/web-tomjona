::compile.bat
::compiles jade files and stylus files into .html and .css
::from homepage folder
@echo off & setlocal enabledelayedexpansion

::jade index
echo executing command: jade templates/index.jade -o "site" -P
call jade templates/index.jade -o "site" -P
::jade about
echo executing command: jade templates/about.jade -o "site" -P
call jade templates/about.jade -o "site" -P
::jade contact
echo executing command: jade templates/contact.jade -o "site" -P
call jade templates/contact.jade -o "site" -P

::stylus!!!
echo executing command: stylus styles/style.styl -o "site/static/css/"
call stylus styles/style.styl -o "site/static/css/"

::move to site/ directory, lets not change html files elsewhere
echo. & echo executing command: cd site
call cd site

::first, delete all old .php files, to be ready for the renaming of html files to .php
echo. & echo deleting old .php files..
::ignore files that exist only as .php files, like the language files
set ignores= is.php en.php analyticstracking.php chatbox.php
echo php files to ignore:
for %%i in (%ignores%) do echo %%i
echo also ignore all files in afterhours\
echo.

:: comment here!
:: special ignore for all other sites within this site, like afterhours
:: so it doesn't delete the .php files!!
:: get only the path (e.g. we are at home/jango.det would give afterhours=home/)
for /r %%i in (*.php) do (
  set inIgnores= 0
  for %%j in (%ignores%) do (
    :: %%~nd%%~xd means just name.extension, a cleaner way than this probably exists..
    if "%%j" == "%%~ni%%~xi" (
      set inIgnores= 1
    )
  )
  :: comment here
  set filepath= %%~dpi
  :: minus 11 to get only the last 10 letters + "\", e.g. "afterhours\" if that's the directory
  if "!filepath:~-11!" == "afterhours\" (
    set inIgnores= 1
  )
  if !inIgnores! lss 1 (
    echo %%i
    rm %%i
  ) else (
    echo ignoring file %%i
  )
)
echo files deleted & echo.

::now rename all .html files to .php for our viewing pleasures
echo renaming .html to .php

set htmlignores= index.html
echo html files to ignore:
for %%i in (%htmlignores%) do echo %%i
echo.

for /r %%d in (*.html) do (
  set inIgnores= 0
  for %%i in (%htmlignores%) do (
    :: %%~nd%%~xd means just name.extension, a cleaner way than this probably exists..
    if "%%i" == "%%~nd%%~xd" (
      set inIgnores= 1
    )
  )
  if !inIgnores! lss 1 (
    echo %%d
    ren "%%~d" *.php
  ) else (
    echo ignoring file %%d
  )
)
echo files renamed & echo.

echo special case, rename index.html in root
ren "%~dp0\site\index.html" "index.php"
echo %~dp0%\site\index.html renamed
