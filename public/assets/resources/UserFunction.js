

function loadMessage(msg) {
    let timerInterval;
    Swal.fire({
        title: "Process",
        html: "Loading <b></b>",
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {

        if (result.dismiss === Swal.DismissReason.timer) {
            Swal.fire({
                text: msg,
                icon: "success"
            });
        }
    });
}