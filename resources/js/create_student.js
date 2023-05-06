const selectMajor = document.getElementById("selectMajor");
const selectClassroom = document.getElementById("selectClassroom");

selectClassroom.disabled = true;

document.addEventListener('DOMContentLoaded', function (event) {
    const clearClassroom = function () {
        while (selectClassroom.firstChild) {
            selectClassroom.removeChild(selectClassroom.firstChild);
        }
    }

    if(selectMajor.options.length <= 1) {
        selectMajor.disabled = true;
        const placeholder = document.createElement('option');
        placeholder.value = '';
        placeholder.text = 'No majors found on database';
        selectMajor.add(placeholder);
    }

    selectMajor.addEventListener('change', function () {
        const value = selectMajor.value;
        selectClassroom.disabled = true;
        if(value === '') {
            return;
        }
        clearClassroom();
        axios.get('admin/classroom/listByMajor/' + value).then((res) => {
            clearClassroom();

            res.data.forEach((classroom) => {
                const newOpt = document.createElement('option');
                newOpt.value = classroom.id;
                newOpt.text = classroom.name;
                selectClassroom.add(newOpt);
            });
            selectClassroom.disabled = false;
        });
    });
})
