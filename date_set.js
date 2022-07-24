let start = document.getElementById("date");
start.addEventListener(
    "change",
    function () {
        if (start.value) {
            end.min = start.value;
        }
    },
    false
);

let end = document.getElementById("exp_date");
end.addEventListener(
    "change",
    function () {
        if (end.value) {
            start.max = end.value;
        }
    },
    false
);