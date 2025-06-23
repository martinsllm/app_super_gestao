import './bootstrap';

import Inputmask from 'inputmask/lib/inputmask.js';

document.addEventListener("DOMContentLoaded", () => {
    var phoneMask = new Inputmask("(99) 9 9999-9999");
    phoneMask.mask(document.querySelector("#phone"));
});
