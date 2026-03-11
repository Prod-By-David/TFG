<style>
.button.is-rounded {
    border-radius: 9999px;
    padding-left: calc(1em + .25em);
    padding-right: calc(1em + .25em);
}

.button.is-link {
    background-color: #B01B00;
    border-color: transparent;
    color: #fff;
}
</style>

<p class="has-text-right pt-4 pb-4">
		<a href="#" class="button is-link is-rounded btn-back"><i class="fas fa-arrow-alt-circle-left"></i> &nbsp;Regresar atrás</a>
</p>
<script type="text/javascript">
    let btn_back = document.querySelector(".btn-back");

    btn_back.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>