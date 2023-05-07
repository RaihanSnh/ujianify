function generateModalID(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}

document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function(e) {
        if (e.target.closest('.__ujianify__modal__wrapper__')) {
            onModalClose(document.querySelector('.__ujianify__modal__wrapper__').id);
        }
    });
});


function showModal(contentID) {
    const prefix = '__ujianify__modal__';
    const id = prefix + generateModalID(16);
    const content = document.getElementById(contentID).innerHTML;
    const modalHTML = '<div id="' + id + '" class="__ujianify__modal__wrapper__ relative z-10">' +
                '<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="onModalClose(id)"></div>' +
                '<div class="fixed inset-0 z-10 overflow-y-auto">' +
                    '<div class="flex min-h-full justify-center p-4 text-center items-center">' +
                        '<div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all min-w-[200px] sm:my-8 sm:w-full sm:max-w-lg">' +
                            '<div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">' +
                                content +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';

    document.body.innerHTML += modalHTML;
}

function onModalClose(id) {
    document.getElementById(id).remove();
}
