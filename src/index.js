import './assets/scss/style.scss';

import {aload} from "./assets/js/utilities/aload";
import firstInteraction from "./assets/js/utilities/firstInteraction";
import loadScripts from "./assets/js/utilities/loadScripts";

aload();

$(document).on('firstInteraction', () => {
    aload(null, true)
});

$('body').removeClass('async-hide');

loadScripts();

firstInteraction();
