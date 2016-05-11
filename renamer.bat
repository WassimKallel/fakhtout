@echo off
setlocal enabledelayedexpansion
set /a count=0
for /f "tokens=*" %%a in ('dir /b /od *.cbr') do (
 echo ren "%%a" !count!.cbr
 set /a count+=1
)