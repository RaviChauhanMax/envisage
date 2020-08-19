<script type="text/javascript">
    <?php if(Session::has('success')){ ?>
        toastr.success("{{ Session::get('success') }}");
    <?php } ?>

    <?php if(Session::has('error')){ ?>
        toastr.error("{{ Session::get('error') }}");
    <?php } ?>
    /*toastr.info('We do have the Kapua suite available.');
    toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');*/
</script>