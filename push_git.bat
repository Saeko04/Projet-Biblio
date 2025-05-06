@echo off
cls
echo ================================
echo   Script de push Git interactif
echo ================================
echo.

:: Récupérer les infos utilisateur
set /p GITURL=Entre l'URL du dépôt GitHub :
set /p BRANCHE=Entre le nom de la branche (ex: sprint-4) :
set /p MESSAGE=Entre le message du commit :

:: Aller dans le dossier courant (assumé : déjà ouvert dans F:\Projet par exemple)
git init
git remote remove origin >nul 2>&1
git remote add origin %GITURL%
git fetch --all

git checkout -b %BRANCHE% origin/%BRANCHE%
git pull

git add .
git commit -m "%MESSAGE%"
git push -u origin %BRANCHE%

echo.
echo ===> PUSH TERMINÉ AVEC SUCCÈS
pause
