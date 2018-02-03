# Pyxl Starter Theme

## Featuring

* [__Bootstrap v4.0.0-beta.3__](https://getbootstrap.com/)
* [__Font Awesome 5__](https://fontawesome.com/)


## How to get started

### Install

`cd path/to/themes/`

`git clone https://bitbucket.org/pyxlinc/wordpress-starter-theme/`

`yarn install`

`yarn dev`
`yarn prod` 
`yarn watch`

### Suggestions

* Review `@imports` in `/src/scss/vendors/*` (unlikely you need all of them)

* See __Bootstrap__ examples: https://getbootstrap.com/docs/4.0/examples/

## JS Files

We're using `gulp-config.json` to list out the `.js` files we want to concatenate.

This is not optimal. We should probably use `webpack` for requires in a modern js kinda way. 

So for now this is kind of a pain.

For ease of use, here's a list of package modules from Bootstrap and it's new dependency [Popper.js](https://popper.js.org/)
```
// Required for mobile menu
"./node_modules/bootstrap/js/dist/util.js",
"./node_modules/bootstrap/js/dist/collapse.js",

// Optional (untested may require popper.js)
"./node_modules/bootstrap/js/dist/alert.js",
"./node_modules/bootstrap/js/dist/button.js",
"./node_modules/bootstrap/js/dist/carousel.js",
"./node_modules/bootstrap/js/dist/index.js",
"./node_modules/bootstrap/js/dist/modal.js",
"./node_modules/bootstrap/js/dist/popover.js",
"./node_modules/bootstrap/js/dist/scrollspy.js",
"./node_modules/bootstrap/js/dist/tab.js",
"./node_modules/bootstrap/js/dist/tooltip.js",

// Requires Popper.js
"./node_modules/bootstrap/js/dist/dropdown.js",

// Popper.js      
"./node_modules/popper.js/dist/popper-utils.js",
"./node_modules/popper.js/dist/popper.js"
```






 