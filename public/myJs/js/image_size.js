// JavaScript code to check the size of an image file before uploading

// $("#imageInput", ".imageInput").change(function () {
//     var file = this.files[0];
//     if (file.size > 1048576) {
//         // 1 Mo = 1048576 octets
//         $("#sizeError").show();
//         $(this).val("");
//     } else {
//         $("#sizeError").hide();
//     }
// });

// $(document).on("change", "#imageInput, .imageInput", function () {
//     const files = this.files;

//     for (let i = 0; i < files.length; i++) {
//         const file = files[i];

//         if (file.size > 1048576) {
//             // 1 Mo
//             $("#sizeError").show().text(`L'image "${file.name}" dépasse 1 Mo.`);
//             $(this).val(""); // réinitialiser le champ
//             return;
//         } else {
//             $("#sizeError").hide();
//         }
//     }
// });

$(document).on("change", "#imageInput, .imageInput , .imageInputActualite  ", function () {
    const files = this.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        if (file.size > 1048576) {
            // 1 Mo
            Swal.fire({
                icon: "error",
                title: "Fichier trop volumineux",
                text: `L'image "${file.name}" dépasse la taille maximale autorisée de 1 Mo.`,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            $(this).val(""); // Réinitialiser l'input
            return;
        }
    }
});
