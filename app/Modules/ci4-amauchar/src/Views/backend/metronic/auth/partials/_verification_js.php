<script type="text/javascript">

var KTUserList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_<?= $name; ?>');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;


    var initReadContenu = () => {

        const contenuRead = document.querySelector('[data-verif="submit"]');
        // Delete button on click
        contenuRead.addEventListener('click', function (e) {
            e.preventDefault();

            console.log($('#route-redirect').val());
            Swal.fire({
                title: 'Votre mot de passe',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                // showCancelButton: true,
                confirmButtonText: 'vérification',
                showLoaderOnConfirm: true,
                preConfirm: (mdp) => {
                    var url_string = (window.location.href).toLowerCase();
                    var url = new URL(url_string);
                    var uuid = url.searchParams.get("verif_blocnote");
                    return axios.post("<?= route_to('users.verif.mdp') ?>", {mdp: mdp, session: 'verif_blocnote', uuid: uuid })
                    //return fetch('<?= route_to('users.verif.mdp') ?>',{method: "POST",body: JSON.stringify({mdp: mdp})})
                    .then(response => {
                        console.log(response);
                        if (!response.data.ok) {
                            throw new Error(response.data.errors)
                        }
                        return response.data.messages.sucess
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();                   
                }
            })


            
            
        });
    
    }

    return {
        // Public functions  
        init: function (){          
            initReadContenu();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUserList.init();
});

</script>