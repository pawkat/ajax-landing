import DeferJS from "./DeferJS";

export default function () {
    let scriptsToLoad = [
        {
            src: './orderForm.min.js',
            handle: 'order-form',
            el: document.querySelector('.js-order-form'),
            loadImmediatelyIfVisible: false,
        },
        {
            src: './slider.min.js',
            handle: 'slider',
            el: document.querySelector('.js-slider'),
            loadImmediatelyIfVisible: false,
        }
    ];

    scriptsToLoad.forEach((el) => {
        new DeferJS(el);
    });
}
