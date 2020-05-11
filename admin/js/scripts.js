// ClassicEditor
//         .create(document.querySelector('#form-body'))
//         .catch( error => {
//             console.error( error );
// });

const check = document.querySelector('#selectAllBoxes');

const boxes = document.querySelectorAll('.checkBoxes');

check.addEventListener('click', e => {

    if(check) {
        boxes.forEach(box => {
            box.checked = true;
        })
    }


})

