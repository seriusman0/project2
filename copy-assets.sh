#!/bin/bash

# Create directories for assets
mkdir -p public/assets/bootstrap/css
mkdir -p public/assets/bootstrap/js
mkdir -p public/assets/fonts
mkdir -p public/assets/images

# Download Bootstrap CSS and JS (v5.3.0)
curl -o public/assets/bootstrap/css/bootstrap.min.css https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
curl -o public/assets/bootstrap/js/bootstrap.bundle.min.js https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js

# Download fonts CSS and font files from fonts.bunny.net (Figtree font)
curl -o public/assets/fonts/figtree.css https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap

# Note: The above CSS references font files hosted on fonts.bunny.net, so we need to download those font files as well.
# For simplicity, download the font files manually or replace with local fonts.

# Download Google Fonts CSS for Source Sans Pro
curl -o public/assets/fonts/source-sans-pro.css "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"

# Download images from studycenter.or.id
curl -o public/assets/images/cropped-logo-sc1.jpg https://studycenter.or.id/wp-content/uploads/2017/03/cropped-logo-sc1.jpg
curl -o public/assets/images/screen-shot-2020-12-10-at-7.08.38-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.08.38-am.png?w=471&h=345&ssl=1
curl -o public/assets/images/dsc_01091.jpg https://i0.wp.com/studycenter.or.id/wp-content/uploads/2017/03/dsc_01091.jpg?w=241&h=160&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.08.57-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.08.57-am.png?w=241&h=181&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.09.16-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.09.16-am.png?w=334&h=253&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.09.53-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.09.53-am.png?w=378&h=253&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.12.17-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.12.17-am.png?w=260&h=154&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.12.33-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.12.33-am.png?w=260&h=195&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.12.51-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.12.51-am.png?w=452&h=353&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.13.20-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.13.20-am.png?w=335&h=225&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.13.52-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.13.52-am.png?w=377&h=225&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.14.04-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.14.04-am.png?w=263&h=199&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.16.29-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.16.29-am.png?w=263&h=197&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.16.41-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.16.41-am.png?w=263&h=196&ssl=1
curl -o public/assets/images/screen-shot-2020-12-10-at-7.20.18-am.png https://i0.wp.com/studycenter.or.id/wp-content/uploads/2020/12/screen-shot-2020-12-10-at-7.20.18-am.png?w=449&h=600&ssl=1

# Download background image from pexels.com
curl -o public/assets/images/pexels-photo-3184465.jpeg "https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

echo "Assets downloaded successfully."
