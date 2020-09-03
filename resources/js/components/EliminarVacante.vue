<template>
        <a href="#!" class="text-red-600 hover:text-red-900 mr-5" @click="eliminarVacante">Eliminar</a>
</template>

<script>
export default {
    props: ['vacanteId'],
    methods: {
        eliminarVacante(){
            console.log('Elim', this.vacanteId)

            this.$swal.fire({
                title: '¿Desea eliminar la vacante?',
                text: "Una vez eliminada no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {

                    const params = {
                        id: this.vacanteId,
                        _method: 'delete'
                    }
                    //Enviar peticion a axios
                    axios.post(`/vacantes/${this.vacanteId}`, params)
                    .then(response => {
                        //console.log(response)
                        this.$swal.fire(
                        'Vacante Eliminada!',
                        response.data.mensaje,
                        'success'
                        );

                         //Eliminar del DOM
                         this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                    })
                    .catch(error => console.log(error))
                }
            })
        }
    }
}
</script>
