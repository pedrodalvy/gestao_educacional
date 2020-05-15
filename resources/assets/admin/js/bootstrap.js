try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.Toastr = require('toastr');
    require('toastr/build/toastr.min.css');

    require('bootstrap');
} catch (e) {}
