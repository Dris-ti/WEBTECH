function leave_validation(data) {
    const teacher = data.teacher.value;
    const description = data["leave-desc"].value;
    let isValid = true;

    let teacherErr = document.getElementById("teacherErr");
    let descErr = document.getElementById("descErr");

    teacherErr.innerHTML = "";
    descErr.innerHTML = "";

    if (teacher === "") {
        teacherErr.innerHTML = "Please select a teacher";
        isValid = false;
    }

    if (description === "") {
        descErr.innerHTML = "Please provide a description";
        isValid = false;
    }

    return isValid;
}