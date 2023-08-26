<h1 align="center">Magento 2 LiveReloadScript module</h1>
<div align="center">
    <p>Adds the needed script for LiveReload to the html head.</p>
    <p>This is an easy way to develop Magento themes with LiveReload enabled.</p>
</div>

## Table of contents

## Summary

This module adds the `<script>` you need in the `<head>` of Magento only when developer mode is enabled.

You can also configure url in module admin options.

## Installation

```shell
composer require nicolasblancom/magento2-module-livereloadscript
```

## Why

When using LiveReload, there are several ways of having it running. One of those ways is having a `<script>` tag in Magento head.

But you have to add a new layout xml file that outputs this script. So... now you have this change pushed in your repo, and when you deploy to production it will also be there.

This module aims to solve this problem by adding that script conditionally only when you are in developer mode. So when you push to production (and use production mode), it will not output the script tag.

## Usage

With this module installed and enabled, it will automatically add the needed `<script>` tag to the html head, required by LiveReload, only if developer mode is enabled.

Follow below steps once installed.

### Set developer mode

Run:

```shell
bin/magento deploy:mode:set developer
```

### Install grunt and watch files

For LiverReload to work properly, you need Grunt to be watching your files. So you need to have it installed and running (see link below) and have
it watching.

Once installed (follow below links steps), watch files by running: 

```shell
bin/magento grunt watch
```

For Grunt installation and configuration see this link: https://developer.adobe.com/commerce/frontend-core/guide/tools/grunt/

### Install chrome extension

You also need this extension https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei for chrome (also available for FireFox and
other browsers, just search in Google for "Livereload extension" followed by your browser)

### Admin setup (optional)

Go to Stores > Settings > Configuration in admin panel. And then Advanced > Developer > LiveReload.

You have two options, both at global level:

- **Enabled:** "yes" by default. This option enables/disables script tag output in head. Even when enabled, if you are not running Magento in developer mode, it will not output anything. So you can be sure that in production mode it will not output anything related to LiveReload.
- **Script URL:** "/livereload.js?port=443" by default. This is the default value if you use [docker-magento](https://github.com/markshust/docker-magento) by Mark Shust for your development environment. Otherwise you may need to change it to `http:yourdomain.test:35729/livereload.js`.
