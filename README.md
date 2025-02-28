# rufus-web

## Description

This is the content repository for the https://rufus.ie homepage.

Because, despite [repeated pleas](https://github.com/github/pages-gem/issues/401), GitHub
**does not care** about multilingual support when hosting web pages using their recommended
tools, we have to manually generate our own localized pages from PHP content and gettext.

The way it works is as follows:
1. `index.php` is edited to reflect the latest updates we want visitors to see.
2. This PHP content uploaded to an Apache+PHP+gettext server, along with the localization
   files.
3. This server is then queried through a bash script `_refresh.sh` to generate the static
   content (the various `index.html` in the subdirectories), which is then uploaded and
   deployed to the GitHub, as static pages, and served from https://rufus.ie.

## Deploying and testing your own local site

While we use a real local Linux server for our internal PHP deployments, if you have Docker
installed (and can use Docker commandline), you should be able to replicate our intermediate
PHP server by issuing the following Docker commands:

```
cd <directory where you cloned this repo>
docker build -t rufus-web .
docker run -p 8080:80 rufus-web
```

Then, by accessing http://localhost:8080 you should see the original localized website.

If you have a `bash` compatible shell installed, you should also be able to generate the
static localized pages, by changing `url` to `url=localhost:8080` in the `_refresh.sh`
script, and then invoking `./_refresh.sh`.