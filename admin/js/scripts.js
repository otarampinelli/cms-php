// ClassicEditor
//         .create(document.querySelector('#form-body'))
//         .catch( error => {
//             console.error( error );
// });

const check = document.querySelector('#selectAllBoxes');
console.log(check);

const boxes = document.querySelectorAll('.checkBoxes');
console.log(boxes);

check.addEventListener('click', e => {

    if(check) {
        boxes.forEach(box => {
            box.checked = true;
        })
    }


})

