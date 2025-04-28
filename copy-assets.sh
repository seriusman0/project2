#!/bin/bash
mkdir -p public/vendor/adminlte/css
mkdir -p public/vendor/adminlte/js
mkdir -p public/vendor/fontawesome-free
mkdir -p public/vendor/jquery
mkdir -p public/vendor/bootstrap

cp node_modules/admin-lte/dist/css/adminlte.min.css public/vendor/adminlte/css/
cp node_modules/admin-lte/dist/js/adminlte.min.js public/vendor/adminlte/js/
cp -r node_modules/@fortawesome/fontawesome-free/css public/vendor/fontawesome-free/
cp -r node_modules/@fortawesome/fontawesome-free/webfonts public/vendor/fontawesome-free/
cp node_modules/jquery/dist/jquery.min.js public/vendor/jquery/
cp node_modules/bootstrap/dist/js/bootstrap.bundle.min.js public/vendor/bootstrap/
cp node_modules/bootstrap/dist/css/bootstrap.min.css public/vendor/bootstrap/
